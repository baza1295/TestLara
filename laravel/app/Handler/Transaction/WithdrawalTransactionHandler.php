<?php

namespace App\Handler\Transaction;

use App\Http\Request\Transaction\TransactionRequest;
use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;

class WithdrawalTransactionHandler
{
    public function handle(TransactionRequest $request)
    {
        DB::beginTransaction();

        try {
            $account = Account::where([['active', true], ['balance', '>=', $request->getValue()]])->findOrFail($request->getAccount());

            $transaction = Transaction::create([
                'account_id' => $account->id,
                'value' => $request->getValue() * -1,
                'transaction_date' => $request->getTransactionDate()
            ]);

            $account->balance -= $request->getValue();
            $account->save();

        } catch (Exception $e) {
            DB::rollBack();
        }

        DB::commit();
        return $transaction;
    }
}
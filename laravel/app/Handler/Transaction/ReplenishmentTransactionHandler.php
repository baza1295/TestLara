<?php

namespace App\Handler\Transaction;

use App\Http\Request\Transaction\TransactionRequest;
use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;

class ReplenishmentTransactionHandler
{
    public function handle(TransactionRequest $request)
    {
        DB::beginTransaction();

        try {
            dd(1);
            $account = Account::where('active', true)->findOrFail($request->getAccount());

            $transaction = Transaction::create([
                'account_id' => $account->id,
                'value' => $request->getValue(),
                'transaction_date' => $request->getTransactionDate()
            ]);

            $account->balance += $request->getValue();
            $account->save();

        } catch (Exception $e) {
            DB::rollBack();
        }

        DB::commit();
        return $transaction;
    }
}
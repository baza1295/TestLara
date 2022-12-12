<?php

namespace App\Handler\Transaction;

use App\Models\Account;
use App\Models\Transaction;
use App\Handler\BaseHandler;

class ReplenishmentTransactionHandler extends BaseHandler
{
    /**
     * @param $dto
     * @return Transaction|\Illuminate\Database\Eloquent\Model
     */
    public function handleCommand($dto)
    {
        $account = Account::where('active', true)->findOrFail($dto->accountId);

        $transaction = Transaction::create([
            'account_id' => $account->id,
            'value' => $dto->value,
            'transaction_date' => $dto->transactionDate
        ]);

        $account->balance += $dto->value;
        $account->save();

        return $transaction;
    }
}

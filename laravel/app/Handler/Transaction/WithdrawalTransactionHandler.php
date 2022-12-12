<?php

namespace App\Handler\Transaction;

use App\Models\Account;
use App\Models\Transaction;
use App\Handler\BaseHandler;

class WithdrawalTransactionHandler extends BaseHandler
{
    public function handleCommand($dto)
    {
        $account = Account::where([['active', true], ['balance', '>=', $dto->value]])->findOrFail($dto->accountId);

        $transaction = Transaction::create([
            'account_id' => $account->id,
            'value' => $dto->value * -1,
            'transaction_date' => $dto->transactionDate
        ]);

        $account->balance -= $dto->value;
        $account->save();

        return $transaction;
    }
}

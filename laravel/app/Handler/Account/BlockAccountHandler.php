<?php

namespace App\Handler\Account;

use App\Handler\BaseHandler;
use App\Models\Account;

class BlockAccountHandler extends BaseHandler
{
    protected function handleCommand($dto)
    {
        $account = Account::with('client')->findOrFail($dto->accountId);
        $account->active = false;
        $account->save();

        return $account;
    }
}

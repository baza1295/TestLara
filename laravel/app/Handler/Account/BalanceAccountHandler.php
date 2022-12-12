<?php

namespace App\Handler\Account;

use App\Handler\BaseHandler;
use App\Models\Account;
use Symfony\Component\HttpFoundation\Response;

class BalanceAccountHandler extends BaseHandler
{
    protected bool $isTransactional = false;

    protected function handleCommand($dto)
    {
        $account = Account::findOrFail($dto->accountId);
        if ($account->daily_withdrawal_limit > 4) {
            abort(Response::HTTP_FORBIDDEN, 'Access Denied');
        }
        $account->daily_withdrawal_limit++;
        $account->save();

        return $account;
    }
}

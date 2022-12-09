<?php

namespace App\Http\Controllers;

use App\Handler\Account\CreateAccountHandler;
use App\Http\Request\Account\CreateAccountRequest;
use App\Http\Resource\Account\AccountBalanceResource;
use App\Http\Resource\Account\AccountFullResource;
use App\Models\Account;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AccountController extends Controller
{
    public function create(CreateAccountRequest $request, CreateAccountHandler $handler): AccountFullResource
    {
        /** @var Account $account */
        $account = $handler->handle($request);

        return new AccountFullResource($account);
    }

    public function balance(string $accountId)
    {
        $account = Account::findOrFail($accountId);
        if ($account->daily_withdrawal_limit > 4) {
            throw new AccessDeniedException();
        }
        $account->daily_withdrawal_limit++;
        $account->save();
        return new AccountBalanceResource($account);
    }

    public function block(string $accountId)
    {
        $account = Account::findOrFail($accountId);
        $account->active = false;
        $account->save();
        return new AccountFullResource($account);
    }
}

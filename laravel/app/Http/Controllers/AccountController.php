<?php

namespace App\Http\Controllers;

use App\Handler\Account\CreateAccountHandler;
use App\Http\Request\Account\CreateAccountRequest;
use App\Http\Resource\Account\AccountBalanceResource;
use App\Http\Resource\Account\AccountFullResource;
use App\Models\Account;

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

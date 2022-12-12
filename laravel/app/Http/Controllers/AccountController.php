<?php

namespace App\Http\Controllers;

use App\Handler\Account\BalanceAccountHandler;
use App\Handler\Account\BlockAccountHandler;
use App\Handler\Account\CreateAccountHandler;
use App\Http\DTO\Account\BalanceAccountDto;
use App\Http\DTO\Account\BlockAccountDto;
use App\Http\Request\Account\BlockAccountRequest;
use App\Http\Request\Account\CreateAccountRequest;
use App\Http\Resource\Account\AccountBalanceResource;
use App\Http\Resource\Account\AccountFullResource;
use App\Models\Account;
use App\Http\DTO\Account\CreateAccountDto;

class AccountController extends Controller
{
    /**
     * @param CreateAccountRequest $request
     * @param CreateAccountHandler $handler
     * @return AccountFullResource
     */
    public function create(CreateAccountRequest $request, CreateAccountHandler $handler): AccountFullResource
    {
        /** @var Account $account */
        $account = $handler->handle(new CreateAccountDto(
            name: $request->get('name'),
            document: $request->get('document'),
            birthDay: $request->get('birthDay'),
            balance: $request->get('balance'),
        ));

        return new AccountFullResource($account);
    }

    /**
     * @param string $accountId
     * @return AccountBalanceResource
     */
    public function balance(string $accountId, BalanceAccountHandler $handler)
    {
        $account = $handler->handle(new BalanceAccountDto(accountId: $accountId));
        return new AccountBalanceResource($account);
    }

    /**
     * @param BlockAccountRequest $request
     * @return AccountFullResource
     */
    public function block(BlockAccountRequest $request, BlockAccountHandler $handler)
    {
        $account = $handler->handle(new BlockAccountDto(accountId: $request->get('accountId')));

        return new AccountFullResource($account);
    }
}

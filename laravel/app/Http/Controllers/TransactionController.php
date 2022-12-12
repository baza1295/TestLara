<?php

namespace App\Http\Controllers;

use App\Handler\Transaction\ReplenishmentTransactionHandler;
use App\Handler\Transaction\WithdrawalTransactionHandler;
use App\Http\DTO\Transaction\TransactionDto;
use App\Http\Request\Transaction\TransactionRequest;
use App\Http\Resource\Transaction\TransactionFullResource;
use App\Models\Account;
use App\Models\Transaction;

class TransactionController extends Controller
{
    /**
     * @param TransactionRequest $request
     * @param ReplenishmentTransactionHandler $handler
     * @return TransactionFullResource
     */
    public function replenishment(TransactionRequest $request, ReplenishmentTransactionHandler $handler)
    {
        $transaction = $handler->handle(new TransactionDto(
            accountId: $request->get('accountId'),
            value: $request->get('value'),
            transactionDate: $request->get('transactionDate')
        ));

        return new TransactionFullResource($transaction);
    }

    /**
     * @param TransactionRequest $request
     * @param WithdrawalTransactionHandler $handler
     * @return TransactionFullResource
     */
    public function withdrawal(TransactionRequest $request, WithdrawalTransactionHandler $handler)
    {
        $transaction = $handler->handle(new TransactionDto(
            accountId: $request->get('accountId'),
            value: $request->get('value'),
            transactionDate: $request->get('transactionDate')
        ));

        return new TransactionFullResource($transaction);
    }

    /**
     * @param Account $account
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function history(Account $account)
    {
        $transactions = Transaction::where('account_id', $account->id)->get();

        return TransactionFullResource::collection($transactions);
    }
}

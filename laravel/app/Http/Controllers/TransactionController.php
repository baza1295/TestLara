<?php

namespace App\Http\Controllers;

use App\Handler\Transaction\ReplenishmentTransactionHandler;
use App\Handler\Transaction\WithdrawalTransactionHandler;
use App\Http\Request\Transaction\TransactionRequest;
use App\Http\Resource\Transaction\TransactionFullResource;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function replenishment(TransactionRequest $request, ReplenishmentTransactionHandler $handler)
    {
        $transaction = $handler->handle($request);

        return new TransactionFullResource($transaction);
    }

    public function withdrawal(TransactionRequest $request, WithdrawalTransactionHandler $handler)
    {
        $transaction = $handler->handle($request);

        return new TransactionFullResource($transaction);
    }

    public function history(string $accountId)
    {
        $transactions = Transaction::where('account_id', $accountId)->get();

        return TransactionFullResource::collection($transactions);
    }
}

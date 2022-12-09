<?php

namespace App\Http\Controllers;

use App\Handler\Transaction\ReplenishmentTransactionHandler;
use App\Handler\Transaction\WithdrawalTransactionHandler;
use App\Http\Request\Transaction\TransactionRequest;
use App\Http\Resource\Transaction\TransactionFullResource;

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
}

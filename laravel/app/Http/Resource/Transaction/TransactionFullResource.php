<?php

namespace App\Http\Resource\Transaction;

use Illuminate\Http\Resources\Json\JsonResource;

class TransactionFullResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'transactionDate' => $this->transaction_date,
            'value' => $this->value,
            'accountId' => $this->account->id,
        ];
    }
}

<?php
namespace App\Http\Resource\Account;

use Illuminate\Http\Resources\Json\JsonResource;

class AccountFullResource extends JsonResource
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
            'name' => $this->client->name,
            'document' => $this->client->document,
            'birthDay' => $this->client->birth_date,
            'balance' => $this->balance,
            'status' => $this->active,
        ];
    }
}

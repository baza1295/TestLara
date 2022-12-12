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
            'client' => new ClientResource($this->whenLoaded('client')),
            'balance' => $this->balance,
            'status' => $this->active,
        ];
    }
}

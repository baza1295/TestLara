<?php

namespace App\Http\Resource\Account;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return  [
            'name' => $this->name,
            'document' => $this->document,
            'birthDay' => $this->birth_date,
        ];
    }
}

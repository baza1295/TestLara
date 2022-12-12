<?php

namespace App\Http\Request\Account;

use Illuminate\Foundation\Http\FormRequest;

class BlockAccountRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'accountId' => ['uuid', 'required']
        ];
    }
}

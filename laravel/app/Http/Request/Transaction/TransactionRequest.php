<?php

namespace App\Http\Request\Transaction;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'accountId' => ['uuid', 'required'],
            'value' => ['numeric', 'gt:0', 'required'],
            'transactionDate' => ['required', 'date_format:Y-m-d H:i:s'],
        ];
    }
}

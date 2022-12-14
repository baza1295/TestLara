<?php
namespace App\Http\Request\Account;

use Illuminate\Foundation\Http\FormRequest;

class CreateAccountRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['string', 'required', 'max:255'],
            'document' => ['string', 'required'],
            'birthDay' => ['date_format:Y-m-d H:i:s'],
            'balance' => ['numeric'],
        ];
    }
}

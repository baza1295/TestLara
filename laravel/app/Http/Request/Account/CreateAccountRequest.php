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
            'birthDay' => ['date_format:Y-m-d'],
            'balance' => ['numeric'],
        ];
    }

    public function getName()
    {
        return $this->get('name');
    }

    public function getDocument()
    {
        return $this->get('document');
    }

    public function getBirthday()
    {
        return $this->get('birthDay') ? new \DateTime($this->get('birthDay')) : null;
    }

    public function getBalance()
    {
        return $this->get('balance');
    }
}

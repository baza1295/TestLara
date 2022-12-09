<?php
namespace App\Handler\Account;

use App\Http\Request\Account\CreateAccountRequest;
use App\Models\Account;
use App\Models\Client;

class CreateAccountHandler
{
    public function handle(CreateAccountRequest $request)
    {
        $client = Client::create([
            'name' => $request->getName(),
            'birth_date' => $request->getBirthday(),
            'document' => $request->getDocument()
        ]);

        return Account::create([
            'person_id' => $client->id,
            'balance' => $request->getBalance(),
            'daily_withdrawal_limit' => 0,
            'active' => true,
            'account_type' => Account::ACCOUNT_STATUS_DEFAULT
        ]);
    }
}

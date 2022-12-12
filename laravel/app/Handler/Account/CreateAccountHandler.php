<?php
namespace App\Handler\Account;

use App\Models\Account;
use App\Models\Client;
use App\Handler\BaseHandler;
use App\Http\DTO\Account\CreateAccountDto;

class CreateAccountHandler extends BaseHandler
{
    /**
     * @param CreateAccountDto $dto
     * @return Account|\Illuminate\Database\Eloquent\Model
     */
    public function handleCommand($dto)
    {
        $client = Client::create([
            'name' => $dto->name,
            'birth_date' => $dto->birthDay,
            'document' => $dto->document
        ]);

        return Account::create([
            'person_id' => $client->id,
            'balance' => $dto->balance,
            'daily_withdrawal_limit' => 0,
            'active' => true,
            'account_type' => Account::ACCOUNT_STATUS_DEFAULT
        ])->setRelation('client', $client);
    }
}

<?php

namespace Tests\Feature;

use App\Models\Account;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Tests\TestCase;

class BlockAccountTest extends TestCase
{
    public function testBlcokAccount()
    {
        $account = Account::with('client')->where('active', true)->first();
        $uuid = Str::uuid()->toString();

        DB::beginTransaction();

        $response = $this->put('/api/account/block', ['accountId' => $account->id]);
        $secondResponse = $this->put('/api/account/block', ['accountId' => $uuid]);

        $response->assertOk();
        $secondResponse->assertNotFound();

        $response->assertJsonPath('data',
            [
                "client" => [
                    "name" => $account->client->name,
                    "document" => $account->client->document,
                    "birthDay" => $account->client->birth_date,
                ],
                "balance" => $account->balance,
                "status" => false
            ]
        );

        DB::rollBack();
    }
}

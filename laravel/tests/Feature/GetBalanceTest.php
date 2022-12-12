<?php

namespace Tests\Feature;

use App\Models\Account;
use Illuminate\Support\Str;
use Tests\TestCase;

class GetBalanceTest extends TestCase
{
    public function testGetBalance()
    {
        $account = Account::where('active', true)->first();
        $uuid = Str::uuid()->toString();

        $response = $this->get("api/account/{$account->id}/balance");
        $secondResponse = $this->get("api/account/{$uuid}/balance");

        $response->assertOk();
        $secondResponse->assertNotFound();

        $response->assertJsonPath('data', ['balance' => $account->balance]);
    }
}

<?php

namespace Tests\Feature;

use App\Models\Account;
use Tests\TestCase;

class GetHistoryTransactionTest extends TestCase
{
    public function testHistoryTransaction()
    {
        $account = Account::where('active', true)->first();

        $response = $this->get("api/transaction/{$account->id}/history");

        $response->assertOk();
        $response->json();
    }
}

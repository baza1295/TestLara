<?php

namespace Tests\Feature;

use App\Models\Account;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Tests\TestCase;

class WithdrawalTest extends TestCase
{
    public function testWithdrawal()
    {
        $account = Account::where('active', 'true')->first();
        $uuid = Str::uuid()->toString();
        $data = [
            "accountId" => $account->id,
            "value" => 10000.25,
            "transactionDate" => "2000-01-12 00:00:00"
        ];
        $secondDate = [
            "accountId" => $uuid,
            "value" => 100000.25,
            "transactionDate" => "2000-01-12 00:00:00"
        ];

        DB::beginTransaction();

        $response = $this->post("api/transaction/replenishment", $data);
        $secondResponse = $this->post("api/transaction/replenishment", $secondDate);

        $response->assertCreated();
        $secondResponse->assertNotFound();

        $response->json();

        DB::rollBack();
    }
}

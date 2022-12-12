<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class CreateAccountTest extends TestCase
{
    public function testCreateAccount()
    {
        $data = [
            "name" => "Ivanov",
            "document" => "qwerty",
            "birthDay" => "2000-10-10 00:00:00",
            "balance" => 1500
        ];


        DB::beginTransaction();

        $response = $this->post(
            'api/account/',
            $data
        );
        $response->assertCreated();
        $response->assertJsonPath('data',
            [
                "client" => [
                    "name" => 'Ivanov',
                    "document" => 'qwerty',
                    "birthDay" => '2000-10-10 00:00:00',
                ],
                "balance" => 1500,
                "status" => true
            ]
        );

        DB::rollBack();
    }
}

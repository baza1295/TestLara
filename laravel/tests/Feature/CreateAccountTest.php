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

        $data['status'] = true;

        $response->assertJsonPath('data', $data);

        DB::rollBack();
    }
}

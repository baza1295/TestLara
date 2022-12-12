<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Client;
use Faker\Factory;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $clients = Client::all();
        foreach ($clients as $client) {
            Account::updateOrCreate(
                ['person_id' => $client->id],
                [
                    'balance' => $faker->unique()->randomFloat('2', -1000, 1000),
                    'daily_withdrawal_limit' => $faker->randomFloat(0, 0,2),
                    'active' => $faker->boolean,
                    'account_type' => $faker->numberBetween(1, 5),
                ]
            );
        }
    }
}

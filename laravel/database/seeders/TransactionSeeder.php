<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Transaction;
use Faker\Factory;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        Account::chunkById(50, function($accounts) use ($faker) {
            $accounts->each(function ($account) use ($faker) {
                $balance = 0;
                for ($i = 0; $i < 3; $i++) {
                    $value = $faker->randomFloat(2, -1000, 1000);
                    $balance += $value;
                    Transaction::create([
                        'account_id' => $account->id,
                        'value' => $value,
                        'transaction_date' => $faker->dateTime('-1 year')
                    ]);
                }
                $account->balance = $balance;
                $account->save();
            });
        });
    }
}

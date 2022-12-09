<?php

namespace App\Console\Commands;

use App\Models\Account;
use Illuminate\Console\Command;

class UpdateDailyLimitCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:limit_update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update daily limit balance';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Account::chunkById(50, function($accounts) {
            $accounts->each(function ($account) {
                $account->daily_withdrawal_limit = 0;
                $account->save();
            });
        });

        return 0;
    }
}

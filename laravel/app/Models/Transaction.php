<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends UuidPrimaryKey
{
    use HasFactory;

    protected $table = 'transactions';

    protected $fillable = [
        'account_id',
        'value',
        'transaction_date',
    ];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}

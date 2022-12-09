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

    protected $casts = [
        'transaction_date' => 'datetime'
    ];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}

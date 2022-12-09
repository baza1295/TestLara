<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Account extends UuidPrimaryKey
{
    use HasFactory;

    const ACCOUNT_STATUS_DEFAULT = 1;

    protected $table = 'accounts';

    protected $fillable = [
        'person_id',
        'balance',
        'daily_withdrawal_limit',
        'active',
        'account_type'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'person_id', 'id');
    }
}

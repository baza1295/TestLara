<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends UuidPrimaryKey
{
    use HasFactory;

    protected $table = 'clients';

    protected $fillable = [
        'name',
        'document',
        'birth_date',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Account
 *
 * @property string $id
 * @property string $person_id
 * @property float $balance
 * @property float $daily_withdrawal_limit
 * @property bool $active
 * @property int $account_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Client $client
 * @method static \Illuminate\Database\Eloquent\Builder|Account newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Account newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Account query()
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereAccountType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereDailyWithdrawalLimit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account wherePersonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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

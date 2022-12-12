<?php

namespace App\Http\DTO\Account;

use Spatie\DataTransferObject\DataTransferObject;

class BlockAccountDto extends DataTransferObject
{
    public string $accountId;
}

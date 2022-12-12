<?php
namespace App\Http\DTO\Account;

use Spatie\DataTransferObject\DataTransferObject;

class CreateAccountDto extends DataTransferObject
{
    public string $name;
    public string $document;
    public ?string $birthDay;
    public ?float $balance;
}

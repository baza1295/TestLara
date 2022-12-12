<?php
namespace App\Http\DTO\Transaction;

use Spatie\DataTransferObject\DataTransferObject;

class TransactionDto extends DataTransferObject
{
    public string $accountId;
    public float $value;
    public string $transactionDate;
}

<?php

namespace App\Contracts\Services;

use App\Enums\PaymentMethods;
use App\Models\Transaction\Transaction;

interface TransactionServiceInterface
{
    public function create(string $accountNumber, float $value, PaymentMethods $paymentMethod): Transaction;
}

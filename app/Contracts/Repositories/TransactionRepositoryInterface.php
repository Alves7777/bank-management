<?php

namespace App\Contracts\Repositories;

use App\Models\Transaction\Transaction;

interface TransactionRepositoryInterface
{
    public function create(string $accountNumber, float $value, string $paymentMethod): Transaction;
}

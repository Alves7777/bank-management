<?php

namespace App\Repositories\Transaction;

use App\Contracts\Repositories\TransactionRepositoryInterface;
use App\Models\Transaction\Transaction;

class TransactionRepository implements TransactionRepositoryInterface
{
    public function __construct(private readonly Transaction $model)
    {
    }

    public function create(string $accountNumber, float $value, string $paymentMethod): Transaction
    {
        return $this->model->create([
            'account_number' => $accountNumber,
            'value' => $value,
            'payment_method' => $paymentMethod,
        ]);
    }
}

<?php

namespace App\Services\Transaction;

use App\Enums\PaymentMethods;
use App\Models\Transaction\Transaction;
use App\Repositories\Transaction\TransactionRepository;

class TransactionService extends TransactionRepository
{
    private TransactionRepository $transactionRepository;

    public function __construct(TransactionRepository $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }

    public function create(array $data): Transaction
    {
        $paymentMethod = PaymentMethods::from($data['payment_method']);

        $data['value'] += $data['value'] * $paymentMethod->fee();

        $data['payment_method'] = $paymentMethod->name;

        return $this->transactionRepository->create($data);
    }
}

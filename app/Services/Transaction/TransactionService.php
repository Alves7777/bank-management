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
        $data['payment_method'] = PaymentMethods::from($data['payment_method'])->name;

        return $this->transactionRepository->create($data);
    }
}

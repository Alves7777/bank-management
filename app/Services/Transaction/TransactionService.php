<?php

namespace App\Services\Transaction;

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
        return $this->transactionRepository->create($data);
    }
}

<?php

namespace App\Repositories\Transaction;

use App\Models\Transaction\Transaction;

class TransactionRepository
{
    private Transaction $model;

    public function __construct(Transaction $model)
    {
        $this->model = $model;
    }

    public function create(array $data): Transaction
    {
        return $this->model->create($data);
    }
}

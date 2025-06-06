<?php

namespace App\Repositories\Transaction;

use App\Models\Transaction\CustomTransaction;

class CustomTransactionRepository
{
    private CustomTransaction $model;

    public function __construct(CustomTransaction $model)
    {
        $this->model = $model;
    }

    public function create(array $data): CustomTransaction
    {
        return $this->model->create($data);
    }

    public function all()
    {
        return $this->model->all();
    }

    public function find($id): ?CustomTransaction
    {
        return $this->model->find($id);
    }

    public function update($id, array $data): bool
    {
        $transaction = $this->find($id);
        return $transaction ? $transaction->update($data) : false;
    }

    public function delete($id): bool
    {
        $transaction = $this->find($id);
        return $transaction ? $transaction->delete() : false;
    }
}

<?php

namespace App\Repositories\Bank;

use App\Models\Bank;

class BankRepository
{
    private Bank $model;

    public function __construct(Bank $model)
    {
        $this->model = $model;
    }

    public function create(array $data): Bank
    {
        return $this->model->create($data);
    }

    public function all()
    {
        return $this->model->all();
    }

    public function find($id): ?Bank
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

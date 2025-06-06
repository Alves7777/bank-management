<?php

namespace App\Repositories;

use App\Models\Bill;

class BillRepository
{
    private Bill $model;

    public function __construct(Bill $model)
    {
        $this->model = $model;
    }

    public function create(array $data): Bill
    {
        return $this->model->create($data);
    }

    public function all()
    {
        return $this->model->all();
    }

    public function find($id): ?Bill
    {
        return $this->model->find($id);
    }

    public function update($id, array $data): bool
    {
        $bill = $this->find($id);
        return $bill ? $bill->update($data) : false;
    }

    public function delete($id): bool
    {
        $bill = $this->find($id);
        return $bill ? $bill->delete() : false;
    }
}

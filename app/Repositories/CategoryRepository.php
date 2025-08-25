<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
    private Category $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    public function create(array $data): Category
    {
        return $this->model->create($data);
    }

    public function all()
    {
        return $this->model->all();
    }

    public function find($id): ?Category
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

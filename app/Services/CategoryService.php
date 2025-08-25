<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use Exception;

class CategoryService
{
    private CategoryRepository $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(array $data)
    {
        return $this->repository->create($data);
    }

    public function all()
    {
        return $this->repository->all();
    }

    public function find($id)
    {
        $item = $this->repository->find($id);
        if (!$item) {
            throw new Exception('Category não encontrado', 404);
        }
        return $item;
    }

    public function update($id, array $data)
    {
        if (!$this->repository->update($id, $data)) {
            throw new Exception('Falha ao atualizar Category', 400);
        }
        return $this->find($id);
    }

    public function delete($id)
    {
        if (!$this->repository->delete($id)) {
            throw new Exception('Falha ao deletar Category', 400);
        }
        return true;
    }
}

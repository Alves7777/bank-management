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
        $category = $this->repository->find($id);
        if (!$category) {
            throw new Exception('Categoria não encontrada', 404);
        }
        return $category;
    }

    public function update($id, array $data)
    {
        if (!$this->repository->update($id, $data)) {
            throw new Exception('Falha ao atualizar categoria', 400);
        }
        return $this->find($id);
    }

    public function delete($id)
    {
        if (!$this->repository->delete($id)) {
            throw new Exception('Falha ao deletar categoria', 400);
        }
        return true;
    }
}

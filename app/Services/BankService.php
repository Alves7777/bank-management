<?php

namespace App\Services\Bank;

use App\Repositories\Bank\BankRepository;
use Exception;

class BankService
{
    private BankRepository $repository;

    public function __construct(BankRepository $repository)
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
            throw new Exception('Bank não encontrado', 404);
        }
        return $item;
    }

    public function update($id, array $data)
    {
        if (!$this->repository->update($id, $data)) {
            throw new Exception('Falha ao atualizar Bank', 400);
        }
        return $this->find($id);
    }

    public function delete($id)
    {
        if (!$this->repository->delete($id)) {
            throw new Exception('Falha ao deletar Bank', 400);
        }
        return true;
    }
}
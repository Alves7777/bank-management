<?php

namespace App\Services\Transaction;

use App\Repositories\Transaction\CustomTransactionRepository;
use Exception;

class CustomTransactionService
{
    private CustomTransactionRepository $repository;

    public function __construct(CustomTransactionRepository $repository)
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
        $transaction = $this->repository->find($id);
        if (!$transaction) {
            throw new Exception('Transação não encontrada', 404);
        }
        return $transaction;
    }

    public function update($id, array $data)
    {
        if (!$this->repository->update($id, $data)) {
            throw new Exception('Falha ao atualizar transação', 400);
        }
        return $this->find($id);
    }

    public function delete($id)
    {
        if (!$this->repository->delete($id)) {
            throw new Exception('Falha ao deletar transação', 400);
        }
        return true;
    }
}

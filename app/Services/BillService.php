<?php

namespace App\Services;

use App\Repositories\BillRepository;
use Exception;

class BillService
{
    private BillRepository $repository;

    public function __construct(BillRepository $repository)
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
        $bill = $this->repository->find($id);
        if (!$bill) {
            throw new Exception('Bill not found', 404);
        }
        return $bill;
    }

    public function update($id, array $data)
    {
        if (!$this->repository->update($id, $data)) {
            throw new Exception('Failed to update bill', 400);
        }
        return $this->find($id);
    }

    public function delete($id)
    {
        if (!$this->repository->delete($id)) {
            throw new Exception('Failed to delete bill', 400);
        }
        return true;
    }
}

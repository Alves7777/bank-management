<?php

namespace App\Services;

use App\Repositories\FinancialSummarySnapshotRepository;

class FinancialSummarySnapshotService
{
    protected $repository;

    public function __construct(FinancialSummarySnapshotRepository $repository)
    {
        $this->repository = $repository;
    }

    public function createSnapshot(array $data)
    {
        // Calcula os campos
        $debits = array_sum($data['debits'] ?? []);
        $others = array_sum($data['others'] ?? []);
        $total_money = $data['money'] + $debits + $others;
        $balance = $total_money - $data['total_expenses'];
        $savings_balance = $balance - $data['can_spend_only'];

        $payload = [
            'total_expenses' => $data['total_expenses'],
            'money' => $data['money'],
            'debits' => $data['debits'],
            'others' => $data['others'],
            'total_money' => $total_money,
            'balance' => $balance,
            'savings_balance' => $savings_balance,
            'can_spend_only' => $data['can_spend_only'],
        ];
        return $this->repository->create($payload);
    }

    public function listSnapshots()
    {
        return $this->repository->all();
    }
}

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
        $savings_limit = $data['savings_limit'] ?? 500;
        $savings_balance = $balance > $savings_limit ? $balance - $savings_limit : 0;
        $can_spend_only = $balance > $savings_limit ? $savings_limit : $balance;

        $payload = [
            'total_expenses' => $data['total_expenses'],
            'money' => $data['money'],
            'debits' => $data['debits'],
            'others' => $data['others'],
            'total_money' => $total_money,
            'balance' => $balance,
            'savings_balance' => $savings_balance,
            'can_spend_only' => $can_spend_only,
            'savings_limit' => $savings_limit,
        ];
        return $this->repository->create($payload);
    }

    public function listSnapshots()
    {
        return $this->repository->all();
    }
}

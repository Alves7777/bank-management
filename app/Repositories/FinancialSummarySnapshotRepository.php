<?php

namespace App\Repositories;

use App\Models\FinancialSummarySnapshot;

class FinancialSummarySnapshotRepository
{
    public function create(array $data): FinancialSummarySnapshot
    {
        return FinancialSummarySnapshot::create($data);
    }

    public function all()
    {
        return FinancialSummarySnapshot::orderByDesc('created_at')->get();
    }
}

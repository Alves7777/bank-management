<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFinancialSummarySnapshotRequest;
use App\Services\FinancialSummarySnapshotService;
use Illuminate\Http\Request;

class FinancialSummarySnapshotController extends Controller
{
    protected $service;

    public function __construct(FinancialSummarySnapshotService $service)
    {
        $this->service = $service;
    }

    public function store(StoreFinancialSummarySnapshotRequest $request)
    {
        $snapshot = $this->service->createSnapshot($request->validated());
        return response()->json($snapshot, 201);
    }

    public function index()
    {
        $snapshots = $this->service->listSnapshots();
        return response()->json($snapshots);
    }
}

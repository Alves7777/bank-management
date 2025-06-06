<?php

namespace App\Http\Controllers\V1;

use App\Core\Services\ApiResponseService;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFinancialSummarySnapshotRequest;
use App\Services\FinancialSummarySnapshotService;
use Exception;
use Illuminate\Http\Request;

class FinancialSummarySnapshotController extends Controller
{
    protected $service;
    private ApiResponseService $apiResponseService;

    public function __construct(ApiResponseService $apiResponseService, FinancialSummarySnapshotService $service)
    {
        $this->apiResponseService = $apiResponseService;
        $this->service = $service;
    }

    public function store(StoreFinancialSummarySnapshotRequest $request)
    {
        try {
            $snapshot = $this->service->createSnapshot($request->validated());
            return $this->apiResponseService->success($snapshot, 'Financial summary snapshot created successfully');
        } catch (Exception $e) {
            return $this->apiResponseService->fail($e->getMessage(), $e->getCode());
        }
    }

    public function index()
    {
        try {
            $snapshots = $this->service->listSnapshots();
            return $this->apiResponseService->success($snapshots, 'Financial summary snapshots fetched successfully');
        } catch (Exception $e) {
            return $this->apiResponseService->fail($e->getMessage(), $e->getCode());
        }
    }
}

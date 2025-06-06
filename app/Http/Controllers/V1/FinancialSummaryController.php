<?php

namespace App\Http\Controllers\V1;

use App\Core\Services\ApiResponseService;
use App\Http\Controllers\Controller;
use App\Http\Requests\FinancialSummaryRequest;
use App\Services\FinancialSummaryService;
use Exception;
use Illuminate\Http\JsonResponse;

class FinancialSummaryController extends Controller
{
    protected $service;
    private ApiResponseService $apiResponseService;

    public function __construct(ApiResponseService $apiResponseService, FinancialSummaryService $service)
    {
        $this->apiResponseService = $apiResponseService;
        $this->service = $service;
    }

    public function __invoke(FinancialSummaryRequest $request): JsonResponse
    {
        try {
            $data = $request->validated();
            $summary = $this->service->calculateSummary($data);
            return $this->apiResponseService->success($summary, 'Financial summary calculated successfully', 200);
        } catch (Exception $e) {
            return $this->apiResponseService->fail($e->getMessage(), $e->getCode());
        }
    }
}

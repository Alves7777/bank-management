<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\FinancialSummaryRequest;
use App\Services\FinancialSummaryService;
use Illuminate\Http\JsonResponse;

class FinancialSummaryController extends Controller
{
    protected $service;

    public function __construct(FinancialSummaryService $service)
    {
        $this->service = $service;
    }

    public function __invoke(FinancialSummaryRequest $request): JsonResponse
    {
        $data = $request->validated();
        $summary = $this->service->calculateSummary($data);
        return response()->json($summary);
    }
}

<?php

namespace App\Http\Controllers\V1\Transaction;

use App\Core\Services\ApiResponseService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Transaction\StoreTransactionRequest;
use App\Services\Transaction\TransactionService;
use Illuminate\Http\JsonResponse;
use Exception;

class TransactionController extends Controller
{
    private TransactionService $transactionService;
    private ApiResponseService $apiResponseService;

    public function __construct(ApiResponseService $apiResponseService, TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
        $this->apiResponseService = $apiResponseService;
    }

    public function store(StoreTransactionRequest $request):JsonResponse
    {
        try {
            $data = $this->transactionService->create($request->validated());
            return $this->apiResponseService->success($data, 'registered successfully');
        } catch (Exception $e) {
            return $this->apiResponseService->fail($e->getMessage(), $e->getCode());
        }
    }
}

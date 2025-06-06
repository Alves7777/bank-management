<?php

namespace App\Http\Controllers\V1\Transaction;

use App\Core\Services\ApiResponseService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Transaction\StoreCustomTransactionRequest;
use App\Http\Requests\Transaction\UpdateCustomTransactionRequest;
use App\Services\Transaction\CustomTransactionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Exception;

class CustomTransactionController extends Controller
{
    private CustomTransactionService $service;
    private ApiResponseService $apiResponseService;

    public function __construct(ApiResponseService $apiResponseService, CustomTransactionService $service)
    {
        $this->service = $service;
        $this->apiResponseService = $apiResponseService;
    }

    public function index(): JsonResponse
    {
        $data = $this->service->all();
        return $this->apiResponseService->success($data);
    }

    public function store(StoreCustomTransactionRequest $request): JsonResponse
    {
        try {
            $data = $this->service->create($request->validated());
            return $this->apiResponseService->success($data, 'Transação criada com sucesso');
        } catch (Exception $e) {
            return $this->apiResponseService->fail($e->getMessage(), $e->getCode());
        }
    }

    public function show(StoreCustomTransactionRequest $id): JsonResponse
    {
        try {
            $data = $this->service->find($id);
            return $this->apiResponseService->success($data);
        } catch (Exception $e) {
            return $this->apiResponseService->fail($e->getMessage(), $e->getCode());
        }
    }

    public function update(UpdateCustomTransactionRequest $request, $id): JsonResponse
    {
        try {
            $data = $this->service->update($id, $request->validated());
            return $this->apiResponseService->success($data, 'Transação atualizada com sucesso');
        } catch (Exception $e) {
            return $this->apiResponseService->fail($e->getMessage(), $e->getCode());
        }
    }

    public function destroy($id): JsonResponse
    {
        try {
            $this->service->delete($id);
            return $this->apiResponseService->success(null, 'Transação deletada com sucesso');
        } catch (Exception $e) {
            return $this->apiResponseService->fail($e->getMessage(), $e->getCode());
        }
    }
}

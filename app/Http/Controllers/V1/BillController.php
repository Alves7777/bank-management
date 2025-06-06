<?php

namespace App\Http\Controllers\V1;

use App\Core\Services\ApiResponseService;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBillRequest;
use App\Http\Requests\UpdateBillRequest;
use App\Services\BillService;
use Illuminate\Http\JsonResponse;
use Exception;

class BillController extends Controller
{
    private BillService $service;
    private ApiResponseService $apiResponseService;

    public function __construct(ApiResponseService $apiResponseService, BillService $service)
    {
        $this->service = $service;
        $this->apiResponseService = $apiResponseService;
    }

    public function index(): JsonResponse
    {
        $data = $this->service->all();
        return $this->apiResponseService->success($data);
    }

    public function store(StoreBillRequest $request): JsonResponse
    {
        try {
            $data = $this->service->create($request->validated());
            return $this->apiResponseService->success($data, 'Bill created successfully');
        } catch (Exception $e) {
            return $this->apiResponseService->fail($e->getMessage(), $e->getCode());
        }
    }

    public function show($id): JsonResponse
    {
        try {
            $data = $this->service->find($id);
            return $this->apiResponseService->success($data);
        } catch (Exception $e) {
            return $this->apiResponseService->fail($e->getMessage(), $e->getCode());
        }
    }

    public function update(UpdateBillRequest $request, $id): JsonResponse
    {
        try {
            $data = $this->service->update($id, $request->validated());
            return $this->apiResponseService->success($data, 'Bill updated successfully');
        } catch (Exception $e) {
            return $this->apiResponseService->fail($e->getMessage(), $e->getCode());
        }
    }

    public function destroy($id): JsonResponse
    {
        try {
            $this->service->delete($id);
            return $this->apiResponseService->success(null, 'Bill deleted successfully');
        } catch (Exception $e) {
            return $this->apiResponseService->fail($e->getMessage(), $e->getCode());
        }
    }
}

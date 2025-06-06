<?php

namespace App\Http\Controllers\V1;

use App\Core\Services\ApiResponseService;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Services\CategoryService;
use Illuminate\Http\JsonResponse;
use Exception;

class CategoryController extends Controller
{
    private CategoryService $service;
    private ApiResponseService $apiResponseService;

    public function __construct(ApiResponseService $apiResponseService, CategoryService $service)
    {
        $this->service = $service;
        $this->apiResponseService = $apiResponseService;
    }

    public function index(): JsonResponse
    {
        $data = $this->service->all();
        return $this->apiResponseService->success($data);
    }

    public function store(StoreCategoryRequest $request): JsonResponse
    {
        try {
            $data = $this->service->create($request->validated());
            return $this->apiResponseService->success($data, 'Categoria criada com sucesso');
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

    public function update(UpdateCategoryRequest $request, $id): JsonResponse
    {
        try {
            $data = $this->service->update($id, $request->validated());
            return $this->apiResponseService->success($data, 'Categoria atualizada com sucesso');
        } catch (Exception $e) {
            return $this->apiResponseService->fail($e->getMessage(), $e->getCode());
        }
    }

    public function destroy($id): JsonResponse
    {
        try {
            $this->service->delete($id);
            return $this->apiResponseService->success(null, 'Categoria deletada com sucesso');
        } catch (Exception $e) {
            return $this->apiResponseService->fail($e->getMessage(), $e->getCode());
        }
    }
}

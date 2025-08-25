<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Services\CategoryService;
use Illuminate\Http\JsonResponse;
use Exception;

class CategoryController extends Controller
{
    private CategoryService $service;

    public function __construct(CategoryService $service)
    {
        $this->service = $service;
    }

    public function index(): JsonResponse
    {
        $data = $this->service->all();
        return $this->success($data);
    }

    public function store(StoreCategoryRequest $request): JsonResponse
    {
        try {
            $data = $this->service->create($request->validated());
            return $this->success($data, 'Category criado com sucesso');
        } catch (Exception $e) {
            return $this->fail($e->getMessage(), $e->getCode());
        }
    }

    public function show($id): JsonResponse
    {
        try {
            $data = $this->service->find($id);
            return $this->success($data);
        } catch (Exception $e) {
            return $this->fail($e->getMessage(), $e->getCode());
        }
    }

    public function update(UpdateCategoryRequest $request, $id): JsonResponse
    {
        try {
            $data = $this->service->update($id, $request->validated());
            return $this->success($data, 'Category atualizado com sucesso');
        } catch (Exception $e) {
            return $this->fail($e->getMessage(), $e->getCode());
        }
    }

    public function destroy($id): JsonResponse
    {
        try {
            $this->service->delete($id);
            return $this->success(null, 'Category deletado com sucesso');
        } catch (Exception $e) {
            return $this->fail($e->getMessage(), $e->getCode());
        }
    }
}

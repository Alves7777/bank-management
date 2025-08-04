<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Bank\StoreBankRequest;
use App\Http\Requests\Bank\UpdateBankRequest;
use App\Services\Bank\BankService;
use Illuminate\Http\JsonResponse;
use Exception;

class BankController extends Controller
{
    private BankService $service;

    public function __construct(BankService $service)
    {
        $this->service = $service;
    }

    public function index(): JsonResponse
    {
        $data = $this->service->all();
        return $this->success($data);
    }

    public function store(StoreBankRequest $request): JsonResponse
    {
        try {
            $data = $this->service->create($request->validated());
            return $this->success($data, 'Bank criado com sucesso');
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

    public function update(UpdateBankRequest $request, $id): JsonResponse
    {
        try {
            $data = $this->service->update($id, $request->validated());
            return $this->success($data, 'Bank atualizado com sucesso');
        } catch (Exception $e) {
            return $this->fail($e->getMessage(), $e->getCode());
        }
    }

    public function destroy($id): JsonResponse
    {
        try {
            $this->service->delete($id);
            return $this->success(null, 'Bank deletado com sucesso');
        } catch (Exception $e) {
            return $this->fail($e->getMessage(), $e->getCode());
        }
    }
}
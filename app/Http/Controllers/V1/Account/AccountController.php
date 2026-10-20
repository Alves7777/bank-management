<?php

namespace App\Http\Controllers\V1\Account;

use App\Abstracts\ApiResponseInterfaceService;
use App\Contracts\Services\AccountServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Account\StoreAccountRequest;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class AccountController extends Controller
{
    public function __construct(
        private readonly ApiResponseInterfaceService $apiResponseService,
        private readonly AccountServiceInterface $accountService,
    ) {
    }

    public function index(): JsonResponse
    {
        try {
            $data = $this->accountService->findByAccountNumber((string) request()->query('account_number', 0));

            return $this->apiResponseService->success($data, 'successfully listed', 200);
        } catch (ModelNotFoundException) {
            return $this->apiResponseService->fail('Número da conta não cadastrado.');
        } catch (Exception $e) {
            return $this->apiResponseService->fail($e->getMessage(), $e->getCode());
        }
    }

    public function store(StoreAccountRequest $request): JsonResponse
    {
        try {
            $data = $this->accountService->create($request->validated());

            return $this->apiResponseService->success($data, 'registered successfully');
        } catch (Exception $e) {
            return $this->apiResponseService->fail($e->getMessage(), $e->getCode());
        }
    }
}

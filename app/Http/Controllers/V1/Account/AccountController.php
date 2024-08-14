<?php

namespace App\Http\Controllers\V1\Account;

use App\Core\Services\ApiResponseService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Account\StoreAccountRequest;
use App\Services\Account\AccountService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Exception;

class AccountController extends Controller
{
    private AccountService $accountService;
    private ApiResponseService $apiResponseService;

    public function __construct(ApiResponseService $apiResponseService, AccountService $accountService)
    {
        $this->accountService = $accountService;
        $this->apiResponseService = $apiResponseService;
    }

    public function index(): JsonResponse
    {
        try {
            $data = $this->accountService->findByAccountNumber(request()->query('account_number',0));
            return $this->apiResponseService->success($data, 'successfully listed', 200);
        } catch (ModelNotFoundException $e) {
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

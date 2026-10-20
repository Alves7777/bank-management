<?php

namespace App\Http\Controllers\V1\Transaction;

use App\Abstracts\ApiResponseInterfaceService;
use App\Contracts\Services\TransactionServiceInterface;
use App\Enums\PaymentMethods;
use App\Exceptions\InsufficientBalanceException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Transaction\StoreTransactionRequest;
use Exception;
use Illuminate\Http\JsonResponse;

class TransactionController extends Controller
{
    public function __construct(
        private readonly ApiResponseInterfaceService $apiResponseService,
        private readonly TransactionServiceInterface $transactionService,
    ) {
    }

    public function store(StoreTransactionRequest $request): JsonResponse
    {
        try {
            $data = $request->validated();

            $transaction = $this->transactionService->create(
                accountNumber: (string) $data['account_number'],
                value: (float) $data['value'],
                paymentMethod: PaymentMethods::from($data['payment_method']),
            );

            return $this->apiResponseService->success($transaction, 'registered successfully');
        } catch (InsufficientBalanceException $e) {
            return $this->apiResponseService->fail($e->getMessage(), $e->getCode());
        } catch (Exception $e) {
            return $this->apiResponseService->fail($e->getMessage(), $e->getCode());
        }
    }
}

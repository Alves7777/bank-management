<?php

namespace App\Services\Transaction;

use App\Contracts\Payments\PaymentMethodResolverInterface;
use App\Contracts\Repositories\AccountRepositoryInterface;
use App\Contracts\Repositories\TransactionRepositoryInterface;
use App\Contracts\Services\TransactionServiceInterface;
use App\Enums\PaymentMethods;
use App\Exceptions\InsufficientBalanceException;
use App\Models\Transaction\Transaction;
use Illuminate\Support\Facades\DB;

class TransactionService implements TransactionServiceInterface
{
    public function __construct(
        private readonly TransactionRepositoryInterface $transactionRepository,
        private readonly AccountRepositoryInterface $accountRepository,
        private readonly PaymentMethodResolverInterface $paymentMethods,
    ) {
    }

    public function create(string $accountNumber, float $value, PaymentMethods $paymentMethod): Transaction
    {
        $payment = $this->paymentMethods->resolve($paymentMethod->value);
        $chargedValue = $payment->charge($value);

        return DB::transaction(function () use ($accountNumber, $chargedValue, $payment) {
            $account = $this->accountRepository->findByAccountNumberForUpdate($accountNumber);

            if ($chargedValue > $account->balance) {
                throw new InsufficientBalanceException((float) $account->balance);
            }

            $transaction = $this->transactionRepository->create(
                $accountNumber,
                $chargedValue,
                $payment->name(),
            );

            $this->accountRepository->updateAccountBalance($account, $chargedValue);

            return $transaction;
        });
    }
}

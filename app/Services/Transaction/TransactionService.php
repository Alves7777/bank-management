<?php

namespace App\Services\Transaction;

use App\Enums\PaymentMethods;
use App\Models\Transaction\Transaction;
use App\Repositories\Account\AccountRepository;
use App\Repositories\Transaction\TransactionRepository;
use Exception;

class TransactionService extends TransactionRepository
{
    private TransactionRepository $transactionRepository;
    private AccountRepository $accountRepository;

    public function __construct(TransactionRepository $transactionRepository, AccountRepository $accountRepository)
    {
        $this->transactionRepository = $transactionRepository;
        $this->accountRepository = $accountRepository;
    }

    public function create(array $data): Transaction
    {
        $paymentMethod = PaymentMethods::from($data['payment_method']);

        $data['value'] += $data['value'] * $paymentMethod->fee();
        $data['payment_method'] = $paymentMethod->name;

        $balance = $this->accountRepository->findByAccountNumber($data['account_number'])->balance;

        if ($data['value'] > $balance) {
            $balanceFormatted = number_format($balance, 2, ',', '.');
            throw new Exception("Saldo insuficiente para realizar transação. Saldo: {$balanceFormatted}", 404);
        }

        return $this->transactionRepository->create($data);
    }
}

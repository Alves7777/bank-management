<?php

namespace App\Services\Transaction;

use App\Enums\PaymentMethods;
use App\Models\Transaction\Transaction;
use App\Repositories\Account\AccountRepository;
use App\Repositories\Transaction\TransactionRepository;
use Exception;

class TransactionService
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

        $account = $this->accountRepository->findByAccountNumber($data['account_number']);

        if ($data['value'] > $account->balance) {
            $balanceFormatted = number_format($account->balance, 2, ',', '.');
            throw new Exception("Saldo insuficiente para realizar transação. Saldo: {$balanceFormatted}", 404);
        }

        $transaction = $this->transactionRepository->create($data);

        $this->accountRepository->updateAccountBalance($account, $data['value']);

        return $transaction;
    }
}

<?php

namespace App\Contracts\Repositories;

use App\Models\Account\Account;

interface AccountRepositoryInterface
{
    public function findByAccountNumber(string $accountNumber): Account;

    public function findByAccountNumberForUpdate(string $accountNumber): Account;

    public function create(array $data): Account;

    public function updateAccountBalance(Account $account, float $transactionValue): void;
}

<?php

namespace App\Services\Account;

use App\Contracts\Repositories\AccountRepositoryInterface;
use App\Contracts\Services\AccountServiceInterface;
use App\Models\Account\Account;

class AccountService implements AccountServiceInterface
{
    public function __construct(private readonly AccountRepositoryInterface $accountRepository)
    {
    }

    public function findByAccountNumber(string $accountNumber): Account
    {
        return $this->accountRepository->findByAccountNumber($accountNumber);
    }

    public function create(array $data): Account
    {
        return $this->accountRepository->create($data);
    }
}

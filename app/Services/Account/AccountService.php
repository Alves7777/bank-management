<?php

namespace App\Services\Account;

use App\Models\Account\Account;
use App\Repositories\Account\AccountRepository;
use Illuminate\Database\Eloquent\Collection;

class AccountService
{
    private AccountRepository $accountRepository;

    public function __construct(AccountRepository $accountRepository)
    {
        $this->accountRepository = $accountRepository;
    }

    public function findByAccountNumber(string $accountNumber): ?Account
    {
        return $this->accountRepository->findByAccountNumber($accountNumber);
    }

    public function create(array $data): Account
    {
        return $this->accountRepository->create($data);
    }
}

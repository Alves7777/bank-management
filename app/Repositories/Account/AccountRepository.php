<?php

namespace App\Repositories\Account;

use App\Contracts\Repositories\AccountRepositoryInterface;
use App\Models\Account\Account;

class AccountRepository implements AccountRepositoryInterface
{
    public function __construct(private readonly Account $model)
    {
    }

    public function findByAccountNumber(string $accountNumber): Account
    {
        return $this->model->whereAccountNumber($accountNumber)->firstOrFail();
    }

    public function findByAccountNumberForUpdate(string $accountNumber): Account
    {
        return $this->model
            ->whereAccountNumber($accountNumber)
            ->lockForUpdate()
            ->firstOrFail();
    }

    public function create(array $data): Account
    {
        return $this->model->create($data);
    }

    public function updateAccountBalance(Account $account, float $transactionValue): void
    {
        $account->balance -= $transactionValue;
        $account->save();
    }
}

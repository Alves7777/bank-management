<?php

namespace App\Repositories\Account;

use App\Models\Account\Account;
use App\Models\BuildingEntrance\VisitorCard;
use Illuminate\Database\Eloquent\Collection;

class AccountRepository
{
    private Account $model;

    public function __construct(Account $model)
    {
        $this->model = $model;
    }

    public function findByAccountNumber(string $accountNumber): ?Account
    {
        return $this->model->whereAccountNumber($accountNumber)->firstOrfail();
    }

    public function create(array $data): Account
    {
        return $this->model->create($data);
    }
}

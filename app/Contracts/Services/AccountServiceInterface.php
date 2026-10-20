<?php

namespace App\Contracts\Services;

use App\Models\Account\Account;

interface AccountServiceInterface
{
    public function findByAccountNumber(string $accountNumber): Account;

    public function create(array $data): Account;
}

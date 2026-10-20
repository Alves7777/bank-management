<?php

namespace App\Exceptions;

use Exception;

class InsufficientBalanceException extends Exception
{
    public function __construct(float $balance)
    {
        $balanceFormatted = number_format($balance, 2, ',', '.');

        parent::__construct(
            "Saldo insuficiente para realizar transação. Saldo: R$ {$balanceFormatted}",
            404
        );
    }
}

<?php

namespace App\Enums;

enum PaymentMethods: string
{
    case PIX = 'P';
    case CREDIT_CARD = 'C';
    case DEBIT_CARD = 'D';

    public static function getPaymentMethodsList(): string
    {
        return implode(', ', array_map(fn($method) => "{$method->value}: {$method->name}", self::cases()));
    }
}

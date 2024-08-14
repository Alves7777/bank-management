<?php

namespace App\Enums;

enum PaymentMethods: string
{
    case PIX = 'P';
    case CREDIT_CARD = 'C';
    case DEBIT_CARD = 'D';

    public function fee(): float
    {
        return match ($this) {
            self::PIX => 0.0,
            self::CREDIT_CARD => 0.05,
            self::DEBIT_CARD => 0.03,
        };
    }

    public static function getPaymentMethodsList(): string
    {
        return implode(', ', array_map(fn($method) => "{$method->value}: {$method->name}", self::cases()));
    }
}

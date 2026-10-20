<?php

namespace App\Contracts\Payments;

interface PaymentMethodInterface
{
    public function code(): string;

    public function name(): string;

    public function feeRate(): float;

    public function charge(float $amount): float;
}

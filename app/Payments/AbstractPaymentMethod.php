<?php

namespace App\Payments;

use App\Contracts\Payments\PaymentMethodInterface;
use App\Enums\PaymentMethods;

abstract class AbstractPaymentMethod implements PaymentMethodInterface
{
    abstract protected function method(): PaymentMethods;

    public function code(): string
    {
        return $this->method()->value;
    }

    public function name(): string
    {
        return $this->method()->name;
    }

    public function charge(float $amount): float
    {
        return $amount + ($amount * $this->feeRate());
    }
}

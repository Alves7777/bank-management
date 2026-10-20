<?php

namespace App\Contracts\Payments;

interface PaymentMethodResolverInterface
{
    public function resolve(string $code): PaymentMethodInterface;
}

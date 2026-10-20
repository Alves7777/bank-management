<?php

namespace App\Payments;

use App\Enums\PaymentMethods;

class PixPayment extends AbstractPaymentMethod
{
    protected function method(): PaymentMethods
    {
        return PaymentMethods::PIX;
    }

    public function feeRate(): float
    {
        return 0.0;
    }
}

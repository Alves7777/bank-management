<?php

namespace App\Payments;

use App\Enums\PaymentMethods;

class CreditCardPayment extends AbstractPaymentMethod
{
    protected function method(): PaymentMethods
    {
        return PaymentMethods::CREDIT_CARD;
    }

    public function feeRate(): float
    {
        return 0.05;
    }
}

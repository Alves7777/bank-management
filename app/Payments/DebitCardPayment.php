<?php

namespace App\Payments;

use App\Enums\PaymentMethods;

class DebitCardPayment extends AbstractPaymentMethod
{
    protected function method(): PaymentMethods
    {
        return PaymentMethods::DEBIT_CARD;
    }

    public function feeRate(): float
    {
        return 0.03;
    }
}

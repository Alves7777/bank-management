<?php

namespace App\Payments;

use App\Contracts\Payments\PaymentMethodInterface;
use App\Contracts\Payments\PaymentMethodResolverInterface;
use InvalidArgumentException;

class PaymentMethodResolver implements PaymentMethodResolverInterface
{
    /**
     * @param array<string, PaymentMethodInterface> $methods
     */
    public function __construct(private readonly array $methods)
    {
    }

    public function resolve(string $code): PaymentMethodInterface
    {
        if (!isset($this->methods[$code])) {
            throw new InvalidArgumentException("Método de pagamento inválido: {$code}");
        }

        return $this->methods[$code];
    }
}

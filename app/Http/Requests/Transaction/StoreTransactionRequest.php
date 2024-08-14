<?php

namespace App\Http\Requests\Transaction;

use App\Enums\PaymentMethods;
use App\Http\Requests\BaseFormRequest;
use Illuminate\Validation\Rule;

class StoreTransactionRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'payment_method' => [
                'required',
                'string',
                Rule::in(array_column(PaymentMethods::cases(), 'value')),
            ],
            'account_number' => 'required|exists:accounts,account_number',
            'value' => 'required|numeric|gt:0',
        ];
    }

    public function messages(): array
    {
        return [
            'payment_method.in' => 'O método de pagamento deve ser um dos seguintes: ' . PaymentMethods::getPaymentMethodsList(),
        ];
    }
}

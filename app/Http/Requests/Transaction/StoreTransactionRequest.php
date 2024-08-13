<?php

namespace App\Http\Requests\Transaction;

use App\Http\Requests\BaseFormRequest;

class StoreTransactionRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'payment_method' => 'required|string',
            'account_number' => 'required|exists:accounts,account_number',
            'value' => 'required|numeric|gt:0',
        ];
    }
}

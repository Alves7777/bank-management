<?php

namespace App\Http\Requests\Transaction;

use App\Http\Requests\BaseFormRequest;

class StoreTransactionRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'payment_method' => 'required',
            'account_number' => 'required',
            'value' => 'required',
        ];
    }
}

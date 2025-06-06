<?php

namespace App\Http\Requests\Transaction;

use App\Http\Requests\BaseFormRequest;

class UpdateCustomTransactionRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'date' => 'sometimes|date',
            'title' => 'sometimes|string|max:255',
            'amount' => 'sometimes|numeric',
            'month' => 'sometimes|string|max:20',
        ];
    }
}

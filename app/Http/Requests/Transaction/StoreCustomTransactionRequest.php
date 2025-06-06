<?php

namespace App\Http\Requests\Transaction;

use App\Http\Requests\BaseFormRequest;

class StoreCustomTransactionRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'date' => 'required|date',
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'month' => 'required|string|max:20',
            'category_name' => 'required|string|exists:categories,name',
            'type' => 'required|string|max:50',
        ];
    }
}

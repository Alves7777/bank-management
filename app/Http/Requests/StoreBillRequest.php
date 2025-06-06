<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseFormRequest;

class StoreBillRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'month' => 'required|string|max:20',
            'debited' => 'required|boolean',
            'year' => 'required|integer',
            'type' => 'required|string|max:20',
            'description' => 'nullable|string|max:255',
            'amount' => 'required|numeric',
            'status' => 'required|string|in:PAID,PENDING',
            'notes' => 'nullable|string|max:255',
        ];
    }
}

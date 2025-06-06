<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseFormRequest;

class UpdateBillRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'month' => 'sometimes|string|max:20',
            'debited' => 'sometimes|boolean',
            'year' => 'sometimes|integer',
            'type' => 'sometimes|string|max:20',
            'description' => 'nullable|string|max:255',
            'amount' => 'sometimes|numeric',
            'status' => 'sometimes|string|in:PAID,PENDING',
            'notes' => 'nullable|string|max:255',
        ];
    }
}

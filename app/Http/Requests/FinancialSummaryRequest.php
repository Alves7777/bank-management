<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FinancialSummaryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'money' => 'required|array',
            'money.*' => 'numeric',
            'debito' => 'nullable|array',
            'debito.*' => 'numeric',
            'outros' => 'nullable|array',
            'outros.*' => 'numeric',
            'savings_limit' => 'nullable|numeric',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFinancialSummarySnapshotRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'total_expenses' => 'required|numeric',
            'money' => 'required|numeric',
            'debits' => 'nullable|array',
            'debits.*' => 'numeric',
            'others' => 'nullable|array',
            'others.*' => 'numeric',
            'can_spend_only' => 'required|numeric',
        ];
    }
}

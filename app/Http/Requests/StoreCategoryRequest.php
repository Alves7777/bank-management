<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseFormRequest;

class StoreCategoryRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:categories,name',
            'description' => 'nullable|string|max:255',
        ];
    }
}

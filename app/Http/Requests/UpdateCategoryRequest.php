<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseFormRequest;

class UpdateCategoryRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'sometimes|string|max:255|unique:categories,name',
            'description' => 'nullable|string|max:255',
        ];
    }
}

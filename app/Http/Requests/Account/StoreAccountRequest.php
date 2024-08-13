<?php

namespace App\Http\Requests\Account;

use App\Http\Requests\BaseFormRequest;

class StoreAccountRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'account_number' => 'required',
            'balance' => 'required',
        ];
    }
}

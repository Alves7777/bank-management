<?php

namespace App\Http\Requests;

abstract class BaseFormRequest extends AbstractFormRequest
{
    public function response(array $errors)
    {
        return response([
            'status' => 'fail',
            'data'  => implode('', $this->getValidatorInstance()->messages()->all()),
        ], 404);
    }
}

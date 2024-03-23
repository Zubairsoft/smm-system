<?php

namespace Domain\Supports\Concerns\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

trait HasFailedValidationRequest
{

    protected function failedValidation(Validator $validator): void
    {
        if ($validator->fails()) {
            throw new HttpResponseException(
                sendFailedResponse(
                    __('messages.validation_error'),
                    $validator->errors()->first(),
                    422
                )
            );
        }
    }
}

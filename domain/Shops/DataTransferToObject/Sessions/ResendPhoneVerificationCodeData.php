<?php

namespace Domain\Shops\DataTransferToObject\Sessions;

use Domain\Supports\Concerns\Requests\HasFailedValidationDtoRequest;
use Illuminate\Validation\Rule;
use Spatie\LaravelData\Data;

class ResendPhoneVerificationCodeData extends Data
{
    use HasFailedValidationDtoRequest;

    public function __construct(
        public string $id,
        public string $phone,
    ) {
    }

    public static function rules(): array
    {
        return [
            'id' => [
                'required',
                'uuid',
            ],
            'phone' => [
                'required',
                'max:15',
                Rule::unique('shops', 'phone')
            ],
        ];
    }
}

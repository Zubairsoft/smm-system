<?php

namespace Domain\Shops\DataTransferToObject\Cobones;

use Domain\Shops\Enums\CoboneTypeEnum;
use Domain\Supports\Concerns\Requests\HasFailedValidationDtoRequest;
use Illuminate\Validation\Rule;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class StoreCoboneData extends Data
{
    use HasFailedValidationDtoRequest;

    public function __construct(
        public string $token,
        #[MapInputName('cobone_type')]
        public int $type,
        public string $start_at,
        public string $end_at,
        public Optional|float $total_order

    ) {
    }

    public static function rules(): array
    {
        return [
            'token' => [
                'required',
                'min:10',
                'max:100',
            ],
            'cobone_type' => [
                'required',
                Rule::in(CoboneTypeEnum::getValues())
            ],
            'start_at' => [
                'required',
                'after_or_equal:today',
                'date_format:Y-m-d'
            ],
            'end_at' => [
                'required',
                'after:start_at',
                'date_format:Y-m-d'
            ],
            'total_order' => [
                'numeric',
                'min:1',
                Rule::requiredIf(request()->cobone_type ? CoboneTypeEnum::TOTAL_ORDER()->is((int)request()->cobone_type) : false),
                Rule::prohibitedIf(request()->cobone_type ? CoboneTypeEnum::SPECIFIC_PRODUCT()->is((int)request()->cobone_type) : false)
            ],
        ];
    }
}

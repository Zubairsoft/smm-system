<?php

namespace Domain\Shops\DataTransferToObject\Coupons;

use Domain\Shops\Enums\CouponTypeEnum;
use Domain\Supports\Concerns\Requests\HasFailedValidationDtoRequest;
use Illuminate\Validation\Rule;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class UpdateCouponData extends Data
{
    use HasFailedValidationDtoRequest;

    public function __construct(
        #[MapInputName('cobone_type')]
        public Optional|int $type,
        public Optional|string $start_at,
        public Optional|string $end_at,
        public Optional|float $total_order

    ) {
    }

    public static function rules(): array
    {
        return [
            'cobone_type' => [
                Rule::in(CouponTypeEnum::getValues())
            ],
            'start_at' => [
                'after_or_equal:today',
                'date_format:Y-m-d'
            ],
            'end_at' => [
                'after:start_at',
                'date_format:Y-m-d'
            ],
            'total_order' => [
                'numeric',
                'min:1',
                'total_order' => [
                    'numeric',
                    'min:1',
                    Rule::requiredIf(request()->cobone_type ? CouponTypeEnum::fromValue((int)request()->cobone_type)->is(CouponTypeEnum::TOTAL_ORDER) : false),
                    Rule::prohibitedIf(request()->cobone_type ? CouponTypeEnum::fromValue((int)request()->cobone_type)->is(CouponTypeEnum::SPECIFIC_PRODUCT) : false)
                ],
            ],
        ];
    }
}

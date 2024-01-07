<?php

use Domain\Shops\Enums\CouponTypeEnum;
use Domain\Supports\Enums\CurrencyEnum;

return [
    CurrencyEnum::class => [
        CurrencyEnum::SAR => 'Saudi Real',
        CurrencyEnum::YER => 'Yemeni Real',
        CurrencyEnum::USD => '$',
        CurrencyEnum::UAE => 'UAE Drhum',
    ],
    CouponTypeEnum::class => [
        CouponTypeEnum::TOTAL_ORDER => 'Total Order',
        CouponTypeEnum::SPECIFIC_PRODUCT => 'Specific Products',
    ]
];

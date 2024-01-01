<?php

use Domain\Shops\Enums\CoboneTypeEnum;
use Domain\Supports\Enums\CurrencyEnum;

return [
    CurrencyEnum::class => [
        CurrencyEnum::SAR => 'ريال سعودي',
        CurrencyEnum::YER => 'ريال يمني',
        CurrencyEnum::USD => 'دولار امريكي',
        CurrencyEnum::UAE => 'درهم اماراتي',
    ],
    CoboneTypeEnum::class => [
        CoboneTypeEnum::TOTAL_ORDER => 'اخمالي الطلب',
        CoboneTypeEnum::SPECIFIC_PRODUCT => 'منتجات محددة',
    ]
];

<?php

use Domain\Shops\Enums\CoboneTypeEnum;
use Domain\Supports\Enums\CurrencyEnum;

return [
    CurrencyEnum::class => [
        CurrencyEnum::SAR => 'Saudi Real',
        CurrencyEnum::YER => 'Yemeni Real',
        CurrencyEnum::USD => '$',
        CurrencyEnum::UAE => 'UAE Drhum',
    ],
    CoboneTypeEnum::class => [
        CoboneTypeEnum::TOTAL_ORDER => 'Total Order',
        CoboneTypeEnum::SPECIFIC_PRODUCT => 'Specific Products',
    ]
];

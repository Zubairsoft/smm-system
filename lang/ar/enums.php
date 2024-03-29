<?php

use Domain\Shops\Enums\CouponTypeEnum;
use Domain\Supports\Enums\CurrencyEnum;
use Domain\Supports\Enums\TransactionTypeEnum;

return [
    CurrencyEnum::class => [
        CurrencyEnum::SAR => 'ريال سعودي',
        CurrencyEnum::YER => 'ريال يمني',
        CurrencyEnum::USD => 'دولار امريكي',
        CurrencyEnum::UAE => 'درهم اماراتي',
    ],
    CouponTypeEnum::class => [
        CouponTypeEnum::TOTAL_ORDER => 'اخمالي الطلب',
        CouponTypeEnum::SPECIFIC_PRODUCT => 'منتجات محددة',
    ],
    TransactionTypeEnum::class => [
        TransactionTypeEnum::DEPOSIT => 'ايداع',
        TransactionTypeEnum::WITHDRAWAL => 'سحب'
    ],

];

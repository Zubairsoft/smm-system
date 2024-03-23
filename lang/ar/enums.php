<?php

use Domain\Shops\Enums\CouponTypeEnum;
use Domain\Shops\Enums\ProductInquireStatusEnum;
use Domain\Shops\Enums\SupportTicketEnum;
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
    SupportTicketEnum::class => [
        SupportTicketEnum::UNDER_REVIEW => 'قيد المراجعه',
        SupportTicketEnum::SOLVED => 'تم الحل'
    ],
    ProductInquireStatusEnum::class => [
        ProductInquireStatusEnum::PENDING => 'قيد الانتظار',
        ProductInquireStatusEnum::REPLIED => 'تم الرد'
    ],
];

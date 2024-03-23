<?php

use Domain\Shops\Enums\CouponTypeEnum;
use Domain\Shops\Enums\ProductInquireStatusEnum;
use Domain\Shops\Enums\SupportTicketEnum;
use Domain\Supports\Enums\CurrencyEnum;
use Domain\Supports\Enums\TransactionTypeEnum;

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
    ],
    TransactionTypeEnum::class => [
        TransactionTypeEnum::DEPOSIT => 'DEPOSIT',
        TransactionTypeEnum::WITHDRAWAL => 'WITHDRAWAL'
    ],
    SupportTicketEnum::class => [
        SupportTicketEnum::UNDER_REVIEW => 'UNDER REVIEW',
        SupportTicketEnum::SOLVED => 'SOLVED'
    ],
    ProductInquireStatusEnum::class => [
        ProductInquireStatusEnum::PENDING => 'PENDING',
        ProductInquireStatusEnum::REPLIED => 'REPLIED',
    ],
];

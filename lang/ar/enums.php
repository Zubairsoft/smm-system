<?php

use Domains\Admins\Enums\ReportStatusEnum;
use Domains\Supports\Enums\GenderEnum;

return [
    GenderEnum::class => [
        GenderEnum::MALE => 'ذكر',
        GenderEnum::FEMALE => 'انثى',
    ],
    ReportStatusEnum::class => [
        ReportStatusEnum::NEW => 'جديد',
        ReportStatusEnum::READ => 'تمت القراءة',
        ReportStatusEnum::SOLVE => 'تم الحل',
    ]
];

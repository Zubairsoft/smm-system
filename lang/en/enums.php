<?php

use Domains\Admins\Enums\ReportStatusEnum;
use Domains\Supports\Enums\GenderEnum;

return [
    GenderEnum::class => [
        GenderEnum::MALE => 'MALE',
        GenderEnum::FEMALE => 'FEMALE',
    ],
    ReportStatusEnum::class => [
        ReportStatusEnum::NEW => 'New',
        ReportStatusEnum::READ => 'Read',
        ReportStatusEnum::SOLVE => 'Solved',
    ]
];

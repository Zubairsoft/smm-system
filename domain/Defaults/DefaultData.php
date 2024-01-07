<?php

namespace Domain\Defaults;

use Domain\Defaults\Data\BankData;
use Domain\Defaults\Data\BrandData;

class DefaultData
{
    use BankData, BrandData;

    public static function categories()
    {
        return [
            [
                'id' => uuid_create(),
                'name_ar' => 'الحميع',
                'name_en' => 'All',
                'is_active' => true,
            ]
        ];
    }
}

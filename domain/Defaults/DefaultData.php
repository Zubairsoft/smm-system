<?php

namespace Domain\Defaults;

use Domain\Defaults\Data\BankData;
use Domain\Defaults\Data\BrandData;
use Domain\Defaults\Data\ProductAttributeData;
use Domain\Defaults\Data\ProductAttributeDetailData;

class DefaultData
{
    use BankData, BrandData, ProductAttributeData, ProductAttributeDetailData;

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

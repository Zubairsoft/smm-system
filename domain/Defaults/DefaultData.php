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

    public static function colors()
    {
        return [
            [
                'id' => uuid_create(),
                'name_ar' => 'اخمر',
                'name_en' => 'red',
                'is_active' => true,
            ],
            [
                'id' => uuid_create(),
                'name_ar' => 'اصفر',
                'name_en' => 'yalow',
                'is_active' => true,
            ],
            [
                'id' => uuid_create(),
                'name_ar' => 'اسود',
                'name_en' => 'black',
                'is_active' => true,
            ],
            [
                'id' => uuid_create(),
                'name_ar' => 'ابيض',
                'name_en' => 'whait',
                'is_active' => true,
            ],
        ];
    }
}

<?php

namespace Domain\Defaults\Data;

trait BrandData
{

    public static function brands(): array
    {
        return [
            [
                'id' => uuid_create(),
                'name_ar' => 'بي ام سي المحضار',
                'name_en' => 'BMC AL Mahdar',
                'is_active' => true,
            ],
            [
                'id' => uuid_create(),
                'name_ar' => 'تويوتا',
                'name_en' => 'Toyota',
                'is_active' => true,
            ],
            [
                'id' => uuid_create(),
                'name_ar' => 'سامسونج',
                'name_en' => 'Samsung',
                'is_active' => true,
            ],
            [
                'id' => uuid_create(),
                'name_ar' => 'سوني',
                'name_en' => 'Sony',
                'is_active' => true,
            ],

        ];
    }
}

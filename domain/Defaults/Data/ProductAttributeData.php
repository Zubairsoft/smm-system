<?php

namespace Domain\Defaults\Data;

trait ProductAttributeData
{

    public static function productAttributes(): array
    {
        return [
            [
                'id' => uuid_create(),
                'name_ar' => 'الكرتون',
                'name_en' => 'Carton',
                'is_active' => true,
            ],
            [
                'id' => uuid_create(),
                'name_ar' => 'شده',
                'name_en' => 'Package',
                'is_active' => true,
            ],
            [
                'id' => uuid_create(),
                'name_ar' => 'حبة',
                'name_en' => 'Once',
                'is_active' => true,
            ],

        ];
    }
}

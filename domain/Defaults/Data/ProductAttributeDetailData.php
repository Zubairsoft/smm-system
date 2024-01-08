<?php

namespace Domain\Defaults\Data;

use App\Models\ProductAttribute;

trait ProductAttributeDetailData
{

    public static function productAttributeDetails(): array
    {
        $carton = ProductAttribute::query()->where('name_en', 'Carton')->first()->value('id');
        $package = ProductAttribute::query()->where('name_en', 'Package')->first()->value('id');
        $once = ProductAttribute::query()->where('name_en', 'Once')->first()->value('id');


        return [
            [
                'id' => uuid_create(),
                'name_ar' => 'كبير',
                'name_en' => 'Big',
                'product_attribute_id' => $carton,
                'is_active' => true,
            ],
            [
                'id' => uuid_create(),
                'name_ar' => 'صغير',
                'name_en' => 'Small',
                'product_attribute_id' => $carton,
                'is_active' => true,
            ],
            [
                'id' => uuid_create(),
                'name_ar' => 'متوسط',
                'name_en' => 'middle',
                'product_attribute_id' => $carton,
                'is_active' => true,
            ],
            [
                'id' => uuid_create(),
                'name_ar' => '12',
                'name_en' => '12',
                'product_attribute_id' => $package,
                'is_active' => true,
            ],
            [
                'id' => uuid_create(),
                'name_ar' => '6',
                'name_en' => '6',
                'product_attribute_id' => $package,
                'is_active' => true,
            ],
            [
                'id' => uuid_create(),
                'name_ar' => 'حبة',
                'name_en' => 'once',
                'product_attribute_id' => $once,
                'is_active' => true,
            ],

        ];
    }
}

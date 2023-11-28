<?php

namespace Domain\Defaults;

class DefaultData
{

    public static function banks(): array
    {
        return [
            [
                'id' => uuid_create(),
                'name' => 'العمقي',
                'is_active' => true,
            ],

            [
                'id' => uuid_create(),
                'name' => 'بن دول',
                'is_active' => true,
            ],
            [
                'id' => uuid_create(),
                'name' => 'البسيري',
                'is_active' => true,
            ],
            [
                'id' => uuid_create(),
                'name' => 'الكريمي',
                'is_active' => true,
            ],
            [
                'id' => uuid_create(),
                'name' => 'البيضاني',
                'is_active' => true,
            ],
            [
                'id' => uuid_create(),
                'name' => 'الاكوع',
                'is_active' => true,
            ],
            [
                'id' => uuid_create(),
                'name' => 'المحضار',
                'is_active' => true,
            ],
        ];
    }
}

<?php

namespace Database\Seeders;

use App\Models\ProductAttributeDetail;
use Domain\Defaults\DefaultData;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductAttributeDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductAttributeDetail::query()->insert(DefaultData::productAttributeDetails());
    }
}

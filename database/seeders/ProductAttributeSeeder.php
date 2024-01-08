<?php

namespace Database\Seeders;

use App\Models\ProductAttribute;
use Domain\Defaults\DefaultData;
use Illuminate\Database\Seeder;

class ProductAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductAttribute::query()->insert(DefaultData::productAttributes());
    }
}

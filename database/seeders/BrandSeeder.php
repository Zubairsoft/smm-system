<?php

namespace Database\Seeders;

use App\Models\Brand;
use Domain\Defaults\DefaultData;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Brand::query()->insert(DefaultData::brands());
    }
}

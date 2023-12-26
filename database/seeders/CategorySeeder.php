<?php

namespace Database\Seeders;

use App\Models\Category;
use Domain\Defaults\DefaultData;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::query()->create(DefaultData::categories()[0]);
    }
}

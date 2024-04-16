<?php

namespace Database\Seeders;

use App\Models\Color;
use Domain\Defaults\DefaultData;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Color::query()->insert(DefaultData::colors());
    }
}

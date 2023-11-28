<?php

namespace Database\Seeders;

use App\Models\Bank;
use Domain\Defaults\DefaultData;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bank::query()->insert(DefaultData::banks());
    }
}

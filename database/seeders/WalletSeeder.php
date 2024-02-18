<?php

namespace Database\Seeders;

use App\Models\Shop;
use Domain\Supports\Enums\CurrencyEnum;
use Illuminate\Database\Seeder;

class WalletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $attribute = ['currency' => CurrencyEnum::YER];
        $shops = Shop::query()->get();
        foreach ($shops as $shops) {
            $shops->wallets()->firstOrCreate($attribute,$attribute+['balance'=>0]);
        }
    }
}

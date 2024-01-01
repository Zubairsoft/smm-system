<?php

namespace Database\Seeders;

use App\Models\Shop;
use Illuminate\Database\Seeder;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //TODO make more data

        Shop::withoutEvents(function () {
            Shop::query()->forceCreate([
                'name' => 'shop',
                'owner_name' => 'محمد زبير',
                'email' => 'shop@shop.com',
                'password' => defaultPassword(),
                'phone' => 7775123554,
                'email_verified_at' => now(),
                'phone_verified_at' => now()->addDay(),
                'description' => 'test test test',
                'address' => 'المكلا حضرموت',
                'is_active' => true,
            ]);
        });
    }
}

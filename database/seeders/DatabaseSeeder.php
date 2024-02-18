<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleAndPermissionSeeder::class,
            AdminSeeder::class,
            ShopSeeder::class,
            BankSeeder::class,
            BankAccountSeeder::class,
            BrandSeeder::class,
            CategorySeeder::class,
            ProductAttributeSeeder::class,
            ProductAttributeDetailSeeder::class,
            DeliveryWorkerSeeder::class,
            WalletSeeder::class
        ]);
    }
}

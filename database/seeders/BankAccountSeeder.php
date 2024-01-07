<?php

namespace Database\Seeders;

use App\Models\BankAccount;
use App\Models\Shop;
use Illuminate\Database\Seeder;

class BankAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $shops=Shop::query()->get();

        for ($i=0; $i <10 ; $i++) { 
            $shops->random()->bankAccounts()->createMany(BankAccount::factory(2)->make()->toArray());
        }
    }
}

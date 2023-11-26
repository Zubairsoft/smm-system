<?php

namespace Database\Seeders;

use App\Models\Admin;
use Domain\Supports\Enums\RoleEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Auth::shouldUse(config('auth.admin-web-guard'));
        
        $admin = Admin::query()->create([
            'first_name' => 'admin',
            'last_name' => 'admin',
            'phone' => 775123554,
            'password' => defaultPassword()
        ]);

        $admin->assignRole(RoleEnum::SUPER_ADMIN);
    }
}

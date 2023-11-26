<?php

namespace Database\Seeders;

use Domain\Supports\Enums\RoleEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name' => RoleEnum::SUPER_ADMIN,
            'guard_name' => config('auth.admin-web-guard'),
        ]);
    }
}

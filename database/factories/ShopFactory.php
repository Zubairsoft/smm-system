<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shop>
 */
class ShopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'id'=>uuid_create(),
            'name'=>fake()->name(),
            'owner_name'=>fake()->company(),
            'phone'=>"777".strval(rand(000000,999999)),
            'email'=>fake()->email(),
            'password'=>defaultPassword(),
            'description'=>fake()->text(100),
            'address'=>fake()->address(),
            'email_verified_at'=>now(),
            'phone_verified_at'=>now(),
            'is_active'=>true,
        ];
    }
}

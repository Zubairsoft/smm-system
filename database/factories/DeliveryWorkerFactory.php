<?php

namespace Database\Factories;

use App\Models\DeliveryWorker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DeliveryWorkerFactory extends Factory
{
    protected $model = DeliveryWorker::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => fake()->uuid(),
            'name' => fake()->name(),
            'identifier' => fake()->unique()->numberBetween(1000000, 9999999),
            'password' => "password",
            'is_active' => fake()->boolean
        ];
    }
}

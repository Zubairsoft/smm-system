<?php

namespace Database\Factories;

use App\Models\Bank;
use Domain\Supports\Enums\CurrencyEnum;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BankAccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $bank = Bank::get()->random();
        return [
            'id' => uuid_create(),
            'bank_id' => $bank->id,
            'account_number' => fake()->bankAccountNumber(),
            'currency' => Arr::random(CurrencyEnum::getValues())
        ];
    }
}

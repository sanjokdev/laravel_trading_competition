<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mt4Users>
 */
class Mt4UsersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'LOGIN' => fake()->numberBetween(300, 320),
            'BALANCE' => fake()->randomFloat(2, 100, 50000), // 2 decimal places
            'EQUITY' => fake()->randomFloat(2, 100, 10000), // 2 decimal places
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Mt4Users;
use App\Enums\Symbols;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mt4Trades>
 */
class Mt4TradesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $login = Mt4Users::inRandomOrder()->value('LOGIN');
        return [
            'LOGIN' => $login ?? 100, // fallback if no users exist
            'SYMBOL' => fake()->randomElement(Symbols::all()),
            'CMD' => fake()->randomElement([0, 1, 6]),
            'VOLUME' => fake()->numberBetween(10, 1000),
            'OPEN_TIME' => fake()->dateTimeBetween('-6 hours', 'now')->format('Y-m-d H:i:s'),
            'PROFIT' => fake()->randomFloat(2, -100, 10000),
            'COMMENT' => fake()->sentence($this->faker->numberBetween(3, 9)),
        ];
    }
}

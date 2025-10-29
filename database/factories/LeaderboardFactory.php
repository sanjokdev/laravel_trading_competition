<?php

namespace Database\Factories;

use App\Models\Leaderboard;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Leaderboard>
 */
class LeaderboardFactory extends Factory
{

    protected $model = Leaderboard::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'registration_dt' => "2025-08-25 00:00:00",
            'starting_amount' => 200,
            'equity_percentage' => 50.20,
            'total_deposit' => 200,
            'balance' => 200,
            'started_trading' => 1,
        ];
    }
}

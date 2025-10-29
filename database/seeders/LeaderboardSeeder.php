<?php

namespace Database\Seeders;

use App\Enums\Symbols;
use App\Models\Leaderboard;
use App\Models\Mt4Trades;
use App\Models\Mt4Users;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LeaderboardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $logins = Mt4Trades::pluck('LOGIN')
            ->unique()
            ->shuffle()
            ->take(20);
        foreach ($logins as $loginId) {
            Leaderboard::factory()->create([
                'login_id' => $loginId,
            ]);
        }
    }
}

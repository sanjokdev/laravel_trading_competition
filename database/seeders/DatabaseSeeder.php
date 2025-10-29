<?php

namespace Database\Seeders;

use App\Models\Leaderboard;
use App\Models\Mt4Trades;
use App\Models\Mt4Users;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

//        User::factory(10)->create();
        Mt4Users::factory(10)->create();
//        Leaderboard::factory(10)->create();
        Mt4Trades::factory(50)->create();
//        User::factory()->create([
//            'name' => 'SANJOK User',
//            'email' => 'sanjok@example.com',
//        ]);
        $this->call([
            LeaderboardSeeder::class,
        ]);
    }
}

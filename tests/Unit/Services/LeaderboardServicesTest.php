<?php


namespace Tests\Unit\Services;


use App\Models\Leaderboard;
use App\Models\Mt4Trades;
use App\Services\LeaderboardUpdaterService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LeaderboardServicesTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function test_it_updates_the_leaderboard_with_calculated_equity()
    {
        Mt4Trades::factory()->create(['LOGIN' => 1001,"SYMBOL" => "AUDCAD", "CMD" => 6, "VOLUME" => 50 ,'OPEN_TIME' => "2025-08-26 00:00:00", "PROFIT" => 200.54, "COMMENT" => "TEST TEST"]);
        Mt4Trades::factory()->create(['LOGIN' => 1001,"SYMBOL" => "AUDCAD", "CMD" => 1, "VOLUME" => 50 ,'OPEN_TIME' => "2025-08-26 00:02:00", "PROFIT" => 50.50, "COMMENT" => "TEST TEST"]);
        Mt4Trades::factory()->create(['LOGIN' => 1001,"SYMBOL" => "AUDCAD", "CMD" => 0, "VOLUME" => 50 ,'OPEN_TIME' => "2025-08-26 00:03:00", "PROFIT" => 25.54, "COMMENT" => "TEST TEST"]);
        Mt4Trades::factory()->create(['LOGIN' => 1002,"SYMBOL" => "AUDCAD", "CMD" => 6, "VOLUME" => 50 ,'OPEN_TIME' => "2025-08-26 00:00:00", "PROFIT" => 200.54, "COMMENT" => "TEST TEST"]);
        Mt4Trades::factory()->create(['LOGIN' => 1002,"SYMBOL" => "AUDCAD", "CMD" => 1, "VOLUME" => 50 ,'OPEN_TIME' => "2025-08-26 00:01:00", "PROFIT" => 50.50, "COMMENT" => "TEST TEST"]);
        Mt4Trades::factory()->create(['LOGIN' => 1002,"SYMBOL" => "AUDCAD", "CMD" => 0, "VOLUME" => 50 ,'OPEN_TIME' => "2025-08-26 00:02:00", "PROFIT" => 60.40, "COMMENT" => "TEST TEST"]);

        Leaderboard::factory()->create([
            'login_id' => 1001,
            'registration_dt' => "2025-08-25 00:00:00",
            'starting_amount' => 50.5,
            'equity_percentage' => 50.5,
            'total_deposit' => 50.5,
            'balance' => 50.5,
            'started_trading' => 1,
        ]);
        Leaderboard::factory()->create([
            'login_id' => 1002,
            'registration_dt' => "2025-08-25 00:00:00",
            'starting_amount' => 50.5,
            'equity_percentage' => 50.5,
            'total_deposit' => 50.5,
            'balance' => 50.5,
            'started_trading' => 1,
        ]);
        $service = new LeaderboardUpdaterService();

        $service->update();

        //ASSERT
        $this->assertDatabaseHas('leaderboard',[
            'login_id' => 1001,
            'total_deposit' => 200.54,
            'equity_percentage' => 37.92
        ]);
        $this->assertDatabaseHas('leaderboard',[
            'login_id' => 1002,
            'total_deposit' => 200.54,
            'equity_percentage' => 55.30
        ]);
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Leaderboard;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class LeaderboardController extends Controller
{

    public function viewLeaderboard(Request $request): Response
    {
        $leaderBoardData = Leaderboard::select('id','login_id','equity_percentage')
            ->orderBy('equity_percentage','desc')->get()->toArray();

        return Inertia::render('leaderboard', [
            'sanjok' => "sanjok hero",
            'leaderboardData' => $leaderBoardData
        ]);
    }
}

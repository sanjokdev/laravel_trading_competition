<?php


namespace App\Services;

use App\Models\Leaderboard;
use App\Models\Mt4Trades;
use App\Contracts\LeaderboardUpdaterInterface;
use Illuminate\Support\Facades\DB;

class LeaderboardUpdaterService implements LeaderboardUpdaterInterface
{

    public function update(): void
    {
        $registrationDate = "2025-08-25 00:00:00";
        $sumsOfProfitAndDeposits = Mt4Trades::select(
            'LOGIN',
            DB::raw('SUM(CASE WHEN CMD <= 1 THEN PROFIT ELSE 0 END) AS Profit'),
            DB::raw('SUM(CASE WHEN CMD = 6 THEN PROFIT ELSE 0 END) AS Deposits'))
            ->groupBy('LOGIN')
            ->get();
        $currentLeaderBoardEntries = Leaderboard::select('login_id')->get();


        foreach ($currentLeaderBoardEntries as $entry) {

            $currentEntryProfitDeposit = Mt4Trades::select('LOGIN',
                DB::raw('SUM(CASE WHEN CMD <= 1 THEN PROFIT ELSE 0 END) AS Profit'),
                DB::raw('SUM(CASE WHEN CMD = 6 THEN PROFIT ELSE 0 END) AS Deposits'))
                ->where('LOGIN',$entry->login_id)
                ->groupBy('LOGIN')->first(); // Since its a collection and not a single record.

            Leaderboard::updateOrCreate(
                ['login_id' => $entry->login_id], // condition
                [
                    'registration_dt' => $registrationDate,
                    'starting_amount' => 50.50,
                    'equity_percentage' => $currentEntryProfitDeposit->Deposits == 0 ?
                        0 :
                        round(($currentEntryProfitDeposit->Profit/$currentEntryProfitDeposit->Deposits) * 100, 2),
                    'total_deposit' => $currentEntryProfitDeposit->Deposits,
                    'balance' => 0,
                    'started_trading' => 1
                ]
            );
        }


//        foreach ($sumsOfProfitAndDeposits as $row) {
//
//            Leaderboard::updateOrCreate(
//                ['login_id' => $row->LOGIN], // condition
//                [
//                    'registration_dt' => $registrationDate,
//                    'starting_amount' => 50.50,
//                    'equity_percentage' => $row->Deposits == 0 ? 0 : round(($row->Profit/$row->Deposits) * 100, 2),
//                    'total_deposit' => $row->Deposits,
//                    'balance' => 0,
//                    'started_trading' => 1
//                ]
//            );
//        }
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leaderboard extends Model
{
    /** @use HasFactory<\Database\Factories\LeaderboardFactory> */
    use HasFactory;
    protected $table = 'leaderboard'; // adjust if your table name is different

    protected $fillable = [
        'login_id',
        'registration_dt',
        'starting_amount',
        'equity_percentage',
        'total_deposit',
        'balance',
        'started_trading'
    ];
}

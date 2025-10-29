<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mt4Trades extends Model
{
    /** @use HasFactory<\Database\Factories\Mt4TradesFactory> */
    use HasFactory;
    protected $table = 'mt4_trades';

    protected $fillable = [
        'LOGIN',
        'SYMBOL',
        'CMD',
        'VOLUME',
        'OPEN_TIME',
        'PROFIT',
        'COMMENT',
    ];

    public static function refreshRandomTrades(int $count = 50)
    {
        // Delete all existing rows
        self::truncate();

        // Generate fake rows
        self::factory()->count($count)->create();
    }

    public static function generateRandomTrades(int $count = 15)
    {
        // Generate fake rows
        self::factory()->count($count)->create();
    }
}

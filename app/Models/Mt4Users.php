<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mt4Users extends Model
{
    /** @use HasFactory<\Database\Factories\Mt4UsersFactory> */
    use HasFactory;

    protected $table = 'mt4_users'; // adjust if your table name is different

    protected $fillable = [
        'LOGIN',
        'BALANCE',
        'EQUITY',
    ];

    public static function refreshRandomUsers(int $count = 15)
    {
        // Delete all existing rows
        self::truncate();

        // Generate fake rows
        self::factory()->count($count)->create();
    }

}

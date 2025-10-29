<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mt4_trades', function (Blueprint $table) {
            $table->id();
            $table->integer('LOGIN');
            $table->string('SYMBOL');
            $table->string('CMD');
            $table->string('VOLUME');
            $table->dateTime('OPEN_TIME');
            $table->double('PROFIT');
            $table->longText('COMMENT');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mt4_trades');
    }
};

<?php

namespace App\Providers;

use App\Contracts\LeaderboardUpdaterInterface;
use App\Services\LeaderboardUpdaterService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            LeaderboardUpdaterInterface::class,
            LeaderboardUpdaterService::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

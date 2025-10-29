<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Contracts\LeaderboardUpdaterInterface;

class UpdateLeaderboardCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'leaderboard:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Recalculate and update the leaderboard';

    protected LeaderboardUpdaterInterface $updater;

    public function __construct(LeaderboardUpdaterInterface $updater)
    {
        parent::__construct();
        $this->updater = $updater;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Updating leaderboard...');
        $this->updater->update();
        $this->info('Leaderboard updated successfully.');
        return Command::SUCCESS;
    }
}

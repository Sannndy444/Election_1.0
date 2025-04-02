<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Election;
use Carbon\Carbon;

class UpdateElectionStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'election:update-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update election status based on start and end dates.';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $elections = Election::all();
        $now = Carbon::now();

        foreach ($elections as $election) {
            if ($election->start_date <= $now && $election->end_date >= $now) {
                $election->status = 'active';
            } elseif ($election->end_date < $now) {
                $election->status = 'finished';
            } else {
                $election->status = 'draft';
            }

            $election->save();
        }

        $this->info("Election statuses updated at {$now}");
    }
}

<?php

namespace App\Listeners;

use App\Events\ElectionStatusUpdated;
use Carbon\Carbon;
use App\Models\Election;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateElectionStatusListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\ElectionStatusUpdated  $event
     * @return void
     */
    public function handle(ElectionStatusUpdated $event): void
    {
        $election = $event->election;
        $currentDate = Carbon::now();

        if ($election->start_date <= $currentDate && $election->end_date >= $currentDate) {
            $election->status = 'active';
        } elseif ($election->end_date < $currentDate) {
            $election->status = 'finished';
        }

        $election->save();
    }
}

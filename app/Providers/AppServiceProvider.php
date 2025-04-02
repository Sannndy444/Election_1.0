<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Events\ElectionStatusUpdated;
use App\Listeners\UpdateElectionStatusListener;

class AppServiceProvider extends ServiceProvider
{
    protected $listen = [
        ElectionStatusUpdated::class => [
            UpdateElectionStatusListener::class,
        ],
    ];
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app['events']->listen(
            ElectionStatusUpdated::class,
            UpdateElectionStatusListener::class
        );
    }
}

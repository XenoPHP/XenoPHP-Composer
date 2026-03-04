<?php

namespace Core\Providers;

use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;
use Illuminate\Console\Events\ArtisanStarting;
use Core\Console\Commands\EasyCommand;
use Core\Console\Commands\OptimizeCommand;
use Core\Console\Commands\PackageDiscoverCommand;
use Core\Console\Commands\ServerCheckCommand;
use Core\Console\Commands\ShieldStatusCommand;
use Core\Console\Commands\SocketServe;
use Core\Console\Commands\ViewCacheCommand;
use Core\Console\Commands\ViewClearCommand;

class AppServiceProvider extends ServiceProvider
{
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
        Vite::prefetch(concurrency: 3);

        Event::listen(ArtisanStarting::class, function ($event) {
            $event->artisan->setName('XenoPHP Framework');
        });

        if ($this->app->runningInConsole()) {
            $this->commands([
                EasyCommand::class,
                OptimizeCommand::class,
                PackageDiscoverCommand::class,
                ServerCheckCommand::class,
                ShieldStatusCommand::class,
                SocketServe::class,
                ViewCacheCommand::class,
                ViewClearCommand::class,
            ]);
        }
    }
}

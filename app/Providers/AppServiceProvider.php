<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Capsule\Manager as Capsule;

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
        $capsule = new Capsule;

        $capsule->addConnection(config('database.connections.mysql'));

        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }
}

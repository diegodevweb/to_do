<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Illuminate\Foundation\Vite;
use Illuminate\Support\ServiceProvider;

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
        Filament::serving(function () {
            Filament::registerTheme(
                app(Vite::class)('resources/css/app.css'),
            );
        });
    }
}

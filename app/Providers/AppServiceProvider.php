<?php

namespace App\Providers;

use App\Models\Content;
use App\Observers\ContentStatisticsObserver;
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
        Content::observe(ContentStatisticsObserver::class);
    }
}

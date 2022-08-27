<?php

namespace App\Providers;

use Illuminate\Routing\UrlGenerator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(UrlGenerator $url)
    {
        Paginator::useBootstrapFive();
        // if (env('APP_ENV') !== 'local') {
        //     URL::forceScheme('https');
        // }
        // URL::forceScheme('https');
    }
}

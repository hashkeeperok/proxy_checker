<?php

namespace App\Providers;

use App\Contracts\ProxyCheckerServiceContract;
use App\Services\ProxyCheckers\ProxyCheckService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public array $singletons = [
        ProxyCheckerServiceContract::class => ProxyCheckService::class,
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
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
    }
}

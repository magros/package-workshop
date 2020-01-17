<?php


namespace Magros\PackageWorkshop;


use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class PackageWorkshopServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config.php' => config_path('package_workshop.php')
        ]);

        $this->publishes([
            __DIR__ . '/database/migrations/' => database_path('migrations')
        ], 'migrations');

        $this->registerRoutes();
        $this->registerResources();
    }

    public function register()
    {

    }

    public function registerRoutes()
    {
        Route::group([
            'domain' => config('package_workshop.domain', null),
            'prefix' => config('package_workshop.path', 'package-workshop'),
            'namespace' => 'Magros\PackageWorkshop\Controllers',
        ], function () {
            $this->loadRoutesFrom(__DIR__ . '/routes.php');
        });
    }

    public function registerResources()
    {
        $this->loadViewsFrom(__DIR__ . '/views', 'workshop');
    }
}
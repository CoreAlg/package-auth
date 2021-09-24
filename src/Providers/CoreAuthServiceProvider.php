<?php

namespace CoreAlg\Auth\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class CoreAuthServiceProvider extends ServiceProvider
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
    public function boot()
    {
        if ($this->app->runningInConsole()) {

            // publish config
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('core-auth.php'),
            ], 'config');

            // publish views
            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path('views/vendor/core-auth'),
            ], 'views');

            // publish assets
            $this->publishes([
                __DIR__ . '/../resources/assets' => public_path('core-cdn'),
            ], 'assets');

            $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        }

        $this->registerRoutes();
    }

    protected function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        });
    }

    protected function routeConfiguration()
    {
        return [
            // 'prefix' => config('blogpackage.prefix'),
            'middleware' => config('core-auth.middleware', 'web'),
        ];
    }
}

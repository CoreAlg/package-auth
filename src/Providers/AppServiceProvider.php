<?php

namespace CoreAlg\Auth\Providers;

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
        $this->app->singleton(\CoreAlg\Auth\Interfaces\HashManagerInterface::class, function () {
            return new \CoreAlg\Auth\Adapters\LaravelEncrypterAdapter();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

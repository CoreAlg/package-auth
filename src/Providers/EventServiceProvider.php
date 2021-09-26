<?php

namespace CoreAlg\Auth\Providers;

use CoreAlg\Auth\Events\NewAccountCreated;
use CoreAlg\Auth\Listeners\SendAccountVerificationEmail;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        NewAccountCreated::class => [
            SendAccountVerificationEmail::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}

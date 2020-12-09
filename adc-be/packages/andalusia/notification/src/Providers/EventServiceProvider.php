<?php

namespace Andalusia\Notification\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        //
    ];

    /**
     * The subscriber classes to register.
     *
     * @var array
     */
    protected $subscribe = [
        'Andalusia\Notification\Listeners\NotificationEventSubscriber',
    ];

    /**
     * Register any events for the package.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}

<?php

namespace Andalusia\Notification;

use Illuminate\Support\ServiceProvider;

class NotificationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Providers
        $this->app->register(\Andalusia\Notification\Providers\EventServiceProvider::class);

        // Notification
        $this->app->bind(
            'Andalusia\Notification\Repositories\RepositoryInterface',
            'Andalusia\Notification\Repositories\Repository'
        );

        // Controllers (API)
        $this->app->make('Andalusia\Notification\Controllers\API\MainController'); // notification controller
        // Controllers (WEB)
        $this->app->make('Andalusia\Notification\Controllers\Web\MainController');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadMigrationsFrom(__DIR__ . '/Database/migrations');
        $this->loadViewsFrom(__DIR__.'/views', 'notification');
        $this->publishes([
            __DIR__.'/views' => base_path('resources/views/andalusia/notification'),
        ]);

        \Andalusia\Notification\Models\Notification::observe(\Andalusia\Notification\Observers\NotificationObserver::class);
    }
}
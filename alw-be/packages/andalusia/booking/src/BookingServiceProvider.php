<?php

namespace Andalusia\Booking;

use Illuminate\Support\ServiceProvider;

class BookingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Booking
        $this->app->bind(
            'Andalusia\Booking\Repositories\BookingRepositoryInterface',
            'Andalusia\Booking\Repositories\BookingRepository'
        );

        // Appointment
        $this->app->bind(
            'Andalusia\Booking\Repositories\AppointmentRepositoryInterface',
            'Andalusia\Booking\Repositories\AppointmentRepository'
        );

        // Controllers (API)
        $this->app->make('Andalusia\Booking\Controllers\API\BookingController'); // booking controller
        $this->app->make('Andalusia\Booking\Controllers\API\AppointmentController'); // appointment controller
        // Controllers (WEB)
        $this->app->make('Andalusia\Booking\Controllers\Web\BookingController');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
//        $this->loadMigrationsFrom(__DIR__ . '/Database/migrations');
        $this->loadViewsFrom(__DIR__.'/views', 'booking');
        $this->publishes([
            __DIR__.'/views' => base_path('resources/views/andalusia/booking'),
        ]);
    }
}

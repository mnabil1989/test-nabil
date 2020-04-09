<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
	    $this->app->singleton('VoyagerGuard', function () {
		    return 'admin';
	    });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \App\Appointment::observe(\App\Observers\AppointmentObserver::class);
        \App\User::observe(\App\Observers\UserObserver::class);

//        if (env('APP_ENV') !== 'local') {
//            URL::forceScheme('https');
//        }

        Relation::morphMap([
            'users'   => 'App\User',
            'doctors' => 'App\Doctor',
        ]);
    }
}

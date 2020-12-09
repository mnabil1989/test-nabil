<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\URL;

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
//        \App\Appointment::observe(\App\Observers\AppointmentObserver::class);
        \App\User::observe(\App\Observers\UserObserver::class);
//        \App\AppointmentNote::observe(\App\Observers\NoteObserver::class);

       if (env('APP_ENV') !== 'local') {
           URL::forceScheme('https');
       }

        Relation::morphMap([
            'users'   => 'App\User',
            'doctors' => 'App\Doctor',
        ]);


        Validator::extend("emails", function($attribute, $value, $parameters) {
            $rules = [
                'email' => ['required', 'regex:/^[a-zA-Z0-9_.+-]+@(?:(?:[a-zA-Z0-9-]+\\\.)?[a-zA-Z]+\\\.)?(Andalusiagroup|andalusiagroup)\\\.net$/'],
            ];

            // put emails into array
            $emails = explode(',', $value);

            foreach ($emails as $email) {
                $data = [
                    'email' => $email
                ];
                $validator = Validator::make($data, $rules);
                if ($validator->fails()) {
                    return false;
                }
            }
            return true;
        });

        Validator::extend("phones", function($attribute, $value, $parameters) {
            $rules = [
                'phone' => ['required', 'min:12', 'max:12', 'regex:/^(009665|9665|\\\+9665|05|5)(5|0|3|6|4|9|1|8|7)([0-9]{7})$/'],
            ];

            // put phones into array
            $phones = explode(',', $value);

            foreach ($phones as $phone) {
                $data = [
                    'phone' => $phone
                ];
                $validator = Validator::make($data, $rules);
                if ($validator->fails()) {
                    return false;
                }
            }
            return true;
        });
    }
}

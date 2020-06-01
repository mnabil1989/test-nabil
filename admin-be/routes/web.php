<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
if (App::environment('prod', 'staging')) {
    URL::forceScheme('https');
}
 Route::get('/', function () {
     return redirect()->route('voyager.login');
 });

use Illuminate\Support\Str;
use TCG\Voyager\Events\Routing;
use TCG\Voyager\Events\RoutingAdmin;
use TCG\Voyager\Events\RoutingAdminAfter;
use TCG\Voyager\Events\RoutingAfter;
use TCG\Voyager\Facades\Voyager;

//Route::group(
//	[
//		'prefix' => LaravelLocalization::setLocale(),
//		'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
//	], function(){
//        Route::get('/','HomeController@index');
//
//});
//-----------------------Change language for user--------------------------------------------

//-------------------------------------------------------------------------------------------
Route::group(['prefix' => 'admin'], function () {

    /*
    |--------------------------------------------------------------------------
    | Voyager Routes
    |--------------------------------------------------------------------------
    |
    | This file is where you may override any of the routes that are included
    | with Voyager.
    |
    */

    Route::group(['as' => 'voyager.'], function () {
        event(new Routing());

        $namespacePrefix = '\\'.config('voyager.controllers.namespace').'\\';

        Route::get('login', ['uses' => $namespacePrefix.'VoyagerAuthController@login',     'as' => 'login']);
        Route::post('login', ['uses' => $namespacePrefix.'VoyagerAuthController@postLogin', 'as' => 'postlogin']);

        Route::group(['middleware' => 'admin.user'], function () use ($namespacePrefix) {
            event(new RoutingAdmin());
            Route::get('ar', ['uses' => 'LanguageController@ar',     'as' => 'ar']);
            Route::get('en', ['uses' => 'LanguageController@en',     'as' => 'en']);
            // Main Admin and Logout Route
            Route::get('/', ['uses' => $namespacePrefix.'VoyagerController@index',   'as' => 'dashboard']);
            Route::post('logout', ['uses' => $namespacePrefix.'VoyagerController@logout',  'as' => 'logout']);
            Route::post('upload', ['uses' => $namespacePrefix.'VoyagerController@upload',  'as' => 'upload']);

            Route::get('profile', ['uses' => $namespacePrefix.'VoyagerUserController@profile', 'as' => 'profile']);

            try {
                foreach (Voyager::model('DataType')::all() as $dataType) {
                    $breadController = $dataType->controller
                        ? Str::start($dataType->controller, '\\')
                        : $namespacePrefix.'VoyagerBaseController';

                    Route::get($dataType->slug.'/order', $breadController.'@order')->name($dataType->slug.'.order');
                    Route::post($dataType->slug.'/action', $breadController.'@action')->name($dataType->slug.'.action');
                    Route::post($dataType->slug.'/order', $breadController.'@update_order')->name($dataType->slug.'.order');
                    Route::get($dataType->slug.'/{id}/restore', $breadController.'@restore')->name($dataType->slug.'.restore');
                    Route::get($dataType->slug.'/relation', $breadController.'@relation')->name($dataType->slug.'.relation');
                    Route::post($dataType->slug.'/remove', $breadController.'@remove_media')->name($dataType->slug.'.media.remove');
                    Route::resource($dataType->slug, $breadController);
                }
            } catch (\InvalidArgumentException $e) {
                throw new \InvalidArgumentException("Custom routes hasn't been configured because: ".$e->getMessage(), 1);
            } catch (\Exception $e) {
                // do nothing, might just be because table not yet migrated.
            }

            // Role Routes
            Route::resource('roles', $namespacePrefix.'VoyagerRoleController');

            // Menu Routes
            Route::group([
                'as'     => 'menus.',
                'prefix' => 'menus/{menu}',
            ], function () use ($namespacePrefix) {
                Route::get('builder', ['uses' => 'VoyagerMenuController@builder',    'as' => 'builder']);
                Route::post('order', ['uses' => 'VoyagerMenuController@order_item', 'as' => 'order']);

                Route::group([
                    'as'     => 'item.',
                    'prefix' => 'item',
                ], function () use ($namespacePrefix) {
                    Route::delete('{id}', ['uses' => 'VoyagerMenuController@delete_menu', 'as' => 'destroy']);
                    Route::post('/', ['uses' =>'VoyagerMenuController@add_item',    'as' => 'add']);
                    Route::put('/', ['uses' => 'VoyagerMenuController@update_item', 'as' => 'update']);
                });
            });

            // Settings
            Route::group([
                'as'     => 'settings.',
                'prefix' => 'settings',
            ], function () use ($namespacePrefix) {
                Route::get('/', ['uses' => $namespacePrefix.'VoyagerSettingsController@index',        'as' => 'index']);
                Route::post('/', ['uses' => $namespacePrefix.'VoyagerSettingsController@store',        'as' => 'store']);
                Route::put('/', ['uses' => $namespacePrefix.'VoyagerSettingsController@update',       'as' => 'update']);
                Route::delete('{id}', ['uses' => $namespacePrefix.'VoyagerSettingsController@delete',       'as' => 'delete']);
                Route::get('{id}/move_up', ['uses' => $namespacePrefix.'VoyagerSettingsController@move_up',      'as' => 'move_up']);
                Route::get('{id}/move_down', ['uses' => $namespacePrefix.'VoyagerSettingsController@move_down',    'as' => 'move_down']);
                Route::put('{id}/delete_value', ['uses' => $namespacePrefix.'VoyagerSettingsController@delete_value', 'as' => 'delete_value']);
            });

            // Admin Media
            Route::group([
                'as'     => 'media.',
                'prefix' => 'media',
            ], function () use ($namespacePrefix) {
                Route::get('/', ['uses' => $namespacePrefix.'VoyagerMediaController@index',              'as' => 'index']);
                Route::post('files', ['uses' => $namespacePrefix.'VoyagerMediaController@files',              'as' => 'files']);
                Route::post('new_folder', ['uses' => $namespacePrefix.'VoyagerMediaController@new_folder',         'as' => 'new_folder']);
                Route::post('delete_file_folder', ['uses' => $namespacePrefix.'VoyagerMediaController@delete', 'as' => 'delete']);
                Route::post('move_file', ['uses' => $namespacePrefix.'VoyagerMediaController@move',          'as' => 'move']);
                Route::post('rename_file', ['uses' => $namespacePrefix.'VoyagerMediaController@rename',        'as' => 'rename']);
                Route::post('upload', ['uses' => $namespacePrefix.'VoyagerMediaController@upload',             'as' => 'upload']);
                Route::post('crop', ['uses' => $namespacePrefix.'VoyagerMediaController@crop',             'as' => 'crop']);
            });

            // BREAD Routes
            Route::group([
                'as'     => 'bread.',
                'prefix' => 'bread',
            ], function () use ($namespacePrefix) {
                Route::get('/', ['uses' => $namespacePrefix.'VoyagerBreadController@index',              'as' => 'index']);
                Route::get('{table}/create', ['uses' => $namespacePrefix.'VoyagerBreadController@create',     'as' => 'create']);
                Route::post('/', ['uses' => $namespacePrefix.'VoyagerBreadController@store',   'as' => 'store']);
                Route::get('{table}/edit', ['uses' => $namespacePrefix.'VoyagerBreadController@edit', 'as' => 'edit']);
                Route::put('{id}', ['uses' => $namespacePrefix.'VoyagerBreadController@update',  'as' => 'update']);
                Route::delete('{id}', ['uses' => $namespacePrefix.'VoyagerBreadController@destroy',  'as' => 'delete']);
                Route::post('relationship', ['uses' => $namespacePrefix.'VoyagerBreadController@addRelationship',  'as' => 'relationship']);
                Route::get('delete_relationship/{id}', ['uses' => $namespacePrefix.'VoyagerBreadController@deleteRelationship',  'as' => 'delete_relationship']);
            });

            // Database Routes
            Route::resource('database','VoyagerDatabaseController');

            // Compass Routes
            Route::group([
                'as'     => 'compass.',
                'prefix' => 'compass',
            ], function () use ($namespacePrefix) {
                Route::get('/', ['uses' => $namespacePrefix.'VoyagerCompassController@index',  'as' => 'index']);
                Route::post('/', ['uses' => $namespacePrefix.'VoyagerCompassController@index',  'as' => 'post']);
            });

            Route::get(config('l5-swagger.routes.api'), [
                'as' => 'l5-swagger.api',
                'middleware' => config('l5-swagger.routes.middleware.api', []),
                'uses' => '\L5Swagger\Http\Controllers\SwaggerController@api',
            ]);

            Route::any(config('l5-swagger.routes.docs').'/{jsonFile?}', [
                'as' => 'l5-swagger.docs',
                'middleware' => config('l5-swagger.routes.middleware.docs', []),
                'uses' => '\L5Swagger\Http\Controllers\SwaggerController@docs',
            ]);

            Route::get(config('l5-swagger.routes.docs').'/asset/{asset}', [
                'as' => 'l5-swagger.asset',
                'middleware' => config('l5-swagger.routes.middleware.asset', []),
                'uses' => '\L5Swagger\Http\Controllers\SwaggerAssetController@index',
            ]);

            Route::get(config('l5-swagger.routes.oauth2_callback'), [
                'as' => 'l5-swagger.oauth2_callback',
                'middleware' => config('l5-swagger.routes.middleware.oauth2_callback', []),
                'uses' => '\L5Swagger\Http\Controllers\SwaggerController@oauth2Callback',
            ]);

            Route::get('slider/changeStatus', 'SliderController@ChangeStatus');
            Route::get('clinic/changeStatus', 'ClinicController@ChangeStatus');
            Route::get('service/changeStatus', 'ServiceController@ChangeStatus');
            Route::get('doctor/changeStatus', 'DoctorController@ChangeStatus');
            Route::get('event/changeStatus', 'EventController@ChangeStatus');
            Route::get('andalusiagroup/changeStatus', 'AndalusiaGroupController@ChangeStatus');
// Settings
            Route::group([
                'as'     => 'sitesettings.',
                'prefix' => 'sitesettings',
            ], function () {
                Route::get('/', ['uses' => 'VoyagerSiteSettingsController@index',        'as' => 'index']);
                Route::post('/', ['uses' => 'VoyagerSiteSettingsController@store',        'as' => 'store']);
                Route::put('/', ['uses' => 'VoyagerSiteSettingsController@update',       'as' => 'update']);
                Route::delete('{id}', ['uses' => 'VoyagerSiteSettingsController@delete',       'as' => 'delete']);
                Route::get('{id}/move_up', ['uses' => 'VoyagerSiteSettingsController@move_up',      'as' => 'move_up']);
                Route::get('{id}/move_down', ['uses' => 'VoyagerSiteSettingsController@move_down',    'as' => 'move_down']);
                Route::put('{id}/delete_value', ['uses' => 'VoyagerSiteSettingsController@delete_value', 'as' => 'delete_value']);
            });
            event(new RoutingAdminAfter());
        });

        //Asset Routes
        Route::get('voyager-assets', ['uses' => $namespacePrefix.'VoyagerController@assets', 'as' => 'voyager_assets']);

        event(new RoutingAfter());



    });

});
Route::get('email-test', function(){

        $details['email'] = "ahmed@tawfek.tk";
        $details['name'] = "Ahmed Tawfek";
        $details['blade'] = 'appointment_new';
        $details['subject'] = 'Confirmed';
        dispatch(new App\Jobs\SendEmailJob($details));

    dd('done');
});


Route::get('test-change-doctors-photos', function(){

    foreach (App\Doctor::all() as $doctor)
    {
        $doctor->update([
           'photo' => "doctors\Appdoctorphotos\\{$doctor->slug_en}.jpg"
        ]);
    }

});


//Route::get('videoAppointment', 'AgoraVideoController@videoAppointment');

Route::get('git-pull-automatic', function(){
//    $details['email'] = 'Hanafy.Mahmoud@andalusiagroup.net';
//    $details['name'] = 'test';
//    $details['blade'] = 'mail';
//    $details['subject'] = 'Confirmed';
//    dispatch(new App\Jobs\SendEmailJob($details));
//    $user      = env('MSHASTRA_USER');
//    $pwd       = env('MSHASTRA_PWD');
//    $sender_id = env('MSHASTRA_SENDER_ID');
//    $mobile    = 966562622277;
//    $msg_text  = urlencode('new appointment');
//
//    $url       = "http://mshastra.com/sendurlcomma.aspx?user={$user}&pwd={$pwd}&senderid={$sender_id}&mobileno={$mobile}&msgtext={$msg_text}&CountryCode=ALL&language=Unicode";
//    $ch        = curl_init($url);
//    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//    $curl_scraped_page = curl_exec($ch);
//    curl_close($ch);
//    echo $curl_scraped_page;

//    return 'yeah it works';

//    \App\Appointment::create([
//        'doctor_id' => 10,
//        'user_id' => 1,
//        'start'  => '2020-04-21 00:00:00',
//        'duration' => '15',
//        'comments' => 'test comment',
//        'confirmed' => 0,
//        'payment_confirmed'=> 0
//    ]);


//    $appointment = \App\Appointment::find(4);
//    $appointment->update([
//        'doctor_id' => 10,
//        'user_id' => 1,
//        'start'  => '2020-04-21 01:15:00',
//        'duration' => '15',
//        'comments' => 'test comment',
//        'confirmed' => 0,
//        'payment_confirmed'=> 0
//    ]);

//    $payment = \App\AppointmentTransit::create([
//        'doctor_id' => 1,
//        'user_id' =>1,
//        'appointment_id' =>1,
//        'start' => 'aaaa',
//        'duration' => '555',
//        'comments' => 'test',
//        'confirmed' => '0',
//        'payment_confirmed' => '0',
//        'order_id' => '54654564556456456',
//        'status' => 'done'
//    ]);

//    event(new App\Events\PaymentFailedEvent($payment));
//    event(new App\Events\PaymentPendingEvent($payment));

//    return explode(',',env('COORDINATOR_EMAILS'));
    \App\AppointmentNote::create([
        'appointment_id' => 1,
        'doctor_id' => 3,
        'user_id' => 1,
        'note' => 'test comment',
        'created_by' => 'Doctor',
        'name' => 'CURAM 457 MG/5 ML SUSP 100 ML',
        'description' => '2.5 ML ORAL EVERY 12 HOURS FOR 7 DAY',
        'qty' => '1 BOT'
    ]);
});

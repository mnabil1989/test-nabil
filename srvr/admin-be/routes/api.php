<?php

use Illuminate\Http\Request;
if (App::environment('prod', 'staging')) {
    URL::forceScheme('https');
}
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::group([
    'middleware' => ['cors']
], function () {

    Route::post('check-email', 'Api\AuthController@check_if_email_exists');
    Route::group(['prefix' => 'password'], function(){
        Route::post('link', 'Api\AuthController@reset_password_link');
        Route::post('reset', 'Api\AuthController@reset_password');
    });
    Route::post('register', 'Api\AuthController@register');
    Route::post('doctor/register', 'Api\AuthController@Doctor_register');
    Route::post('login', 'Api\AuthController@authenticate');
    Route::post('doctor/login', 'Api\AuthController@Doctor_authenticate');
    Route::post( 'social-registration', 'Api\AuthController@handleProviderCallbackMobileRegistration' );
    Route::post( 'social-login', 'Api\AuthController@handleProviderCallbackMobileLogin' );
    Route::get('home', 'Api\HomeController@home');
    Route::get('doctors', 'Api\DoctorController@doctors');
    Route::get('doctor/{slug}', 'Api\DoctorController@doctor');
    Route::get('services', 'Api\ServiceController@services');
    Route::get('service/{slug}', 'Api\ServiceController@service');
    Route::get('clinics', 'Api\ClinicController@clinics');
    Route::get('clinic/{slug}', 'Api\ClinicController@clinic');
    Route::get('pages', 'Api\PageController@pages');
    Route::get('page/{slug}', 'Api\PageController@page');
    Route::get('events', 'Api\EventController@events');
    Route::get('event/{slug}', 'Api\EventController@event');
    Route::get('posts', 'Api\PostController@posts');
    Route::get('post/{slug}', 'Api\PostController@post');
    Route::get('categories', 'Api\PostController@categories');
    Route::get('category/{slug}', 'Api\PostController@category');
    Route::get('tags', 'Api\PostController@tags');
    Route::get('tag/{slug}', 'Api\PostController@tag');
    Route::post('clinic_requests', 'Api\ClinicRequestController@index');
    Route::get('seo', 'Api\SeoController@index');
    Route::get('settings', 'Api\FrontController@index');
    Route::group(['middleware' => ['jwt.verify']], function() {
        Route::post('update-profile-image', 'Api\AuthController@updateProfileImage');
        Route::put('update-profile', 'Api\AuthController@updateProfile');
        Route::put('update-profile-password', 'Api\AuthController@updateProfilePassword');
        Route::get('user', 'Api\AuthController@getAuthenticatedUser');
        Route::get('doctor_details', 'Api\AuthController@getAuthenticatedDoctor');
        Route::post('favorite-user', 'Api\FavoriteController@index');
        Route::post('event-user', 'Api\EventController@eventUserAction');
        Route::get('user-favorite-posts', 'Api\AuthController@getAuthenticatedPosts');
        Route::get('user-favorite-events', 'Api\AuthController@getAuthenticatedEvents');
        Route::post('videoAppointment', 'Api\AgoraVideoController@videoAppointment');
    });
    Route::get('search', 'Api\DataController@index');
    Route::get('appointments/freetime', 'Api\AppointmentController@FreeTime');
    Route::get('appointments/free_time', 'Api\AppointmentController@free_time');
    Route::get('appointments/mine', 'Api\AppointmentController@mine');
    Route::post('appointments', 'Api\AppointmentController@store');
    Route::apiResource('specialities', 'Api\SpecialityController');
});
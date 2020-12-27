<?php

use Illuminate\Http\Request;

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
    Route::post('files', 'Api\FilesController@files');
    Route::post('appointments/files', 'Api\FilesController@filesUpload');
    Route::get('appointments/files/{fileName}', 'Api\FilesController@filesDownload');

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
    Route::get('topevent', 'Api\EventController@topevent');
    Route::get('posts', 'Api\PostController@posts');
    Route::get('posts_footer', 'Api\PostController@posts_footer');
    Route::get('posts_mostread', 'Api\PostController@posts_mostread');
    Route::get('related_topics/{slug}', 'Api\PostController@related_topics');
    Route::get('journeys', 'Api\JourneyController@journeys');
    Route::get('journey/{slug}', 'Api\JourneyController@journey');

    Route::get('post/{slug}', 'Api\PostController@post');

    Route::get('categories', 'Api\PostController@categories');
    Route::get('category/{slug}', 'Api\PostController@category');
    Route::get('tags', 'Api\PostController@tags');
    Route::get('tag/{slug}', 'Api\PostController@tag');
    Route::post('clinic_requests', 'Api\ClinicRequestController@index');
    Route::post('contact_us', 'Api\ClinicRequestController@addContactUs');
    Route::get('seo', 'Api\SeoController@index');
    Route::get('settings', 'Api\FrontController@index');
    Route::get('about_us', 'Api\FrontController@about_us');
    Route::get('contacts', 'Api\FrontController@contacts');
    Route::get('socialmedia', 'Api\FrontController@socialmedia');
    Route::post('contactus', 'Api\FrontController@contactus');
    Route::post('newsletter', 'Api\FrontController@newsletter');
    Route::post('search', 'Api\FrontController@search');
    Route::get('sub_titles', 'Api\FrontController@sub_titles');

    Route::post('booking', 'Api\BookingController@create');
    Route::get('sliders', 'Api\SlidersController@sliders');

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
//        =====================================Chat Apis=====================================================
        Route::post('create_conversation', 'Api\MassageController@GetOrCreateConversation');
        Route::post('send_message', 'Api\MassageController@send_message');
        Route::post('delete_message', 'Api\MassageController@delete_message');
        Route::post('get_conversation', 'Api\MassageController@get_conversation');
        Route::post('makeseen', 'Api\MassageController@makeSeen');
        //        =====================================Payment Apis=====================================================
        Route::post('appointment_transit', 'Api\PaymentController@AppointmentTransit');
        Route::post('appointment_confirm', 'Api\PaymentController@AppointmentTransit_Confirm');
        Route::post('appointment_free', 'Api\PaymentController@AppointmentTransit_Free');
        Route::post('getSessionId', 'Api\PaymentController@getSessionId');


    });
    // Route::get('search', 'Api\DataController@index');
    Route::get('appointments/freetime', 'Api\AppointmentController@FreeTime');
    Route::get('appointments/free_time', 'Api\AppointmentController@free_time');
    Route::get('appointments/mine', 'Api\AppointmentController@mine');
    Route::post('appointment/note', 'Api\AppointmentController@store_note');
    Route::post('appointments', 'Api\AppointmentController@store');
    Route::post('appointments/{appointment}/attachments', 'Api\AppointmentController@store_attachments');
    Route::get('appointments/{appointment}/attachments', 'Api\AppointmentController@get_attachments');
    Route::apiResource('specialities', 'Api\SpecialityController');
    Route::get('doctors_by_speciality_id/{id}', 'Api\SpecialityController@doctors_by_speciality_id');

    Route::get('privacy', 'Api\PrivacyController@index');
    Route::get('comments', 'Api\CommentController@index');

    Route::get('partners', 'Api\PartnerController@partners');
    Route::get('testimonials', 'Api\TestimonialController@testimonials');
    Route::get('selling_points', 'Api\SellingpointController@selling_points');

    
});

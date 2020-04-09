<?php

// API
Route::group(['prefix' => 'api', 'middleware' => ['api', 'cors']], function(){
    Route::apiResource('bookings', 'Andalusia\Booking\Controllers\API\BookingController');
    Route::apiResource('appointments', 'Andalusia\Booking\Controllers\API\AppointmentController')->only([
        'index', 'show'
    ]);
});

// test view
Route::get('test_bookings', 'Andalusia\Booking\Controllers\Web\BookingController@index')->name('bookings.main');

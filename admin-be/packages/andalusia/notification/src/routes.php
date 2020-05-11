<?php

// API
Route::group(['prefix' => 'api'], function(){
    Route::apiResource('notifications', 'Andalusia\Notification\Controllers\API\MainController');
});

// test view
Route::get('test_notifications', 'Andalusia\Notification\Controllers\Web\MainController@index')->name('notifications.main');

// test the auto notifications
Route::get('test-notification', function(){
    event(new Andalusia\Notification\Events\PostLiked(\App\User::find(1), 'https://stackoverflow.com/', 'new like!'));
    return 'new notification';
});
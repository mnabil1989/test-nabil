<?php

// API
Route::group(['prefix' => 'api', 'middleware' => ['api', 'cors']], function(){
    Route::apiResource('surveys', 'Andalusia\Survey\Controllers\API\MainController');
    Route::apiResource('surveys_questions', 'Andalusia\Survey\Controllers\API\QuestionController');
    Route::apiResource('surveys_answers', 'Andalusia\Survey\Controllers\API\AnswerController');
    Route::apiResource('surveys_users_info', 'Andalusia\Survey\Controllers\API\UserInfoController');
    Route::apiResource('surveys_users_answers', 'Andalusia\Survey\Controllers\API\UserAnswerController');
});

// test view
Route::get('test_surveys', 'Andalusia\Survey\Controllers\Web\MainController@index')->name('surveys.main');

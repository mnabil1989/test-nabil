<?php

namespace Andalusia\Survey;

use Illuminate\Support\ServiceProvider;

class SurveyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Survey
        $this->app->bind(
            'Andalusia\Survey\Repositories\RepositoryInterface',
            'Andalusia\Survey\Repositories\Repository'
        );

        // Question
        $this->app->bind(
            'Andalusia\Survey\Repositories\QuestionRepositoryInterface',
            'Andalusia\Survey\Repositories\QuestionRepository'
        );

        // Answer
        $this->app->bind(
            'Andalusia\Survey\Repositories\AnswerRepositoryInterface',
            'Andalusia\Survey\Repositories\AnswerRepository'
        );

        // // User Info (needed before answering any questions)
        // $this->app->bind(
        //     'Andalusia\Survey\Repositories\UserInfoRepositoryInterface',
        //     'Andalusia\Survey\Repositories\UserInfoRepository'
        // );

        // // User Answers
        // $this->app->bind(
        //     'Andalusia\Survey\Repositories\UserAnswerRepositoryInterface',
        //     'Andalusia\Survey\Repositories\UserAnswerRepository'
        // );

        // Controllers (API)
        $this->app->make('Andalusia\Survey\Controllers\API\MainController'); // survey controller
        $this->app->make('Andalusia\Survey\Controllers\API\QuestionController');
        $this->app->make('Andalusia\Survey\Controllers\API\AnswerController');
        // $this->app->make('Andalusia\Survey\Controllers\API\UserInfoController');
        // $this->app->make('Andalusia\Survey\Controllers\API\UserAnswerController');
        // Controllers (WEB)
        $this->app->make('Andalusia\Survey\Controllers\Web\MainController');
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
        $this->loadViewsFrom(__DIR__.'/views', 'survey');
        $this->publishes([
            __DIR__.'/views' => base_path('resources/views/andalusia/survey'),
        ]);
    }
}
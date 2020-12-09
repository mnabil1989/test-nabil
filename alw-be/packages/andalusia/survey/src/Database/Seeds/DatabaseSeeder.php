<?php

namespace Andalusia\Survey\Database\Seeds;

use Andalusia\Survey\Models\Survey;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SurveyModuleSeeder::class);
        $this->call(SurveysTableSeeder::class);
        $this->call(SurveysQuestionsTableSeeder::class);
        $this->call(SurveysAnswersTableSeeder::class);
    }
}

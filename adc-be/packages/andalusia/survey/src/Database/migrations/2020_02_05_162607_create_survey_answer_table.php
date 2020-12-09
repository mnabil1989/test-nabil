<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyAnswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_answer', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('question_id')->unsigned();
            $table->foreign('question_id')->references('id')->on('survey_question')->onDelete('cascade');

            $table->integer('order')->unsigned()->nullable();
            $table->text('answer');
            $table->integer('points')->unsigned()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survey_answer');
    }
}

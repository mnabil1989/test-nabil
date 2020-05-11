<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_question', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('survey_id')->unsigned();
            $table->foreign('survey_id')->references('id')->on('surveys')->onDelete('cascade');

            $table->integer('order')->unsigned()->nullable();
            $table->string('question');
            $table->enum('form_type', ['text', 'textarea', 'menu', 'checkbox', 'radio']);
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
        Schema::dropIfExists('survey_question');
    }
}

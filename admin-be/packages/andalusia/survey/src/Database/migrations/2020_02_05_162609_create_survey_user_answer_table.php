<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyUserAnswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_user_answer', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('user_info_id')->unsigned();
            $table->foreign('user_info_id')->references('id')->on('survey_user_info')->onDelete('cascade');

            $table->bigInteger('answer_id')->unsigned()->nullable();
            $table->foreign('answer_id')->references('id')->on('survey_answer')->onDelete('cascade');

            $table->text('answer_text')->nullable();
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
        Schema::dropIfExists('survey_user_answer');
    }
}

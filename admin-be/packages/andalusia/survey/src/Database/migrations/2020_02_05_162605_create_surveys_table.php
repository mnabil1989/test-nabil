<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Andalusia\Survey\Models\Survey;

class CreateSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('same_page');
            $table->enum('popup_type', ['small', 'big']);
            $table->integer('popup_timer')->unsigned()->default(1);
            $table->integer('number_of_questions_on_page')->unsigned()->nullable();
            $table->string('slug')->nullable()->unique();
            $table->string('note')->nullable();
            $table->string('redirect_link')->nullable();
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
        Schema::dropIfExists('surveys');
    }
}

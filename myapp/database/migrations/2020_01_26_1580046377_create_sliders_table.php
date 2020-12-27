<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('sliders', function (Blueprint $table) {
            $table->Integer('id')->autoIncrement()->unsigned();
            $table->String('photo_ar')->nullable();
            $table->String('photo_en')->nullable();
            $table->Text('title')->nullable();
            $table->Text('description')->nullable();
            $table->Text('link')->nullable();
            $table->Integer('status')->nullable()->default('0');
            $table->TimeStamp('created_at')->nullable();
            $table->TimeStamp('updated_at')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sliders');
    }
}

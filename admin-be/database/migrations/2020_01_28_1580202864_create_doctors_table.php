<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('doctors', function (Blueprint $table) {
            $table->Integer('id')->autoIncrement()->unsigned();
            $table->String('title_ar')->nullable();
            $table->String('title_en')->nullable();
            $table->String('slug_ar')->nullable();
            $table->String('slug_en')->nullable();
            $table->LongText('description')->nullable();
            $table->String('position')->nullable();
            $table->String('speciality')->nullable();
            $table->String('photo')->nullable();
            $table->String('meta_keywords')->nullable();
            $table->Text('meta_description')->nullable();
            $table->Integer('status')->nullable()->default(0);
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
        Schema::drop('doctors');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('clinics', function (Blueprint $table) {
            $table->Integer('id')->autoIncrement()->unsigned();
            $table->String('name_ar')->nullable();
            $table->String('name_en')->nullable();
            $table->String('slug_ar')->nullable();
            $table->String('slug_en')->nullable();
            $table->Text('small_description')->nullable();
            $table->LongText('description')->nullable();
            $table->String('address')->nullable();
            $table->String('phone')->nullable();
            $table->String('email')->nullable();
            $table->String('map_x')->nullable();
            $table->String('map_y')->nullable();
            $table->String('photo')->nullable();
            $table->LongText('meta_keywords')->nullable();
            $table->LongText('meta_description')->nullable();
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
        Schema::drop('clinics');
    }
}

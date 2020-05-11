<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('events', function (Blueprint $table) {
            $table->Integer('id')->autoIncrement()->unsigned();
            $table->String('title_ar')->nullable();
            $table->String('title_en')->nullable();
            $table->String('slug_ar')->nullable();
            $table->String('slug_en')->nullable();
            $table->LongText('description')->nullable();
            $table->DateTime('start')->nullable();
            $table->DateTime('end')->nullable();
            $table->String('img')->nullable();
            $table->Text('images')->nullable();
            $table->String('map_x')->nullable();
            $table->String('map_y')->nullable();
            $table->Integer('stock')->nullable();
            $table->String('meta_keywords')->nullable();
            $table->Text('meta_description')->nullable();
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
        Schema::drop('events');
    }
}

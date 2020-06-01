<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeoSettingssTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('seo_settings', function (Blueprint $table) {
            $table->Integer('id')->autoIncrement()->unsigned();
            $table->String('key');
            $table->String('display_name');
            $table->Text('value')->nullable();
            $table->Text('details')->nullable();
            $table->String('type');
            $table->Integer('order')->default('1');
            $table->String('group')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('seo_settings');
    }
}

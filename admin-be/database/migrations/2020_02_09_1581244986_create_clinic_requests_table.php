<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('clinic_requests', function (Blueprint $table) {
            $table->Integer('id')->autoIncrement()->unsigned();
            $table->String('first_name')->nullable();
            $table->String('last_name')->nullable();
            $table->String('email')->nullable();
            $table->Integer('phone')->nullable();
            $table->String('gender')->nullable();
            $table->Integer('clinic_id')->nullable();
            $table->Integer('type')->nullable();
            $table->String('url')->nullable();
            $table->LongText('further_requirements')->nullable();
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
        Schema::drop('clinic_requests');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentTransitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('appointment_transits', function (Blueprint $table) {
            $table->Integer('id')->autoIncrement()->unsigned();
            $table->Integer('doctor_id')->nullable();
            $table->Integer('appointment_id')->nullable();
            $table->Integer('user_id')->nullable();
            $table->String('start')->nullable();
            $table->String('duration')->nullable();
            $table->String('comments')->nullable();
            $table->Integer('confirmed')->nullable();
            $table->Integer('payment_confirmed')->nullable();
            $table->String('status')->nullable()->default('PENDING');
            $table->String('order_id')->nullable();
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
        Schema::drop('appointment_transits');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->Integer('id')->autoIncrement()->unsigned(); 
            $table->Integer('doctor_id')->nullable(); 
            $table->String('name')->nullable(); 
            $table->String('email')->nullable(); 
            $table->String('phone')->nullable(); 
            $table->String('comments')->nullable(); 
            $table->dateTime('booking_date_time', 0)->nullable(); 
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
        Schema::dropIfExists('bookings');
    }
}

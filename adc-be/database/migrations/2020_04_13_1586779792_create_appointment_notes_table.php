<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('appointment_notes', function (Blueprint $table) {
            $table->Integer('id')->autoIncrement()->unsigned();
            $table->Integer('appointment_id')->nullable();
            $table->Integer('doctor_id')->nullable();
            $table->Integer('user_id')->nullable();
            $table->LongText('note')->nullable();
//            $table->tinyInteger('created_by')->nullable();
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
        Schema::drop('appointment_notes');
    }
}

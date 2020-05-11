<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->Integer('id')->autoIncrement()->unsigned();
            $table->String('order_id');
            $table->String('authorizationCode')->nullable();
            $table->String('receipt')->nullable();
            $table->String('terminal')->nullable();
            $table->Integer('appointment_id');
            $table->String('user_id');
            $table->String('amount_invoiced')->nullable();
            $table->String('amount_charged')->nullable();
            $table->String('currency');
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
        Schema::drop('payments');
    }
}

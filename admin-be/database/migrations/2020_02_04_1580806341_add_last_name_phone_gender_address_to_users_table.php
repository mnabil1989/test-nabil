<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLastNamePhoneGenderAddressToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('users', function (Blueprint $table) {
//            $table->String('last_name')->nullable();
//            $table->Integer('phone')->unique()->nullable();
            $table->String('gender')->nullable();
            $table->LongText('address')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
//            $table->dropColumn('last_name');
//            $table->dropColumn('phone');
            $table->dropColumn('gender');
            $table->dropColumn('address');

        });
    }
}

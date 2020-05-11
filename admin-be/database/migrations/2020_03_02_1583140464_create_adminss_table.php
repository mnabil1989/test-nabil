<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminssTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('admins', function (Blueprint $table) {
            $table->Integer('id')->autoIncrement()->unsigned();
            $table->Integer('role_id')->nullable();
            $table->String('name');
            $table->String('email');
            $table->String('avatar')->nullable()->default('users/default.png');
            $table->TimeStamp('email_verified_at')->nullable();
            $table->String('password');
            $table->String('remember_token')->nullable();
            $table->Text('settings')->nullable();
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
        Schema::drop('admins');
    }
}

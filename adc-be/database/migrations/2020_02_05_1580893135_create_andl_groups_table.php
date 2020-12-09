<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAndlGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('andalusia_groups', function (Blueprint $table) {
            $table->Integer('id')->autoIncrement()->unsigned();
            $table->Text('title')->nullable();
            $table->Text('url')->nullable();
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
        Schema::drop('andalusia_groups');
    }
}

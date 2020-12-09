
            <?php
            use Illuminate\Database\Migrations\Migration;
            use Illuminate\Database\Schema\Blueprint;
            use Illuminate\Support\Facades\Schema;

            class AddPhoneLastNameToUsersTable extends Migration
            {
            /**
            * Run the migrations.
            *
            * @return void
            */
            public function up()
            {

            Schema::table( 'users', function (Blueprint $table) {
//                $table->String('phone',250)->nullable();
//$table->String('last_name',250)->nullable();

            });
            }

            /**
            * Reverse the migrations.
            *
            * @return void
            */
            public function down()
            {
            Schema::table( 'users', function (Blueprint $table) {
//                $table->dropColumn( 'phone');
// $table->dropColumn( 'last_name');

           });
            }
            }

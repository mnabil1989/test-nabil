
            <?php
            use Illuminate\Database\Migrations\Migration;
            use Illuminate\Database\Schema\Blueprint;
            use Illuminate\Support\Facades\Schema;

            class AddSpecialityIdToDoctorsTable extends Migration
            {
            /**
            * Run the migrations.
            *
            * @return void
            */
            public function up()
            {

            Schema::table( 'doctors', function (Blueprint $table) {
                $table->Integer('speciality_id')->unsigned()->nullable(); 

            });
            }

            /**
            * Reverse the migrations.
            *
            * @return void
            */
            public function down()
            {
            Schema::table( 'doctors', function (Blueprint $table) {
                $table->dropColumn( 'speciality_id');

           });
            }
            }
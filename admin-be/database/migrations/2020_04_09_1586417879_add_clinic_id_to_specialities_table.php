
            <?php
            use Illuminate\Database\Migrations\Migration;
            use Illuminate\Database\Schema\Blueprint;
            use Illuminate\Support\Facades\Schema;

            class AddClinicIdToSpecialitiesTable extends Migration
            {
            /**
            * Run the migrations.
            *
            * @return void
            */
            public function up()
            {

            Schema::table( 'specialities', function (Blueprint $table) {
                $table->Integer('clinic_id')->unsigned()->nullable(); 

            });
            }

            /**
            * Reverse the migrations.
            *
            * @return void
            */
            public function down()
            {
            Schema::table( 'specialities', function (Blueprint $table) {
                $table->dropColumn( 'clinic_id');

           });
            }
            }
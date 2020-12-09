
            <?php
            use Illuminate\Database\Migrations\Migration;
            use Illuminate\Database\Schema\Blueprint;
            use Illuminate\Support\Facades\Schema;

            class RenameDoctorIdToClinicIdToBookingsTable extends Migration
            {
            /**
            * Run the migrations.
            *
            * @return void
            */
            public function up()
            {

            Schema::table( 'bookings', function (Blueprint $table) {
                $table->renameColumn('doctor_id','clinic_id'); 

            });
            }

            /**
            * Reverse the migrations.
            *
            * @return void
            */
            public function down()
            {
            Schema::table( 'bookings', function (Blueprint $table) {
                $table->renameColumn('clinic_id','doctor_id'); 

           });
            }
            }
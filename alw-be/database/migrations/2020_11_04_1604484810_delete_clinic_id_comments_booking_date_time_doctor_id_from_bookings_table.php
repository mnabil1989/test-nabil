
            <?php
            use Illuminate\Database\Migrations\Migration;
            use Illuminate\Database\Schema\Blueprint;
            use Illuminate\Support\Facades\Schema;

            class DeleteClinicIdCommentsBookingDateTimeDoctorIdFromBookingsTable extends Migration
            {
            /**
            * Run the migrations.
            *
            * @return void
            */
            public function up()
            {

            Schema::table( 'bookings', function (Blueprint $table) {
                $table->dropColumn( 'clinic_id');
$table->dropColumn( 'comments');
$table->dropColumn( 'booking_date_time');
$table->dropColumn( 'doctor_id');

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
                $table->Integer('clinic_id')->nullable(); 
$table->String('comments',255)->nullable(); 
$table->String('booking_date_time',255)->nullable(); 
$table->Integer('doctor_id')->nullable(); 

           });
            }
            }
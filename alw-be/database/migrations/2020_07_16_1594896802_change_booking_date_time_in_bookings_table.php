
            <?php
            use Illuminate\Database\Migrations\Migration;
            use Illuminate\Database\Schema\Blueprint;
            use Illuminate\Support\Facades\Schema;

            class ChangeBookingDateTimeInBookingsTable extends Migration
            {
            /**
            * Run the migrations.
            *
            * @return void
            */
            public function up()
            {

            Schema::table( 'bookings', function (Blueprint $table) {
                $table->String('booking_date_time',255)->change(); 

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
                $table->DateTime('booking_date_time')->change(); 

           });
            }
            }
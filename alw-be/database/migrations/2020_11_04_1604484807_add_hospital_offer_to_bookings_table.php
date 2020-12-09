
            <?php
            use Illuminate\Database\Migrations\Migration;
            use Illuminate\Database\Schema\Blueprint;
            use Illuminate\Support\Facades\Schema;

            class AddHospitalOfferToBookingsTable extends Migration
            {
            /**
            * Run the migrations.
            *
            * @return void
            */
            public function up()
            {

            Schema::table( 'bookings', function (Blueprint $table) {
                $table->String('hospital',255)->nullable(); 
$table->String('offer',255)->nullable(); 

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
                $table->dropColumn( 'hospital');
$table->dropColumn( 'offer');

           });
            }
            }
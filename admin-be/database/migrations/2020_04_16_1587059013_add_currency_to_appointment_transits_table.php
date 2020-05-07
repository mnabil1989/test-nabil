
            <?php
            use Illuminate\Database\Migrations\Migration;
            use Illuminate\Database\Schema\Blueprint;
            use Illuminate\Support\Facades\Schema;

            class AddCurrencyToAppointmentTransitsTable extends Migration
            {
            /**
            * Run the migrations.
            *
            * @return void
            */
            public function up()
            {

            Schema::table( 'appointment_transits', function (Blueprint $table) {
                $table->String('currency')->nullable()->default('SAR'); 

            });
            }

            /**
            * Reverse the migrations.
            *
            * @return void
            */
            public function down()
            {
            Schema::table( 'appointment_transits', function (Blueprint $table) {
                $table->dropColumn( 'currency');

           });
            }
            }
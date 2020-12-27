
            <?php
            use Illuminate\Database\Migrations\Migration;
            use Illuminate\Database\Schema\Blueprint;
            use Illuminate\Support\Facades\Schema;

            class AddCreatedByToAppointmentNotesTable extends Migration
            {
            /**
            * Run the migrations.
            *
            * @return void
            */
            public function up()
            {

            Schema::table( 'appointment_notes', function (Blueprint $table) {
                $table->String('created_by')->nullable(); 

            });
            }

            /**
            * Reverse the migrations.
            *
            * @return void
            */
            public function down()
            {
            Schema::table( 'appointment_notes', function (Blueprint $table) {
                $table->dropColumn( 'created_by');

           });
            }
            }
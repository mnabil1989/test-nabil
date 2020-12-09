
            <?php
            use Illuminate\Database\Migrations\Migration;
            use Illuminate\Database\Schema\Blueprint;
            use Illuminate\Support\Facades\Schema;

            class AddNameDescriptionQtyToAppointmentNotesTable extends Migration
            {
            /**
            * Run the migrations.
            *
            * @return void
            */
            public function up()
            {

            Schema::table( 'appointment_notes', function (Blueprint $table) {
                $table->String('name',255)->nullable(); 
$table->Text('description')->nullable(); 
$table->String('qty',255)->nullable(); 

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
                $table->dropColumn( 'name');
$table->dropColumn( 'description');
$table->dropColumn( 'qty');

           });
            }
            }
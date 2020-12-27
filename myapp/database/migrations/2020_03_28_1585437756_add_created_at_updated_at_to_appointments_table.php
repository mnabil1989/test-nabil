
            <?php
            use Illuminate\Database\Migrations\Migration;
            use Illuminate\Database\Schema\Blueprint;
            use Illuminate\Support\Facades\Schema;

            class AddCreatedAtUpdatedAtToAppointmentsTable extends Migration
            {
            /**
            * Run the migrations.
            *
            * @return void
            */
            public function up()
            {

            Schema::table( 'appointments', function (Blueprint $table) {
                $table->TimeStamp('created_at')->nullable(); 
$table->TimeStamp('updated_at')->nullable(); 

            });
            }

            /**
            * Reverse the migrations.
            *
            * @return void
            */
            public function down()
            {
            Schema::table( 'appointments', function (Blueprint $table) {
                $table->dropColumn( 'created_at');
$table->dropColumn( 'updated_at');

           });
            }
            }
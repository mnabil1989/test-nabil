
            <?php
            use Illuminate\Database\Migrations\Migration;
            use Illuminate\Database\Schema\Blueprint;
            use Illuminate\Support\Facades\Schema;

            class CreateAppointmentsTable extends Migration
            {
            /**
            * Run the migrations.
            *
            * @return void
            */
            public function up()
            {

            Schema::create('appointments', function (Blueprint $table) {
                $table->Integer('id')->autoIncrement()->unsigned(); 
$table->Integer('doctor_id')->nullable(); 
$table->Integer('user_id')->nullable(); 
$table->String('start')->nullable(); 
$table->String('duration')->nullable(); 
$table->String('comments')->nullable(); 
$table->Integer('confirmed')->nullable(); 
$table->Integer('payment_confirmed')->nullable(); 

            });
            }

            /**
            * Reverse the migrations.
            *
            * @return void
            */
            public function down()
            {
                Schema::drop('appointments');
            }
            }
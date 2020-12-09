
            <?php
            use Illuminate\Database\Migrations\Migration;
            use Illuminate\Database\Schema\Blueprint;
            use Illuminate\Support\Facades\Schema;

            class AddPriceDurationToDoctorsTable extends Migration
            {
            /**
            * Run the migrations.
            *
            * @return void
            */
            public function up()
            {

            Schema::table( 'doctors', function (Blueprint $table) {
                $table->String('price')->nullable(); 
$table->String('duration')->nullable(); 

            });
            }

            /**
            * Reverse the migrations.
            *
            * @return void
            */
            public function down()
            {
            Schema::table( 'doctors', function (Blueprint $table) {
                $table->dropColumn( 'price');
$table->dropColumn( 'duration');

           });
            }
            }
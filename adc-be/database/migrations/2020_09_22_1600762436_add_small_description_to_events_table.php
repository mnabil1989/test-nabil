
            <?php
            use Illuminate\Database\Migrations\Migration;
            use Illuminate\Database\Schema\Blueprint;
            use Illuminate\Support\Facades\Schema;

            class AddSmallDescriptionToEventsTable extends Migration
            {
            /**
            * Run the migrations.
            *
            * @return void
            */
            public function up()
            {

            Schema::table( 'events', function (Blueprint $table) {
                $table->LongText('small_description')->nullable(); 

            });
            }

            /**
            * Reverse the migrations.
            *
            * @return void
            */
            public function down()
            {
            Schema::table( 'events', function (Blueprint $table) {
                $table->dropColumn( 'small_description');

           });
            }
            }
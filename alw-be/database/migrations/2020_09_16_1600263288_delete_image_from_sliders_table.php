
            <?php
            use Illuminate\Database\Migrations\Migration;
            use Illuminate\Database\Schema\Blueprint;
            use Illuminate\Support\Facades\Schema;

            class DeleteImageFromSlidersTable extends Migration
            {
            /**
            * Run the migrations.
            *
            * @return void
            */
            public function up()
            {

            Schema::table( 'sliders', function (Blueprint $table) {
                $table->dropColumn( 'image');

            });
            }

            /**
            * Reverse the migrations.
            *
            * @return void
            */
            public function down()
            {
            Schema::table( 'sliders', function (Blueprint $table) {
                $table->String('image',255)->nullable(); 

           });
            }
            }
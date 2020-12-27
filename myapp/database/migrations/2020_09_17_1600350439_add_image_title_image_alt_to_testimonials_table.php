
            <?php
            use Illuminate\Database\Migrations\Migration;
            use Illuminate\Database\Schema\Blueprint;
            use Illuminate\Support\Facades\Schema;

            class AddImageTitleImageAltToTestimonialsTable extends Migration
            {
            /**
            * Run the migrations.
            *
            * @return void
            */
            public function up()
            {

            Schema::table( 'testimonials', function (Blueprint $table) {
                $table->Text('image_title',255)->nullable(); 
$table->Text('image_alt',255)->nullable(); 

            });
            }

            /**
            * Reverse the migrations.
            *
            * @return void
            */
            public function down()
            {
            Schema::table( 'testimonials', function (Blueprint $table) {
                $table->dropColumn( 'image_title');
$table->dropColumn( 'image_alt');

           });
            }
            }
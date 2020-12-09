
            <?php
            use Illuminate\Database\Migrations\Migration;
            use Illuminate\Database\Schema\Blueprint;
            use Illuminate\Support\Facades\Schema;

            class AddImageTitleImageAltOrderToOffersTable extends Migration
            {
            /**
            * Run the migrations.
            *
            * @return void
            */
            public function up()
            {

            Schema::table( 'offers', function (Blueprint $table) {
                $table->String('image_title',255)->nullable(); 
$table->String('image_alt',255)->nullable(); 
$table->Integer('order')->nullable(); 

            });
            }

            /**
            * Reverse the migrations.
            *
            * @return void
            */
            public function down()
            {
            Schema::table( 'offers', function (Blueprint $table) {
                $table->dropColumn( 'image_title');
$table->dropColumn( 'image_alt');
$table->dropColumn( 'order');

           });
            }
            }

            <?php
            use Illuminate\Database\Migrations\Migration;
            use Illuminate\Database\Schema\Blueprint;
            use Illuminate\Support\Facades\Schema;

            class ChangePriceDiscountPriceInOffersTable extends Migration
            {
            /**
            * Run the migrations.
            *
            * @return void
            */
            public function up()
            {

            Schema::table( 'offers', function (Blueprint $table) {
                $table->Integer('price')->change(); 
$table->Integer('discount_price')->change(); 

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
                $table->String('price',255)->change(); 
$table->String('discount_price',255)->change(); 

           });
            }
            }
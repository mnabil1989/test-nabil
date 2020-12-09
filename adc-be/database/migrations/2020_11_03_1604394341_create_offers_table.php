
            <?php
            use Illuminate\Database\Migrations\Migration;
            use Illuminate\Database\Schema\Blueprint;
            use Illuminate\Support\Facades\Schema;

            class CreateOffersTable extends Migration
            {
            /**
            * Run the migrations.
            *
            * @return void
            */
            public function up()
            {

            Schema::create('offers', function (Blueprint $table) {
                $table->Integer('id')->autoIncrement()->unsigned(); 
$table->String('title',255)->nullable(); 
$table->String('slug',255)->nullable(); 
$table->String('small_description',255)->nullable(); 
$table->String('photo',255)->nullable(); 
$table->String('meta_keywords',255)->nullable(); 
$table->String('meta_description',255)->nullable(); 
$table->Integer('top_offer')->nullable()->default('0'); 
$table->String('price',255)->nullable(); 
$table->String('discount_price',255)->nullable(); 
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
                Schema::drop('offers');
            }
            }
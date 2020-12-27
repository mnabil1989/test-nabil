
            <?php
            use Illuminate\Database\Migrations\Migration;
            use Illuminate\Database\Schema\Blueprint;
            use Illuminate\Support\Facades\Schema;

            class CreateSellingPointsTable extends Migration
            {
            /**
            * Run the migrations.
            *
            * @return void
            */
            public function up()
            {

            Schema::create('selling_points', function (Blueprint $table) {
                $table->Integer('id')->autoIncrement()->unsigned(); 
$table->String('logo',255)->nullable(); 
$table->String('title',255)->nullable(); 
$table->Text('description')->nullable(); 
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
                Schema::drop('selling_points');
            }
            }
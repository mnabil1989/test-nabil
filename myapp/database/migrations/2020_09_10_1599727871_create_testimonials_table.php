
            <?php
            use Illuminate\Database\Migrations\Migration;
            use Illuminate\Database\Schema\Blueprint;
            use Illuminate\Support\Facades\Schema;

            class CreateTestimonialsTable extends Migration
            {
            /**
            * Run the migrations.
            *
            * @return void
            */
            public function up()
            {

            Schema::create('testimonials', function (Blueprint $table) {
                $table->Integer('id')->autoIncrement()->unsigned(); 
$table->String('username',255)->nullable(); 
$table->String('image',255)->nullable(); 
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
                Schema::drop('testimonials');
            }
            }
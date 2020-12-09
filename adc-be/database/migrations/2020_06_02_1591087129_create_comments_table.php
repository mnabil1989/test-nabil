
            <?php
            use Illuminate\Database\Migrations\Migration;
            use Illuminate\Database\Schema\Blueprint;
            use Illuminate\Support\Facades\Schema;

            class CreateCommentsTable extends Migration
            {
            /**
            * Run the migrations.
            *
            * @return void
            */
            public function up()
            {

            Schema::create('comments', function (Blueprint $table) {
                $table->Integer('id')->autoIncrement()->unsigned(); 
$table->String('name',250)->nullable(); 
$table->Text('comment')->nullable(); 
$table->String('image',250)->nullable(); 
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
                Schema::drop('comments');
            }
            }

            <?php
            use Illuminate\Database\Migrations\Migration;
            use Illuminate\Database\Schema\Blueprint;
            use Illuminate\Support\Facades\Schema;

            class CreateJourneysTable extends Migration
            {
            /**
            * Run the migrations.
            *
            * @return void
            */
            public function up()
            {

            Schema::create('journeys', function (Blueprint $table) {
                $table->Integer('id')->autoIncrement()->unsigned(); 
                $table->String('title',255)->nullable(); 
                $table->String('slug',255)->nullable(); 
                $table->string('image')->nullable(); 
                $table->Text('small_description',99999)->nullable(); 
                $table->Text('description',99999)->nullable(); 
                $table->String('image_alt',255)->nullable(); 
                $table->String('image_title',255)->nullable(); 
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
                Schema::drop('journeys');
            }
            }
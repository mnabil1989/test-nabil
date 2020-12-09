
            <?php
            use Illuminate\Database\Migrations\Migration;
            use Illuminate\Database\Schema\Blueprint;
            use Illuminate\Support\Facades\Schema;

            class CreatePartnersTable extends Migration
            {
            /**
            * Run the migrations.
            *
            * @return void
            */
            public function up()
            {

            Schema::create('partners', function (Blueprint $table) {
                $table->Integer('id')->autoIncrement()->unsigned(); 
                $table->String('logo',255)->nullable(); 
                $table->String('link',255)->nullable(); 
                $table->String('image_title',255)->nullable(); 
                $table->String('image_alt',255)->nullable(); 
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
                Schema::drop('partners');
            }
            }
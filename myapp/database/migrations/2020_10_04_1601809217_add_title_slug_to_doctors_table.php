
            <?php
            use Illuminate\Database\Migrations\Migration;
            use Illuminate\Database\Schema\Blueprint;
            use Illuminate\Support\Facades\Schema;

            class AddTitleSlugToDoctorsTable extends Migration
            {
            /**
            * Run the migrations.
            *
            * @return void
            */
            public function up()
            {

            Schema::table( 'doctors', function (Blueprint $table) {
                $table->String('title',255)->nullable(); 
$table->String('slug',255)->nullable(); 

            });
            }

            /**
            * Reverse the migrations.
            *
            * @return void
            */
            public function down()
            {
            Schema::table( 'doctors', function (Blueprint $table) {
                $table->dropColumn( 'title');
$table->dropColumn( 'slug');

           });
            }
            }
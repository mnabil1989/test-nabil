
            <?php
            use Illuminate\Database\Migrations\Migration;
            use Illuminate\Database\Schema\Blueprint;
            use Illuminate\Support\Facades\Schema;

            class AddNameSlugToClinicsTable extends Migration
            {
            /**
            * Run the migrations.
            *
            * @return void
            */
            public function up()
            {

            Schema::table( 'clinics', function (Blueprint $table) {
                $table->String('name',255)->nullable(); 
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
            Schema::table( 'clinics', function (Blueprint $table) {
                $table->dropColumn( 'name');
$table->dropColumn( 'slug');

           });
            }
            }

            <?php
            use Illuminate\Database\Migrations\Migration;
            use Illuminate\Database\Schema\Blueprint;
            use Illuminate\Support\Facades\Schema;

            class DeleteNameArNameEnSlugArSlugEnFromServicesTable extends Migration
            {
            /**
            * Run the migrations.
            *
            * @return void
            */
            public function up()
            {

            Schema::table( 'services', function (Blueprint $table) {
                $table->dropColumn( 'name_ar');
$table->dropColumn( 'name_en');
$table->dropColumn( 'slug_ar');
$table->dropColumn( 'slug_en');

            });
            }

            /**
            * Reverse the migrations.
            *
            * @return void
            */
            public function down()
            {
            Schema::table( 'services', function (Blueprint $table) {
                $table->String('name_ar',255)->nullable(); 
$table->String('name_en',255)->nullable(); 
$table->String('slug_ar',255)->nullable(); 
$table->String('slug_en',255)->nullable(); 

           });
            }
            }
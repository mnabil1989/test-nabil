
            <?php
            use Illuminate\Database\Migrations\Migration;
            use Illuminate\Database\Schema\Blueprint;
            use Illuminate\Support\Facades\Schema;

            class DeleteTitleArTitleEnSlugArSlugEnFromDoctorsTable extends Migration
            {
            /**
            * Run the migrations.
            *
            * @return void
            */
            public function up()
            {

            Schema::table( 'doctors', function (Blueprint $table) {
                $table->dropColumn( 'title_ar');
$table->dropColumn( 'title_en');
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
            Schema::table( 'doctors', function (Blueprint $table) {
                $table->String('title_ar',255)->nullable(); 
$table->String('title_en',255)->nullable(); 
$table->String('slug_ar',255)->nullable(); 
$table->String('slug_en',255)->nullable(); 

           });
            }
            }
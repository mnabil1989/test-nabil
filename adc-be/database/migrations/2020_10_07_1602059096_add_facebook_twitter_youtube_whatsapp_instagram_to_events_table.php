
            <?php
            use Illuminate\Database\Migrations\Migration;
            use Illuminate\Database\Schema\Blueprint;
            use Illuminate\Support\Facades\Schema;

            class AddFacebookTwitterYoutubeWhatsappInstagramToEventsTable extends Migration
            {
            /**
            * Run the migrations.
            *
            * @return void
            */
            public function up()
            {

            Schema::table( 'events', function (Blueprint $table) {
                $table->String('facebook',255)->nullable(); 
$table->String('twitter',255)->nullable(); 
$table->String('youtube',255)->nullable(); 
$table->String('whatsapp',255)->nullable(); 
$table->String('instagram',255)->nullable(); 

            });
            }

            /**
            * Reverse the migrations.
            *
            * @return void
            */
            public function down()
            {
            Schema::table( 'events', function (Blueprint $table) {
                $table->dropColumn( 'facebook');
$table->dropColumn( 'twitter');
$table->dropColumn( 'youtube');
$table->dropColumn( 'whatsapp');
$table->dropColumn( 'instagram');

           });
            }
            }
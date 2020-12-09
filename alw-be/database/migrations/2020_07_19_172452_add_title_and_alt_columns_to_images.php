<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTitleAndAltColumnsToImages extends Migration
{
    public $tablesNames=["clinics","doctors","services","posts","events","sliders"];
   public $commonFieldsNames=["image","image_title","image_alt"];
    
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        $tablesNames =$this->tablesNames;
        $commonFieldsNames =$this->commonFieldsNames;

        foreach( $tablesNames as $tableName ){
            foreach( $commonFieldsNames as $fieldName){ 
                if(!Schema::hasColumn($tableName, $fieldName)  ){
                    if($fieldName == "image" && Schema::hasColumn($tableName, "photo")){
                        continue;
                    }
                    Schema::table($tableName, function (Blueprint $table) use ($fieldName) {
                        $table->String($fieldName)->nullable(); 
                    });
                }
            }
        }
   
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $tablesNames =$this->tablesNames;
        $commonFieldsNames =$this->commonFieldsNames;
        
        foreach( $tablesNames as $tableName ){
            foreach( $commonFieldsNames as $fieldName){ 
                if(Schema::hasColumn($tableName, $fieldName) ){
                    Schema::table($tableName, function (Blueprint $table) use ($fieldName) {
                        $table->dropColumn($fieldName);
                    });
                }
            }
        }
    }
}

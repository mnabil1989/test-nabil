<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSeoMetaFieldsToListOfModelsTables extends Migration
{  
   public $tablesNames=["categories","posts","clinics","services","tags","events","doctors","specialities","comments"];
   public $commonFieldsNames=["meta_description","meta_keywords","facebook_title","facebook_description","facebook_image","twitter_title","twitter_description","twitter_image"];
    
    
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
                if(!Schema::hasColumn($tableName, $fieldName) ){
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

<?php

use Illuminate\Database\Seeder;
use App\SiteSetting as Seosetting;

use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;
use TCG\Voyager\Models\Permission;
use TCG\Voyager\Models\Translation;

class SeoMetaSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pagesNmaes=["clinics","doctors","services","posts","events","testimonials"];
        $commonFieldsNames=["meta.title","meta.description","meta.keywords","facebook.title","facebook.description","facebook.image","twitter.title","twitter.description","twitter.image"];
        $seoMetaOrder=30;

        foreach( $pagesNmaes as $pageNmae){

            $groupName= ucfirst($pageNmae).' Metas';

           foreach($commonFieldsNames as $fieldName){
                //genrate seqouns key 
                $key = $pageNmae.'.'.$fieldName;
                $checkingKey=Seosetting::where("key",'like','%'.$key.'%')->first();
                if($checkingKey === null ){
                    //genrate seqouns Order
                    $seoMetaOrder = $seoMetaOrder + 1 ;
                    //genrate seqouns display name
                    $displayName = ucfirst($pageNmae).' '.ucfirst(str_replace(".", " ",$fieldName)) ;

                    if(strstr($fieldName,"image") ){
                        $type = "image";
                        
                    }else{
                        $type = "text";
                    }

                    Seosetting::create( [
                        'key'=> $key,
                        'display_name'=> $displayName,
                        'value'=>'',
                        'details'=>NULL,
                        'type'=> $type,
                        'order'=>$seoMetaOrder,
                        'group'=> $groupName
                    ] );
                }
                
           }

        }

        }

            /**
     * [dataRow description].
     *
     * @param [type] $type  [description]
     * @param [type] $field [description]
     *
     * @return [type] [description]
     */
    protected function dataRow($type, $field)
    {
        return DataRow::firstOrNew([
            'data_type_id' => $type->id,
            'field'        => $field,
        ]);
    }

    /**
     * [dataType description].
     *
     * @param [type] $field [description]
     * @param [type] $for   [description]
     *
     * @return [type] [description]
     */
    protected function dataType($field, $for)
    {
        return DataType::firstOrNew([$field => $for]);
    }


}


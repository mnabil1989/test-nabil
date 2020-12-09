<?php

use Illuminate\Database\Seeder;
use App\SiteSetting as Seosetting;

use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;
use TCG\Voyager\Models\Permission;
use TCG\Voyager\Models\Translation;

class imagesSettingsTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pagesNameAtDataTypesTable=["clinics","doctors","services","posts","events"];
        $commonFieldsNames=["image","image_title","image_alt"];
        
        foreach($pagesNameAtDataTypesTable as $pagesName ){
            $pageAtdataType = DataType::where('name','=',$pagesName)->first();
            if($pageAtdataType  !== null ){

                $pagesIdsAtDataTypesTable[$pagesName]=$pageAtdataType->id;
            }
        }

        foreach( $pagesIdsAtDataTypesTable as $pageName => $pageId){
            $order =25;
            foreach( $commonFieldsNames as $fieldName){
                $order  = $order  + 1 ;
                $checkingField=Datarow::where("data_type_id",'=',$pageId)->where("field",'like','%'.$fieldName.'%')->first();
                if($checkingField === null ){

                    if($fieldName == "image"){
                        $type = "image";
                        $checkingPhotoField=Datarow::where("data_type_id",'=',$pageId)->where("field",'like','%photo%')->first();
                        if( $checkingPhotoField  === null ){
                            $fieldName = "photo";
                        }
                        
                    }else{
                        $type = "text";
                    }
                    Datarow::create([
                        
                        'data_type_id' => $pageId,
                        'field' => $fieldName,
                        'type' => $type,
                        'display_name' => ucfirst(str_replace("_", " ",$fieldName)),
                        'required' => 0,
                        'browse' => 1,
                        'read' => 1,
                        'edit' => 1,
                        'add' => 1,
                        'delete' => 1,
                        'details' => '{}',
                        'order' => $order
                    ]);
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


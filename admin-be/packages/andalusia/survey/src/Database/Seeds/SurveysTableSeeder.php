<?php

namespace Andalusia\Survey\Database\Seeds;

use Illuminate\Database\Seeder;
use Andalusia\Survey\Models\Survey;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;
use TCG\Voyager\Models\Permission;

class SurveysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Data Type
        $dataType = $this->dataType('name', 'surveys');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'surveys',
                'slug'                  => 'surveys',
                'display_name_singular' => 'Survey',
                'display_name_plural'   => 'Surveys',
                'icon'                  => 'voyager-bubble',
                'model_name'            => 'Andalusia\\Survey\\Models\\Survey',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }
        //Data Rows
        $surveyDataType = DataType::where('slug', 'surveys')->firstOrFail();
        $dataRowOrder   = 0;

        $dataRow = $this->dataRow($surveyDataType, 'id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'number',
                'display_name' => __('voyager::seeders.data_rows.id'),
                'required'     => 1,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => $dataRowOrder++,
            ])->save();
        }

        $dataRow = $this->dataRow($surveyDataType, 'same_page');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'select_dropdown',
                'display_name' => ucwords(str_replace("_", " ", "same_page")),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
                    'default' => '1',
                    'options' => [
                        '0' => 'No',
                        '1' => 'Yes'
                    ]
                ],
                'order' => $dataRowOrder++,
            ])->save();
        }

        $dataRow = $this->dataRow($surveyDataType, 'popup_type');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'select_dropdown',
                'display_name' => ucwords(str_replace("_", " ", "popup_type")),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
                    'default' => 'small',
                    'options' => [
                        'small' => 'Small',
                        'big'   => 'Big'
                    ]
                ],
                'order' => $dataRowOrder++,
            ])->save();
        }

        $dataRow = $this->dataRow($surveyDataType, 'popup_timer');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'number',
                'display_name' => ucwords(str_replace("_", " ", "popup_timer")),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
                    'default' => 1,
                ],
                'order'        => $dataRowOrder++,
            ])->save();
        }

        $dataRow = $this->dataRow($surveyDataType, 'number_of_questions_on_page');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'number',
                'display_name' => ucwords(str_replace("_", " ", "number_of_questions_on_page")),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
                    'validation' => [
                        'rule' => 'required_if:popup_type,small'
                    ]
                ],
                'order' => $dataRowOrder++,
            ])->save();
        }

        $dataRow = $this->dataRow($surveyDataType, 'slug');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => ucwords(str_replace("_", " ", "slug")),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
                    'slugify' => [
                        'origin' => 'slug',
                    ],
                    'validation' => [
                        'rule' => 'required_if:same_page,0'
                    ]
                ],
                'order' => $dataRowOrder++,
            ])->save();
        }

        $dataRow = $this->dataRow($surveyDataType, 'note');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => ucwords(str_replace("_", " ", "note")),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
                    'slugify' => [
                        'origin' => 'name',
                    ],
                ],
                'order' => $dataRowOrder++,
            ])->save();
        }

        $dataRow = $this->dataRow($surveyDataType, 'redirect_link');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => ucwords(str_replace("_", " ", "redirect_link")),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
                    'slugify' => [
                        'origin' => 'name',
                    ],
                ],
                'order' => $dataRowOrder++,
            ])->save();
        }

        $dataRow = $this->dataRow($surveyDataType, 'created_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('voyager::seeders.data_rows.created_at'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => $dataRowOrder++,
            ])->save();
        }

        $dataRow = $this->dataRow($surveyDataType, 'updated_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('voyager::seeders.data_rows.updated_at'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => $dataRowOrder++,
            ])->save();
        }

        //Menu Item
        $menu     = Menu::where('name', 'admin')->firstOrFail();
        $parent   = MenuItem::where('title', 'Survey Module')->firstOrFail();
        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Surveys',
            'url'     => '',
            'route'   => 'voyager.surveys.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-bubble',
                'color'      => null,
                'parent_id'  => $parent->id,
                'order'      => 1,
            ])->save();
        }

        //Permissions
        Permission::generateFor('surveys');

        //Content
        Survey::create([
            'same_page'                   => 1,
            'popup_type'                  => 'small',
            'popup_timer'                 => 3,
            'number_of_questions_on_page' => 15,
            'slug'                        => 'test-survey',
            'note'                        => 'Thanks',
            'redirect_link'               => 'http://www.andalusiagroup.net'
        ]);
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

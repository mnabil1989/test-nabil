<?php

namespace Andalusia\Survey\Database\Seeds;

use Illuminate\Database\Seeder;
use Andalusia\Survey\Models\SurveyQuestion;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;
use TCG\Voyager\Models\Permission;

class SurveysQuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Data Type
        $dataType = $this->dataType('name', 'survey_question');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'survey_question',
                'slug'                  => 'survey-question',
                'display_name_singular' => 'Survey Question',
                'display_name_plural'   => 'Survey Questions',
                'icon'                  => 'voyager-question',
                'model_name'            => 'Andalusia\\Survey\\Models\\SurveyQuestion',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }
        //Data Rows
        $questionDataType = DataType::where('slug', 'survey-question')->firstOrFail();
        $dataRowOrder   = 0;

        $dataRow = $this->dataRow($questionDataType, 'id');
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

        $dataRow = $this->dataRow($questionDataType, 'survey_id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => ucwords(str_replace("_", " ", "survey_id")),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => $dataRowOrder++,
            ])->save();
        }

        $dataRow = $this->dataRow($questionDataType, 'survey_question_belongsto_survey_relationship');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'relationship',
                'display_name' => 'Survey',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
                    'model'       => 'Andalusia\\Survey\\Models\\Survey',
                    'table'       => 'surveys',
                    'type'        => 'belongsTo',
                    'column'      => 'survey_id',
                    'key'         => 'id',
                    'label'       => 'id',
                    'pivot_table' => 'admins',
                    'pivot'       => '0',
                    'taggable'    => '0'
                ],
                'order' => $dataRowOrder++,
            ])->save();
        }

        $dataRow = $this->dataRow($questionDataType, 'order');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'number',
                'display_name' => ucwords(str_replace("_", " ", "order")),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => $dataRowOrder++,
            ])->save();
        }

        $dataRow = $this->dataRow($questionDataType, 'question');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => ucwords(str_replace("_", " ", "question")),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => $dataRowOrder++,
            ])->save();
        }

        $dataRow = $this->dataRow($questionDataType, 'form_type');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'select_dropdown',
                'display_name' => ucwords(str_replace("_", " ", "form_type")),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
                    'options' => [
                        'text'     => 'Text',
                        'textarea' => 'Textarea',
                        'menu'     => 'Menu',
                        'checkbox' => 'Checkbox',
                        'radio'    => 'Radio'
                    ]
                ],
                'order' => $dataRowOrder++,
            ])->save();
        }

        $dataRow = $this->dataRow($questionDataType, 'created_at');
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

        $dataRow = $this->dataRow($questionDataType, 'updated_at');
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
            'title'   => 'Questions',
            'url'     => '',
            'route'   => 'voyager.survey-question.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-question',
                'color'      => null,
                'parent_id'  => $parent->id,
                'order'      => 2,
            ])->save();
        }

        //Permissions
        Permission::generateFor('survey_question');

        //Content
        SurveyQuestion::create([
            'survey_id' => 1,
            'order'     => 1,
            'question'  => 'what\'s your favorite color?',
            'form_type' => 'radio'
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

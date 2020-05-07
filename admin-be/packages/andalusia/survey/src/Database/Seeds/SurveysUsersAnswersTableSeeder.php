<?php

namespace Andalusia\Survey\Database\Seeds;

use Andalusia\Survey\Models\SurveyUserInfo;
use Andalusia\Survey\Models\SurveyUserAnswer;
use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;
use TCG\Voyager\Models\Permission;

class SurveysUsersAnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Data Type
        $dataType = $this->dataType('name', 'survey_user_answer');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'survey_user_answer',
                'slug'                  => 'survey-user-answer',
                'display_name_singular' => 'Survey User Answer',
                'display_name_plural'   => 'Survey User Answers',
                'icon'                  => 'voyager-group',
                'model_name'            => 'Andalusia\\Survey\\Models\\SurveyUserAnswer',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }
        //Data Rows
        $surveyUsersAnswersDataType = DataType::where('slug', 'survey-user-answer')->firstOrFail();
        $dataRowOrder               = 0;

        $dataRow = $this->dataRow($surveyUsersAnswersDataType, 'id');
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

        $dataRow = $this->dataRow($surveyUsersAnswersDataType, 'user_info_id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => ucwords(str_replace("_", " ", "user_info_id")),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => $dataRowOrder++,
                'details'      => [
                    'validation'  => [
                        'rule' => 'required'
                    ]
                ],
            ])->save();
        }

        $dataRow = $this->dataRow($surveyUsersAnswersDataType, 'survey_user_answer_belongsto_survey_user_info_relationship');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'relationship',
                'display_name' => 'User Info',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
                    'model'       => 'Andalusia\\Survey\\Models\\SurveyUserInfo',
                    'table'       => 'survey_user_info',
                    'type'        => 'belongsTo',
                    'column'      => 'user_info_id',
                    'key'         => 'id',
                    'label'       => 'id',
                    'pivot_table' => 'admins',
                    'pivot'       => '0',
                    'taggable'    => '0'
                ],
                'order' => $dataRowOrder++,
            ])->save();
        }

        $dataRow = $this->dataRow($surveyUsersAnswersDataType, 'answer_id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => ucwords(str_replace("_", " ", "answer_id")),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => $dataRowOrder++,
                'details'      => [
                    'validation'  => [
                        'rule' => 'required_if:answer_text,'
                    ]
                ],
            ])->save();
        }

        $dataRow = $this->dataRow($surveyUsersAnswersDataType, 'survey_user_answer_belongsto_survey_answer_relationship');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'relationship',
                'display_name' => 'Answer',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
                    'model'       => 'Andalusia\\Survey\\Models\\SurveyAnswer',
                    'table'       => 'survey_answer',
                    'type'        => 'belongsTo',
                    'column'      => 'answer_id',
                    'key'         => 'id',
                    'label'       => 'answer',
                    'pivot_table' => 'admins',
                    'pivot'       => '0',
                    'taggable'    => '0'
                ],
                'order' => $dataRowOrder++,
            ])->save();
        }

        $dataRow = $this->dataRow($surveyUsersAnswersDataType, 'answer_text');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => ucwords(str_replace("_", " ", "answer_text")),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => $dataRowOrder++,
            ])->save();
        }

        $dataRow = $this->dataRow($surveyUsersAnswersDataType, 'created_at');
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

        $dataRow = $this->dataRow($surveyUsersAnswersDataType, 'updated_at');
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
            'title'   => 'Users Answers',
            'url'     => '',
            'route'   => 'voyager.survey-user-answer.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-group',
                'color'      => null,
                'parent_id'  => $parent->id,
                'order'      => 4,
            ])->save();
        }

        //Permissions
        Permission::generateFor('survey_user_answer');

        //Content
//        SurveyUserInfo::create([
//
//        ]);
//        SurveyUserAnswer::create([
//
//        ]);
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

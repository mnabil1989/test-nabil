<?php

use Illuminate\Database\Seeder;
use App\Workinghour;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;
use TCG\Voyager\Models\Permission;

class WorkingHoursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Data Type
        $dataType = $this->dataType('name', 'workinghours');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'workinghours',
                'slug'                  => 'workinghours',
                'display_name_singular' => 'Working Hour',
                'display_name_plural'   => 'Working Hours',
                'icon'                  => 'voyager-receipt',
                'model_name'            => 'App\\Workinghour',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }
        //Data Rows
        $itemDataType = DataType::where('slug', 'workinghours')->firstOrFail();
        $dataRowOrder   = 0;

        $dataRow = $this->dataRow($itemDataType, 'id');
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

        $dataRow = $this->dataRow($itemDataType, 'doctor_id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => ucwords(str_replace("_", " ", "doctor_id")),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => $dataRowOrder++,
            ])->save();
        }

        $dataRow = $this->dataRow($itemDataType, 'workinghours_belongsto_doctor_relationship');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'relationship',
                'display_name' => 'Doctor',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
                    'model'       => 'App\\Doctor',
                    'table'       => 'doctors',
                    'type'        => 'belongsTo',
                    'column'      => 'doctor_id',
                    'key'         => 'id',
                    'label'       => 'title_en',
                    'pivot_table' => 'admins',
                    'pivot'       => '0',
                    'taggable'    => '0'
                ],
                'order' => $dataRowOrder++,
            ])->save();
        }

        $dataRow = $this->dataRow($itemDataType, 'day');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'select_dropdown',
                'display_name' => ucwords(str_replace("_", " ", "day")),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
                    'default' => 'Saturday',
                    'options' => [
                        'Saturday'  => 'Saturday',
                        'Sunday'    => 'Sunday',
                        'Monday'    => 'Monday',
                        'Tuesday'   => 'Tuesday',
                        'Wednesday' => 'Wednesday',
                        'Thursday'  => 'Thursday',
                        'Friday'    => 'Friday'
                    ]
                ],
                'order'        => $dataRowOrder++,
            ])->save();
        }

        $dataRow = $this->dataRow($itemDataType, 'start');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'time',
                'display_name' => ucwords(str_replace("_", " ", "start")),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
                    'validation' => [
                        'rule' => 'required'
                    ]
                ],
                'order'        => $dataRowOrder++,
            ])->save();
        }

        $dataRow = $this->dataRow($itemDataType, 'end');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'time',
                'display_name' => ucwords(str_replace("_", " ", "end")),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
                    'validation' => [
                        'rule' => 'required'
                    ]
                ],
                'order'        => $dataRowOrder++,
            ])->save();
        }

        $dataRow = $this->dataRow($itemDataType, 'type');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'select_dropdown',
                'display_name' => ucwords(str_replace("_", " ", "type")),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
                    'default' => 'Working',
                    'options' => [
                        'Working' => 'Working',
                        'Break'   => 'Break'
                    ]
                ],
                'order'        => $dataRowOrder++,
            ])->save();
        }

        $dataRow = $this->dataRow($itemDataType, 'created_at');
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

        $dataRow = $this->dataRow($itemDataType, 'updated_at');
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
        $parent   = MenuItem::where('title', 'Doctors')->firstOrFail();
        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Working Hours',
            'url'     => '',
            'route'   => 'voyager.workinghours.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-receipt',
                'color'      => null,
                'parent_id'  => $parent->id,
                'order'      => 2,
            ])->save();
        }

        //Permissions
        Permission::generateFor('workinghours');

        //Content
        $data = [
            [
                'doctor_id' => 1,
                'day'       => 'Sunday',
                'start'     => '08:00',
                'end'       => '11:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 1,
                'day'       => 'Tuesday',
                'start'     => '08:00',
                'end'       => '11:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 1,
                'day'       => 'Thursday',
                'start'     => '08:00',
                'end'       => '11:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 2,
                'day'       => 'Saturday',
                'start'     => '10:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 2,
                'day'       => 'Sunday',
                'start'     => '10:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 2,
                'day'       => 'Monday',
                'start'     => '10:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 2,
                'day'       => 'Tuesday',
                'start'     => '10:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 2,
                'day'       => 'Wednesday',
                'start'     => '10:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 2,
                'day'       => 'Thursday',
                'start'     => '10:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 3,
                'day'       => 'Saturday',
                'start'     => '10:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 3,
                'day'       => 'Sunday',
                'start'     => '10:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 3,
                'day'       => 'Monday',
                'start'     => '08:00',
                'end'       => '12:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 3,
                'day'       => 'Tuesday',
                'start'     => '10:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 3,
                'day'       => 'Wednesday',
                'start'     => '10:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 3,
                'day'       => 'Thursday',
                'start'     => '08:00',
                'end'       => '12:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 4,
                'day'       => 'Saturday',
                'start'     => '10:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 4,
                'day'       => 'Monday',
                'start'     => '10:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 5,
                'day'       => 'Tuesday',
                'start'     => '10:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 5,
                'day'       => 'Wednesday',
                'start'     => '10:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
        ];
        foreach ($data as $item)
        {
            Workinghour::create([
                'doctor_id' => $item['doctor_id'],
                'day'       => $item['day'],
                'start'     => $item['start'],
                'end'       => $item['end'],
                'type'      => $item['type']
            ]);
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

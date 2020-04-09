<?php

use Illuminate\Database\Seeder;
use App\Speciality;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;
use TCG\Voyager\Models\Permission;
use TCG\Voyager\Models\Translation;

class SpecialitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Data Type
        $dataType = $this->dataType('name', 'specialities');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'specialities',
                'slug'                  => 'specialities',
                'display_name_singular' => 'Speciality',
                'display_name_plural'   => 'Specialities',
                'icon'                  => 'voyager-certificate',
                'model_name'            => 'App\\Speciality',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }
        //Data Rows
        $itemDataType = DataType::where('slug', 'specialities')->firstOrFail();
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

        $dataRow = $this->dataRow($itemDataType, 'name');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => ucwords(str_replace("_", " ", "name")),
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
            'title'   => 'Specialities',
            'url'     => '',
            'route'   => 'voyager.specialities.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-certificate',
                'color'      => null,
                'parent_id'  => $parent->id,
                'order'      => 4,
            ])->save();
        }

        //Permissions
        Permission::generateFor('specialities');

        //Content
        $data = [
            [
                'name'    => 'أخصائي طب الأسنان',
                'name_en' => 'Dental specialist'
            ],
            [
                'name'    => 'أخصائي امراض القلب والاوعية الدموية',
                'name_en' => 'Specialist cardiovascular diseases'
            ],
            [
                'name'    => 'استشاري الجراحة العامة',
                'name_en' => 'General Surgery Consultant'
            ],
            [
                'name'    => 'أخصائي الأمراض الجلدية',
                'name_en' => 'Dermatologist'
            ],
            [
                'name'    => 'أخصائى أنف وأذن وحنجرة',
                'name_en' => 'Ear, Nose and Throat Specialist '
            ],
            [
                'name'    => 'أخصائي أمراض الباطنة وأمراض الكلى',
                'name_en' => 'Internal medicine and kidney disease specialist'
            ],
            [
                'name'    => 'أخصائي أمراض الجهاز الهضمي والكلى',
                'name_en' => 'Gastroenterologist and kidney specialist'
            ],
            [
                'name'    => 'أخصائي الامراض الباطنية',
                'name_en' => 'Internal medicine specialist'
            ],
            [
                'name'    => 'استشارى أمراض المخ و الأعصاب',
                'name_en' => 'Consultant of brain and nerve diseases'
            ],
            [
                'name'    => 'أخصائي أمراض النساء و الولادة',
                'name_en' => 'Obstetrician and Gynecologist'
            ],
            [
                'name'    => 'أخصائى أول نساء وولادة',
                'name_en' => 'The first obstetrician and gynecologist'
            ],
            [
                'name'    => 'استشارى طب و جراحة العيون',
                'name_en' => 'Consultant ophthalmology'
            ],
            [
                'name'    => 'أخصائي أمراض العظام والمفاصل',
                'name_en' => 'Bone and joint pathologist'
            ],
            [
                'name'    => 'أخصائى طب الأطفال',
                'name_en' => 'Pediatrician'
            ],
            [
                'name'    => 'استشاري المسالك البولية',
                'name_en' => 'Urology consultant'
            ],
            [
                'name'    => 'استشارى أمراض النفسية',
                'name_en' => 'Consultant of mental illness'
            ],
            [
                'name'    => 'استشارى الأمراض الصدرية',
                'name_en' => 'Consultant of chest diseases'
            ],
        ];

        foreach ($data as $item)
        {
            $speciality = Speciality::create([
                'name' => $item['name']
            ]);

            Translation::create([
                'table_name'  => 'specialities',
                'column_name' => 'name',
                'foreign_key' => $speciality->id,
                'locale'      => 'en',
                'value'       => $item['name_en']
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

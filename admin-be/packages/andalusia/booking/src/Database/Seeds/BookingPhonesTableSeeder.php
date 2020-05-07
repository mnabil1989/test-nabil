<?php

namespace Andalusia\Booking\Database\Seeds;

use Illuminate\Database\Seeder;
use Andalusia\Booking\Models\BookingPhone;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;
use TCG\Voyager\Models\Permission;

class BookingPhonesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Data Type
        $dataType = $this->dataType('name', 'booking_phones');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'booking_phones',
                'slug'                  => 'booking_phones',
                'display_name_singular' => 'Booking Phone',
                'display_name_plural'   => 'Bookings Phones',
                'icon'                  => 'voyager-phone',
                'model_name'            => 'Andalusia\\Booking\\Models\\BookingPhone',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }

        //Data Rows
        $bookingPhoneDataType = DataType::where('slug', 'booking_phones')->firstOrFail();
        $dataRowOrder    = 0;

        $dataRow = $this->dataRow($bookingPhoneDataType, 'id');
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

        $dataRow = $this->dataRow($bookingPhoneDataType, 'booking_id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => ucwords(str_replace("_", " ", "booking_id")),
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

        $dataRow = $this->dataRow($bookingPhoneDataType, 'booking_phones_belongsto_booking_relationship');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'relationship',
                'display_name' => 'Booking',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
                    'model'       => 'Andalusia\\Booking\\Models\\Booking',
                    'table'       => 'bookings',
                    'type'        => 'belongsTo',
                    'column'      => 'booking_id',
                    'key'         => 'id',
                    'label'       => 'id',
                    'pivot_table' => 'admins',
                    'pivot'       => '0',
                    'taggable'    => '0'
                ],
                'order' => $dataRowOrder++,
            ])->save();
        }

        $dataRow = $this->dataRow($bookingPhoneDataType, 'phone');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => ucwords(str_replace("_", " ", "phone")),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
                    'validation' => [
                        'rule' => ['required', 'regex:/^(009665|9665|\+9665|05|5)(5|0|3|6|4|9|1|8|7)([0-9]{7})$/']
                    ]
                ],
                'order'        => $dataRowOrder++,
            ])->save();
        }

        $dataRow = $this->dataRow($bookingPhoneDataType, 'created_at');
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

        $dataRow = $this->dataRow($bookingPhoneDataType, 'updated_at');
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
        $parent   = MenuItem::where('title', 'Booking Module')->firstOrFail();
        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Bookings Phones',
            'url'     => '',
            'route'   => 'voyager.booking_phones.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-phone',
                'color'      => null,
                'parent_id'  => $parent->id,
                'order'      => 3,
            ])->save();
        }

        //Permissions
        Permission::generateFor('booking_phones');

        //Content
        BookingPhone::create([
            'booking_id' => 1,
            'phone'      => '0501235408'
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

<?php

namespace Andalusia\Notification\Database\Seeds;

use Illuminate\Database\Seeder;
use Andalusia\Notification\Models\Notification;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;
use TCG\Voyager\Models\Permission;

class NotificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Data Type
        $dataType = $this->dataType('name', 'notifications');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'notifications',
                'slug'                  => 'notifications',
                'display_name_singular' => 'Notification',
                'display_name_plural'   => 'Notifications',
                'icon'                  => 'voyager-bell',
                'model_name'            => 'Andalusia\\Notification\\Models\\Notification',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }
        //Data Rows
        $notificationDataType = DataType::where('slug', 'notifications')->firstOrFail();
        $dataRowOrder         = 0;

        $dataRow = $this->dataRow($notificationDataType, 'id');
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

        $dataRow = $this->dataRow($notificationDataType, 'user_id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'number',
                'display_name' => ucwords(str_replace("_", " ", "user_id")),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => $dataRowOrder++,
            ])->save();
        }

        $dataRow = $this->dataRow($notificationDataType, 'image');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'image',
                'display_name' => ucwords(str_replace("_", " ", "image")),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => [
                    'resize' => [
                        'width'  => '1000',
                        'height' => 'null',
                    ],
                    'quality'    => '70%',
                    'upsize'     => true,
                    'thumbnails' => [
                        [
                            'name'  => 'medium',
                            'scale' => '50%',
                        ],
                        [
                            'name'  => 'small',
                            'scale' => '25%',
                        ],
                        [
                            'name' => 'cropped',
                            'crop' => [
                                'width'  => '300',
                                'height' => '250',
                            ],
                        ],
                    ],
                ],
                'order' => $dataRowOrder++,
            ])->save();
        }

        $dataRow = $this->dataRow($notificationDataType, 'thumbnail');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'image',
                'display_name' => ucwords(str_replace("_", " ", "thumbnail")),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => [
                    'resize' => [
                        'width'  => '1000',
                        'height' => 'null',
                    ],
                    'quality'    => '70%',
                    'upsize'     => true,
                    'thumbnails' => [
                        [
                            'name'  => 'medium',
                            'scale' => '50%',
                        ],
                        [
                            'name'  => 'small',
                            'scale' => '25%',
                        ],
                        [
                            'name' => 'cropped',
                            'crop' => [
                                'width'  => '300',
                                'height' => '250',
                            ],
                        ],
                    ],
                ],
                'order' => $dataRowOrder++,
            ])->save();
        }

        $dataRow = $this->dataRow($notificationDataType, 'link');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => ucwords(str_replace("_", " ", "link")),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
                    'validation' => [
                        'rule' => 'required|regex:#[-a-zA-Z0-9@:%_\+.~\#?&//=]{2,256}\.[a-z]{2,4}\b(\/[-a-zA-Z0-9@:%_\+.~\#?&//=]*)?#si'
                    ]
                ],
                'order' => $dataRowOrder++,
            ])->save();
        }

        $dataRow = $this->dataRow($notificationDataType, 'message');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text_area',
                'display_name' => ucwords(str_replace("_", " ", "message")),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => $dataRowOrder++,
            ])->save();
        }

        $dataRow = $this->dataRow($notificationDataType, 'type');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'select_dropdown',
                'display_name' => ucwords(str_replace("_", " ", "type")),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
                    'default' => 'normal',
                    'options' => [
                        'normal' => 'Normal',
                        'offer'  => 'Offer'
                    ]
                ],
                'order' => $dataRowOrder++,
            ])->save();
        }

        $dataRow = $this->dataRow($notificationDataType, 'is_read');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'select_dropdown',
                'display_name' => ucwords(str_replace("_", " ", "is_read")),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => [
                    'default' => '0',
                    'options' => [
                        '0' => 'Unread',
                        '1' => 'Read'
                    ]
                ],
                'order' => $dataRowOrder++,
            ])->save();
        }

        $dataRow = $this->dataRow($notificationDataType, 'created_at');
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

        $dataRow = $this->dataRow($notificationDataType, 'updated_at');
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
        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Notifications',
            'url'     => '',
            'route'   => 'voyager.notifications.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-bell',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 3,
            ])->save();
        }

        //Permissions
        Permission::generateFor('notifications');

        //Content
        Notification::create([
            'user_id' => 1,
            'link'    => 'http://www.andalusiagroup.net/',
            'message' => 'great news!',
            'type'    => 'normal'
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

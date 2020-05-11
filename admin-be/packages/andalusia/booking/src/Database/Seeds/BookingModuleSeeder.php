<?php

namespace Andalusia\Booking\Database\Seeds;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;

class BookingModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Menu Item
        $menu     = Menu::where('name', 'admin')->firstOrFail();
        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Booking Module',
            'url'     => '',
            'route'   => '',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-receipt',
                'color'      => '#000000',
                'parent_id'  => null,
                'order'      => 2,
            ])->save();
        }
    }
}

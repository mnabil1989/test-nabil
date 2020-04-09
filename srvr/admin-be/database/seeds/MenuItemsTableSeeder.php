<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;

class MenuItemsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        Menuitem::create( [
            'id'=>1,
            'menu_id'=>1,
            'title'=>'Dashboard',
            'url'=>'',
            'target'=>'_self',
            'icon_class'=>'voyager-dashboard',
            'color'=>'#000000',
            'parent_id'=>NULL,
            'order'=>1,
            'created_at'=>'2019-11-10 09:05:37',
            'updated_at'=>'2019-11-10 09:19:52',
            'route'=>'voyager.dashboard',
            'parameters'=>'null'
        ] );



        Menuitem::create( [
            'id'=>2,
            'menu_id'=>1,
            'title'=>'Media',
            'url'=>'',
            'target'=>'_self',
            'icon_class'=>'voyager-images',
            'color'=>'#000000',
            'parent_id'=>NULL,
            'order'=>12,
            'created_at'=>'2019-11-10 09:05:37',
            'updated_at'=>'2020-02-23 07:37:15',
            'route'=>'voyager.media.index',
            'parameters'=>'null'
        ] );



        Menuitem::create( [
            'id'=>3,
            'menu_id'=>1,
            'title'=>'Users',
            'url'=>'',
            'target'=>'_self',
            'icon_class'=>'voyager-person',
            'color'=>'#000000',
            'parent_id'=>16,
            'order'=>2,
            'created_at'=>'2019-11-10 09:05:37',
            'updated_at'=>'2019-11-11 06:34:16',
            'route'=>'voyager.users.index',
            'parameters'=>'null'
        ] );



        Menuitem::create( [
            'id'=>4,
            'menu_id'=>1,
            'title'=>'Roles',
            'url'=>'',
            'target'=>'_self',
            'icon_class'=>'voyager-lock',
            'color'=>'#000000',
            'parent_id'=>NULL,
            'order'=>11,
            'created_at'=>'2019-11-10 09:05:37',
            'updated_at'=>'2020-02-23 07:37:15',
            'route'=>'voyager.roles.index',
            'parameters'=>'null'
        ] );



        Menuitem::create( [
            'id'=>5,
            'menu_id'=>1,
            'title'=>'Tools',
            'url'=>'',
            'target'=>'_self',
            'icon_class'=>'voyager-tools',
            'color'=>'#000000',
            'parent_id'=>NULL,
            'order'=>14,
            'created_at'=>'2019-11-10 09:05:37',
            'updated_at'=>'2020-02-23 07:37:15',
            'route'=>NULL,
            'parameters'=>''
        ] );



        Menuitem::create( [
            'id'=>6,
            'menu_id'=>1,
            'title'=>'Menu Builder',
            'url'=>'',
            'target'=>'_self',
            'icon_class'=>'voyager-list',
            'color'=>'#000000',
            'parent_id'=>5,
            'order'=>1,
            'created_at'=>'2019-11-10 09:05:37',
            'updated_at'=>'2019-11-10 09:39:35',
            'route'=>'voyager.menus.index',
            'parameters'=>'null'
        ] );



        Menuitem::create( [
            'id'=>7,
            'menu_id'=>1,
            'title'=>'Database',
            'url'=>'',
            'target'=>'_self',
            'icon_class'=>'voyager-data',
            'color'=>'#000000',
            'parent_id'=>5,
            'order'=>2,
            'created_at'=>'2019-11-10 09:05:37',
            'updated_at'=>'2019-11-10 09:39:54',
            'route'=>'voyager.database.index',
            'parameters'=>'null'
        ] );



        Menuitem::create( [
            'id'=>8,
            'menu_id'=>1,
            'title'=>'Compass',
            'url'=>'',
            'target'=>'_self',
            'icon_class'=>'voyager-compass',
            'color'=>'#000000',
            'parent_id'=>5,
            'order'=>3,
            'created_at'=>'2019-11-10 09:05:37',
            'updated_at'=>'2019-11-10 09:40:33',
            'route'=>'voyager.compass.index',
            'parameters'=>'null'
        ] );



        Menuitem::create( [
            'id'=>9,
            'menu_id'=>1,
            'title'=>'BREAD',
            'url'=>'',
            'target'=>'_self',
            'icon_class'=>'voyager-bread',
            'color'=>'#000000',
            'parent_id'=>5,
            'order'=>4,
            'created_at'=>'2019-11-10 09:05:37',
            'updated_at'=>'2019-11-10 09:40:51',
            'route'=>'voyager.bread.index',
            'parameters'=>'null'
        ] );



        Menuitem::create( [
            'id'=>10,
            'menu_id'=>1,
            'title'=>'Settings',
            'url'=>'',
            'target'=>'_self',
            'icon_class'=>'voyager-settings',
            'color'=>'#000000',
            'parent_id'=>17,
            'order'=>3,
            'created_at'=>'2019-11-10 09:05:37',
            'updated_at'=>'2020-02-09 14:03:00',
            'route'=>'voyager.settings.index',
            'parameters'=>'null'
        ] );



        Menuitem::create( [
            'id'=>11,
            'menu_id'=>1,
            'title'=>'Categories',
            'url'=>'',
            'target'=>'_self',
            'icon_class'=>'voyager-categories',
            'color'=>'#000000',
            'parent_id'=>43,
            'order'=>2,
            'created_at'=>'2019-11-10 09:05:43',
            'updated_at'=>'2020-01-29 08:36:31',
            'route'=>'voyager.categories.index',
            'parameters'=>'null'
        ] );



        Menuitem::create( [
            'id'=>12,
            'menu_id'=>1,
            'title'=>'Posts',
            'url'=>'',
            'target'=>'_self',
            'icon_class'=>'voyager-news',
            'color'=>'#000000',
            'parent_id'=>43,
            'order'=>1,
            'created_at'=>'2019-11-10 09:05:44',
            'updated_at'=>'2020-01-29 08:36:31',
            'route'=>'voyager.posts.index',
            'parameters'=>'null'
        ] );



        Menuitem::create( [
            'id'=>13,
            'menu_id'=>1,
            'title'=>'Pages',
            'url'=>'',
            'target'=>'_self',
            'icon_class'=>'voyager-file-text',
            'color'=>'#000000',
            'parent_id'=>NULL,
            'order'=>13,
            'created_at'=>'2019-11-10 09:05:46',
            'updated_at'=>'2020-02-23 07:37:15',
            'route'=>'voyager.pages.index',
            'parameters'=>'null'
        ] );



        Menuitem::create( [
            'id'=>14,
            'menu_id'=>1,
            'title'=>'Hooks',
            'url'=>'',
            'target'=>'_self',
            'icon_class'=>'voyager-hook',
            'color'=>'#000000',
            'parent_id'=>5,
            'order'=>5,
            'created_at'=>'2019-11-10 09:05:48',
            'updated_at'=>'2019-11-10 09:41:04',
            'route'=>'voyager.hooks',
            'parameters'=>'null'
        ] );



        Menuitem::create( [
            'id'=>15,
            'menu_id'=>1,
            'title'=>'Admins',
            'url'=>'',
            'target'=>'_self',
            'icon_class'=>'voyager-person',
            'color'=>'#000000',
            'parent_id'=>16,
            'order'=>1,
            'created_at'=>'2019-11-11 05:35:32',
            'updated_at'=>'2019-11-11 06:34:30',
            'route'=>'voyager.admins.index',
            'parameters'=>'null'
        ] );



        Menuitem::create( [
            'id'=>16,
            'menu_id'=>1,
            'title'=>'All Users',
            'url'=>'',
            'target'=>'_self',
            'icon_class'=>'voyager-people',
            'color'=>'#000000',
            'parent_id'=>NULL,
            'order'=>10,
            'created_at'=>'2019-11-11 06:33:43',
            'updated_at'=>'2020-02-23 07:37:15',
            'route'=>NULL,
            'parameters'=>''
        ] );



        Menuitem::create( [
            'id'=>17,
            'menu_id'=>1,
            'title'=>'Site Settings',
            'url'=>'',
            'target'=>'_self',
            'icon_class'=>'voyager-settings',
            'color'=>'#000000',
            'parent_id'=>NULL,
            'order'=>9,
            'created_at'=>'2019-11-11 06:43:15',
            'updated_at'=>'2020-02-23 07:37:15',
            'route'=>NULL,
            'parameters'=>''
        ] );



        Menuitem::create( [
            'id'=>31,
            'menu_id'=>1,
            'title'=>'Sliders',
            'url'=>'',
            'target'=>'_self',
            'icon_class'=>'voyager-code',
            'color'=>NULL,
            'parent_id'=>17,
            'order'=>1,
            'created_at'=>'2020-01-26 11:49:00',
            'updated_at'=>'2020-01-29 09:11:45',
            'route'=>'voyager.sliders.index',
            'parameters'=>NULL
        ] );



        Menuitem::create( [
            'id'=>33,
            'menu_id'=>1,
            'title'=>'Clinics',
            'url'=>'',
            'target'=>'_self',
            'icon_class'=>'voyager-home',
            'color'=>'#000000',
            'parent_id'=>NULL,
            'order'=>2,
            'created_at'=>'2020-01-27 13:07:26',
            'updated_at'=>'2020-02-09 14:03:00',
            'route'=>'voyager.clinics.index',
            'parameters'=>'null'
        ] );


        Menuitem::create( [
            'id'=>67,
            'menu_id'=>1,
            'title'=>'Doctors',
            'url'=>'',
            'target'=>'_self',
            'icon_class'=>'voyager-group',
            'color'=>'#000000',
            'parent_id'=>NULL,
            'order'=>3,
            'created_at'=>'2020-01-27 13:07:26',
            'updated_at'=>'2020-02-09 14:03:00',
            'route'=>'',
            'parameters'=>'null'
        ] );


        Menuitem::create( [
            'id'=>34,
            'menu_id'=>1,
            'title'=>'Services',
            'url'=>'',
            'target'=>'_self',
            'icon_class'=>'voyager-puzzle',
            'color'=>'#000000',
            'parent_id'=>NULL,
            'order'=>4,
            'created_at'=>'2020-01-28 06:29:40',
            'updated_at'=>'2020-02-09 14:03:18',
            'route'=>'voyager.services.index',
            'parameters'=>'null'
        ] );



//        Menuitem::create( [
//            'id'=>35,
//            'menu_id'=>1,
//            'title'=>'Doctors',
//            'url'=>'',
//            'target'=>'_self',
//            'icon_class'=>'voyager-activity',
//            'color'=>'#000000',
//            'parent_id'=>67,
//            'order'=>1,
//            'created_at'=>'2020-01-28 09:52:58',
//            'updated_at'=>'2020-02-09 14:03:08',
//            'route'=>'voyager.doctors.index',
//            'parameters'=>'null'
//        ] );
//
//        Menuitem::create( [
//            'id'=>68,
//            'menu_id'=>1,
//            'title'=>'Working Hours',
//            'url'=>'',
//            'target'=>'_self',
//            'icon_class'=>'voyager-receipt',
//            'color'=>'#000000',
//            'parent_id'=>67,
//            'order'=>2,
//            'created_at'=>'2020-01-28 09:52:58',
//            'updated_at'=>'2020-02-09 14:03:08',
//            'route'=>'voyager.workinghours.index',
//            'parameters'=>'null'
//        ] );
//
//        Menuitem::create( [
//            'id'=>69,
//            'menu_id'=>1,
//            'title'=>'Appointments',
//            'url'=>'',
//            'target'=>'_self',
//            'icon_class'=>'voyager-alarm-clock',
//            'color'=>'#000000',
//            'parent_id'=>67,
//            'order'=>3,
//            'created_at'=>'2020-01-28 09:52:58',
//            'updated_at'=>'2020-02-09 14:03:08',
//            'route'=>'voyager.appointments.index',
//            'parameters'=>'null'
//        ] );
//
//        Menuitem::create( [
//            'id'=>70,
//            'menu_id'=>1,
//            'title'=>'Specialities',
//            'url'=>'',
//            'target'=>'_self',
//            'icon_class'=>'voyager-certificate',
//            'color'=>'#000000',
//            'parent_id'=>67,
//            'order'=>4,
//            'created_at'=>'2020-01-28 09:52:58',
//            'updated_at'=>'2020-02-09 14:03:08',
//            'route'=>'voyager.specialities.index',
//            'parameters'=>'null'
//        ] );



        Menuitem::create( [
            'id'=>36,
            'menu_id'=>2,
            'title'=>'الصفحة الرئيسية',
            'url'=>'الصفحة-الرئيسية',
            'target'=>'_self',
            'icon_class'=>NULL,
            'color'=>'#000000',
            'parent_id'=>NULL,
            'order'=>1,
            'created_at'=>'2020-01-28 11:23:39',
            'updated_at'=>'2020-02-03 10:27:15',
            'route'=>NULL,
            'parameters'=>''
        ] );



        Menuitem::create( [
            'id'=>37,
            'menu_id'=>2,
            'title'=>'خدماتنا',
            'url'=>'/services',
            'target'=>'_self',
            'icon_class'=>NULL,
            'color'=>'#000000',
            'parent_id'=>NULL,
            'order'=>2,
            'created_at'=>'2020-01-28 11:28:49',
            'updated_at'=>'2020-02-03 10:19:31',
            'route'=>NULL,
            'parameters'=>''
        ] );



        Menuitem::create( [
            'id'=>38,
            'menu_id'=>2,
            'title'=>'اطبائنا',
            'url'=>'/اطبائنا',
            'target'=>'_self',
            'icon_class'=>NULL,
            'color'=>'#000000',
            'parent_id'=>NULL,
            'order'=>3,
            'created_at'=>'2020-01-28 11:30:44',
            'updated_at'=>'2020-02-03 10:19:31',
            'route'=>NULL,
            'parameters'=>''
        ] );



        Menuitem::create( [
            'id'=>39,
            'menu_id'=>2,
            'title'=>'تواصل معنا',
            'url'=>'/',
            'target'=>'_self',
            'icon_class'=>NULL,
            'color'=>'#000000',
            'parent_id'=>NULL,
            'order'=>5,
            'created_at'=>'2020-01-28 11:31:22',
            'updated_at'=>'2020-02-03 10:19:31',
            'route'=>NULL,
            'parameters'=>''
        ] );



        Menuitem::create( [
            'id'=>40,
            'menu_id'=>2,
            'title'=>'من نحن',
            'url'=>'من-نحن',
            'target'=>'_self',
            'icon_class'=>NULL,
            'color'=>'#000000',
            'parent_id'=>NULL,
            'order'=>7,
            'created_at'=>'2020-01-28 11:31:54',
            'updated_at'=>'2020-02-03 15:19:33',
            'route'=>NULL,
            'parameters'=>''
        ] );



        Menuitem::create( [
            'id'=>41,
            'menu_id'=>2,
            'title'=>'عيادتنا',
            'url'=>'/عيادتنا',
            'target'=>'_self',
            'icon_class'=>NULL,
            'color'=>'#000000',
            'parent_id'=>NULL,
            'order'=>4,
            'created_at'=>'2020-01-28 11:33:04',
            'updated_at'=>'2020-02-03 10:19:31',
            'route'=>NULL,
            'parameters'=>''
        ] );



        Menuitem::create( [
            'id'=>42,
            'menu_id'=>1,
            'title'=>'Tags',
            'url'=>'',
            'target'=>'_self',
            'icon_class'=>'voyager-tag',
            'color'=>'#000000',
            'parent_id'=>43,
            'order'=>3,
            'created_at'=>'2020-01-29 05:58:30',
            'updated_at'=>'2020-01-29 08:36:31',
            'route'=>'voyager.tags.index',
            'parameters'=>'null'
        ] );



        Menuitem::create( [
            'id'=>43,
            'menu_id'=>1,
            'title'=>'Posts',
            'url'=>'',
            'target'=>'_self',
            'icon_class'=>'voyager-file-text',
            'color'=>'#000000',
            'parent_id'=>NULL,
            'order'=>8,
            'created_at'=>'2020-01-29 08:35:05',
            'updated_at'=>'2020-02-23 07:38:24',
            'route'=>NULL,
            'parameters'=>''
        ] );



        Menuitem::create( [
            'id'=>46,
            'menu_id'=>1,
            'title'=>'Yaost',
            'url'=>'',
            'target'=>'_self',
            'icon_class'=>'voyager-megaphone',
            'color'=>'#000000',
            'parent_id'=>NULL,
            'order'=>7,
            'created_at'=>'2020-01-30 09:29:54',
            'updated_at'=>'2020-02-23 08:49:45',
            'route'=>'voyager.sitesettings.index',
            'parameters'=>'null'
        ] );



        Menuitem::create( [
            'id'=>47,
            'menu_id'=>1,
            'title'=>'Events',
            'url'=>'',
            'target'=>'_self',
            'icon_class'=>'voyager-group',
            'color'=>'#000000',
            'parent_id'=>NULL,
            'order'=>6,
            'created_at'=>'2020-02-02 07:38:18',
            'updated_at'=>'2020-02-23 07:38:22',
            'route'=>'voyager.events.index',
            'parameters'=>'null'
        ] );



        Menuitem::create( [
            'id'=>49,
            'menu_id'=>2,
            'title'=>'المجموعات',
            'url'=>'/المجموعات',
            'target'=>'_self',
            'icon_class'=>NULL,
            'color'=>'#000000',
            'parent_id'=>NULL,
            'order'=>6,
            'created_at'=>'2020-02-02 15:34:43',
            'updated_at'=>'2020-02-03 15:19:33',
            'route'=>NULL,
            'parameters'=>''
        ] );



        Menuitem::create( [
            'id'=>50,
            'menu_id'=>2,
            'title'=>'دكاتره',
            'url'=>'\\دكاتره',
            'target'=>'_self',
            'icon_class'=>NULL,
            'color'=>'#000000',
            'parent_id'=>NULL,
            'order'=>9,
            'created_at'=>'2020-02-02 16:05:57',
            'updated_at'=>'2020-02-03 15:19:31',
            'route'=>NULL,
            'parameters'=>''
        ] );



        Menuitem::create( [
            'id'=>52,
            'menu_id'=>2,
            'title'=>'عن الويبسايت',
            'url'=>'https://www.andalusiahjh.com/ar',
            'target'=>'_self',
            'icon_class'=>NULL,
            'color'=>'#000000',
            'parent_id'=>NULL,
            'order'=>10,
            'created_at'=>'2020-02-03 07:03:04',
            'updated_at'=>'2020-02-03 15:19:30',
            'route'=>NULL,
            'parameters'=>''
        ] );



        Menuitem::create( [
            'id'=>54,
            'menu_id'=>2,
            'title'=>'تمام',
            'url'=>'/تم__ام',
            'target'=>'_self',
            'icon_class'=>NULL,
            'color'=>'#000000',
            'parent_id'=>NULL,
            'order'=>8,
            'created_at'=>'2020-02-03 10:19:21',
            'updated_at'=>'2020-02-03 15:19:31',
            'route'=>NULL,
            'parameters'=>''
        ] );



        Menuitem::create( [
            'id'=>58,
            'menu_id'=>1,
            'title'=>'Clinic Requests',
            'url'=>'',
            'target'=>'_self',
            'icon_class'=>'voyager-bell',
            'color'=>'#000000',
            'parent_id'=>59,
            'order'=>1,
            'created_at'=>'2020-02-09 08:45:13',
            'updated_at'=>'2020-02-09 14:03:00',
            'route'=>'voyager.clinic-requests.index',
            'parameters'=>'null'
        ] );



        Menuitem::create( [
            'id'=>61,
            'menu_id'=>1,
            'title'=>'Doctors Requests',
            'url'=>'',
            'target'=>'_self',
            'icon_class'=>'voyager-bell',
            'color'=>'#000000',
            'parent_id'=>60,
            'order'=>1,
            'created_at'=>'2020-02-09 08:52:35',
            'updated_at'=>'2020-02-09 14:03:08',
            'route'=>'voyager.clinic-requests.index',
            'parameters'=>NULL
        ] );



        Menuitem::create( [
            'id'=>63,
            'menu_id'=>1,
            'title'=>'Services Requests',
            'url'=>'voyager.clinic-requests.index',
            'target'=>'_self',
            'icon_class'=>'voyager-bell',
            'color'=>'#000000',
            'parent_id'=>62,
            'order'=>1,
            'created_at'=>'2020-02-09 08:56:52',
            'updated_at'=>'2020-02-09 14:03:18',
            'route'=>NULL,
            'parameters'=>''
        ] );



        Menuitem::create( [
            'id'=>64,
            'menu_id'=>1,
            'title'=>'Clinic requests',
            'url'=>'',
            'target'=>'_self',
            'icon_class'=>'voyager-bell',
            'color'=>'#000000',
            'parent_id'=>NULL,
            'order'=>5,
            'created_at'=>'2020-02-09 09:08:49',
            'updated_at'=>'2020-02-09 14:04:07',
            'route'=>'voyager.clinic-requests.index',
            'parameters'=>'null'
        ] );



        Menuitem::create( [
            'id'=>66,
            'menu_id'=>1,
            'title'=>'Andalusia Groups',
            'url'=>'',
            'target'=>'_self',
            'icon_class'=>'voyager-documentation',
            'color'=>'#000000',
            'parent_id'=>17,
            'order'=>2,
            'created_at'=>'2020-02-09 12:51:57',
            'updated_at'=>'2020-02-09 12:53:59',
            'route'=>'voyager.andalusia-groups.index',
            'parameters'=>'null'
        ] );


    }
}

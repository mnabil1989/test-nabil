<?php

use Illuminate\Database\Seeder;
use App\Appointment;
use App\Admins as Admin;
use App\Category;
use App\Clinic;
use App\Doctor;
use App\Migration;
use App\Page;
use App\Post;
use App\Service;
use App\Setting;
use App\Speciality;
use App\Tag;
use App\Slider;
use App\User;
use App\Workinghour;
use TCG\Voyager\Models\Translation;
use App\SiteSetting as Seosetting;
use App\PostTag as Posttag;
use App\DataRaw as Datarow;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;
use TCG\Voyager\Models\Permission;

class Seed742020TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    //seeds for all tables
    public function run()
    {
//        _________________________Start________Seed admins Table___________________________________________________________________________
        Admin::create([
            'id' => 1,
            'role_id' => 1,
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'avatar' => '/admins/December2019/gXs9H7sAYpOqDxw8fzRE.png',
            'email_verified_at' => NULL,
            'password' => '$2y$10$mF4BmxcF3n56bHtmy.G6UuQvp5jUBlOaHCgyMO7ts0kpiQtQsRG5W',
            'remember_token' => '3gYQGNpwhSLctQTXzQOvayNk0rzHMeI2PIAaJKxQa9TvDes5U9NKfHn88ZLi',
            'settings' => '{"locale":"en"}',
            'created_at' => '2020-04-01 06:26:54',
            'updated_at' => '2020-04-06 13:10:08'
        ]);
//        _________________________End________Seed admins Table___________________________________________________________________________


//        _________________________Start________Seed categories Table___________________________________________________________________________
        Category::create([
            'id' => 1,
            'parent_id' => NULL,
            'order' => 1,
            'name' => 'Category 1',
            'slug' => 'category-1',
            'created_at' => '2020-04-01 06:26:54',
            'updated_at' => '2020-04-01 06:26:54'
        ]);
        Category::create([
            'id' => 2,
            'parent_id' => NULL,
            'order' => 1,
            'name' => 'Category 2',
            'slug' => 'category-2',
            'created_at' => '2020-04-01 06:26:54',
            'updated_at' => '2020-04-01 06:26:54'
        ]);
//        _________________________End________Seed categories Table___________________________________________________________________________
        //        _________________________Start________Seed data_types  Table___________________________________________________________________________

        Datatype::create([
            'id' => 1,
            'name' => 'users',
            'slug' => 'users',
            'display_name_singular' => 'User',
            'display_name_plural' => 'Users',
            'icon' => 'voyager-person',
            'model_name' => 'App\\User',
            'policy_name' => 'TCG\\Voyager\\Policies\\UserPolicy',
            'controller' => 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController',
            'description' => NULL,
            'generate_permissions' => 1,
            'server_side' => 0,
            'details' => '\"{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}\"',
            'created_at' => '2019-11-10 09:05:36',
            'updated_at' => '2020-02-04 07:27:43'
        ]);


        Datatype::create([
            'id' => 2,
            'name' => 'menus',
            'slug' => 'menus',
            'display_name_singular' => 'Menu',
            'display_name_plural' => 'Menus',
            'icon' => 'voyager-list',
            'model_name' => 'TCG\\Voyager\\Models\\Menu',
            'policy_name' => NULL,
            'controller' => '',
            'description' => '',
            'generate_permissions' => 1,
            'server_side' => 0,
            'details' => 'null',
            'created_at' => '2019-11-10 09:05:36',
            'updated_at' => '2019-11-10 09:05:36'
        ]);


        Datatype::create([
            'id' => 3,
            'name' => 'roles',
            'slug' => 'roles',
            'display_name_singular' => 'Role',
            'display_name_plural' => 'Roles',
            'icon' => 'voyager-lock',
            'model_name' => 'TCG\\Voyager\\Models\\Role',
            'policy_name' => NULL,
            'controller' => '',
            'description' => '',
            'generate_permissions' => 1,
            'server_side' => 0,
            'details' => 'null',
            'created_at' => '2019-11-10 09:05:36',
            'updated_at' => '2019-11-10 09:05:36'
        ]);


        Datatype::create([
            'id' => 4,
            'name' => 'categories',
            'slug' => 'categories',
            'display_name_singular' => 'Category',
            'display_name_plural' => 'Categories',
            'icon' => 'voyager-categories',
            'model_name' => 'TCG\\Voyager\\Models\\Category',
            'policy_name' => NULL,
            'controller' => '',
            'description' => '',
            'generate_permissions' => 1,
            'server_side' => 0,
            'details' => 'null',
            'created_at' => '2019-11-10 09:05:43',
            'updated_at' => '2019-11-10 09:05:43'
        ]);


        Datatype::create([
            'id' => 5,
            'name' => 'posts',
            'slug' => 'posts',
            'display_name_singular' => 'Post',
            'display_name_plural' => 'Posts',
            'icon' => 'voyager-news',
            'model_name' => 'TCG\\Voyager\\Models\\Post',
            'policy_name' => 'TCG\\Voyager\\Policies\\PostPolicy',
            'controller' => NULL,
            'description' => NULL,
            'generate_permissions' => 1,
            'server_side' => 0,
            'details' => '\"{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}\"',
            'created_at' => '2019-11-10 09:05:44',
            'updated_at' => '2020-02-05 13:52:38'
        ]);


        Datatype::create([
            'id' => 6,
            'name' => 'pages',
            'slug' => 'pages',
            'display_name_singular' => 'Page',
            'display_name_plural' => 'Pages',
            'icon' => 'voyager-file-text',
            'model_name' => 'TCG\\Voyager\\Models\\Page',
            'policy_name' => NULL,
            'controller' => '',
            'description' => '',
            'generate_permissions' => 1,
            'server_side' => 0,
            'details' => 'null',
            'created_at' => '2019-11-10 09:05:45',
            'updated_at' => '2019-11-10 09:05:45'
        ]);


        Datatype::create([
            'id' => 9,
            'name' => 'admins',
            'slug' => 'admins',
            'display_name_singular' => 'Admin',
            'display_name_plural' => 'Admins',
            'icon' => 'voyager-person',
            'model_name' => 'App\\Admin',
            'policy_name' => 'TCG\\Voyager\\Policies\\UserPolicy',
            'controller' => 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController',
            'description' => NULL,
            'generate_permissions' => 1,
            'server_side' => 0,
            'details' => '\"{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}\"',
            'created_at' => '2019-11-11 05:35:32',
            'updated_at' => '2019-11-11 06:36:14'
        ]);


        Datatype::create([
            'id' => 16,
            'name' => 'sliders',
            'slug' => 'sliders',
            'display_name_singular' => 'Slider',
            'display_name_plural' => 'Sliders',
            'icon' => 'voyager-code',
            'model_name' => 'App\\Slider',
            'policy_name' => NULL,
            'controller' => 'App\\Http\\Controllers\\SliderController',
            'description' => NULL,
            'generate_permissions' => 1,
            'server_side' => 0,
            'details' => '\"{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}\"',
            'created_at' => '2020-01-26 11:49:00',
            'updated_at' => '2020-01-27 08:57:08'
        ]);


        Datatype::create([
            'id' => 18,
            'name' => 'clinics',
            'slug' => 'clinics',
            'display_name_singular' => 'Clinic',
            'display_name_plural' => 'Clinics',
            'icon' => NULL,
            'model_name' => 'App\\Clinic',
            'policy_name' => NULL,
            'controller' => NULL,
            'description' => NULL,
            'generate_permissions' => 1,
            'server_side' => 0,
            'details' => '\"{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}\"',
            'created_at' => '2020-01-27 13:07:26',
            'updated_at' => '2020-02-26 13:48:15'
        ]);


        Datatype::create([
            'id' => 19,
            'name' => 'services',
            'slug' => 'services',
            'display_name_singular' => 'Service',
            'display_name_plural' => 'Services',
            'icon' => NULL,
            'model_name' => 'App\\Service',
            'policy_name' => NULL,
            'controller' => NULL,
            'description' => NULL,
            'generate_permissions' => 1,
            'server_side' => 0,
            'details' => '\"{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}\"',
            'created_at' => '2020-01-28 06:29:40',
            'updated_at' => '2020-02-26 14:00:03'
        ]);


        Datatype::create([
            'id' => 21,
            'name' => 'tags',
            'slug' => 'tags',
            'display_name_singular' => 'Tag',
            'display_name_plural' => 'Tags',
            'icon' => NULL,
            'model_name' => 'App\\Tag',
            'policy_name' => NULL,
            'controller' => NULL,
            'description' => NULL,
            'generate_permissions' => 1,
            'server_side' => 0,
            'details' => '\"{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}\"',
            'created_at' => '2020-01-29 05:58:30',
            'updated_at' => '2020-02-26 14:00:40'
        ]);


        Datatype::create([
            'id' => 22,
            'name' => 'events',
            'slug' => 'events',
            'display_name_singular' => 'Event',
            'display_name_plural' => 'Events',
            'icon' => NULL,
            'model_name' => 'App\\Event',
            'policy_name' => NULL,
            'controller' => 'App\\Http\\Controllers\\EventController',
            'description' => NULL,
            'generate_permissions' => 1,
            'server_side' => 0,
            'details' => '\"{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}\"',
            'created_at' => '2020-02-02 07:38:18',
            'updated_at' => '2020-02-26 13:39:36'
        ]);


        Datatype::create([
            'id' => 26,
            'name' => 'clinic_requests',
            'slug' => 'clinic-requests',
            'display_name_singular' => 'Clinic Request',
            'display_name_plural' => 'Clinic Requests',
            'icon' => NULL,
            'model_name' => 'App\\ClinicRequest',
            'policy_name' => NULL,
            'controller' => NULL,
            'description' => NULL,
            'generate_permissions' => 1,
            'server_side' => 0,
            'details' => '\"{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}\"',
            'created_at' => '2020-02-09 08:45:13',
            'updated_at' => '2020-02-09 14:16:55'
        ]);


        Datatype::create([
            'id' => 28,
            'name' => 'andalusia_groups',
            'slug' => 'andalusia-groups',
            'display_name_singular' => 'Andalusia Group',
            'display_name_plural' => 'Andalusia Groups',
            'icon' => NULL,
            'model_name' => 'App\\AndalusiaGroup',
            'policy_name' => NULL,
            'controller' => NULL,
            'description' => NULL,
            'generate_permissions' => 1,
            'server_side' => 0,
            'details' => '\"{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}\"',
            'created_at' => '2020-02-09 12:51:57',
            'updated_at' => '2020-03-01 15:22:52'
        ]);


        Datatype::create([
            'id' => 29,
            'name' => 'doctors',
            'slug' => 'doctors',
            'display_name_singular' => 'Doctor',
            'display_name_plural' => 'Doctors',
            'icon' => 'voyager-activity',
            'model_name' => 'App\\Doctor',
            'policy_name' => NULL,
            'controller' => NULL,
            'description' => NULL,
            'generate_permissions' => 1,
            'server_side' => 0,
            'details' => '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}',
            'created_at' => '2020-04-01 06:26:54',
            'updated_at' => '2020-04-04 00:39:14'
        ]);


        Datatype::create([
            'id' => 30,
            'name' => 'workinghours',
            'slug' => 'workinghours',
            'display_name_singular' => 'Working Hour',
            'display_name_plural' => 'Working Hours',
            'icon' => 'voyager-receipt',
            'model_name' => 'App\\Workinghour',
            'policy_name' => NULL,
            'controller' => '',
            'description' => '',
            'generate_permissions' => 1,
            'server_side' => 0,
            'details' => NULL,
            'created_at' => '2020-04-01 06:26:54',
            'updated_at' => '2020-04-01 06:26:54'
        ]);


        Datatype::create([
            'id' => 31,
            'name' => 'appointments',
            'slug' => 'appointments',
            'display_name_singular' => 'Appointment',
            'display_name_plural' => 'Appointments',
            'icon' => 'voyager-alarm-clock',
            'model_name' => 'App\\Appointment',
            'policy_name' => NULL,
            'controller' => '\\App\\Http\\Controllers\\AppointmentController',
            'description' => NULL,
            'generate_permissions' => 1,
            'server_side' => 0,
            'details' => '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}',
            'created_at' => '2020-04-01 06:26:55',
            'updated_at' => '2020-04-04 19:22:06'
        ]);


        Datatype::create([
            'id' => 32,
            'name' => 'specialities',
            'slug' => 'specialities',
            'display_name_singular' => 'Speciality',
            'display_name_plural' => 'Specialities',
            'icon' => 'voyager-certificate',
            'model_name' => 'App\\Speciality',
            'policy_name' => NULL,
            'controller' => '',
            'description' => '',
            'generate_permissions' => 1,
            'server_side' => 0,
            'details' => NULL,
            'created_at' => '2020-04-01 06:26:55',
            'updated_at' => '2020-04-01 06:26:55'
        ]);
//        _________________________End________Seed  data_types Table___________________________________________________________________________
        //        _________________________Start________Seed data_rows Table___________________________________________________________________________
        Datarow::create([
            'id' => 1,
            'data_type_id' => 1,
            'field' => 'id',
            'type' => 'number',
            'display_name' => 'ID',
            'required' => 1,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => '{}',
            'order' => 1
        ]);


        Datarow::create([
            'id' => 2,
            'data_type_id' => 1,
            'field' => 'name',
            'type' => 'text',
            'display_name' => 'First Name',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => '{}',
            'order' => 2
        ]);


        Datarow::create([
            'id' => 3,
            'data_type_id' => 1,
            'field' => 'email',
            'type' => 'text',
            'display_name' => 'Email',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => '{"validation":{"rule":["email","regex:/^[a-zA-Z0-9_.+-]+@(?:(?:[a-zA-Z0-9-]+\\\.)?[a-zA-Z]+\\\.)?(Andalusiagroup|andalusiagroup)\\\.net$/"]},"default":"@andalusiagroup.net"}',
            'order' => 4
        ]);


        Datarow::create([
            'id' => 4,
            'data_type_id' => 1,
            'field' => 'password',
            'type' => 'password',
            'display_name' => 'Password',
            'required' => 1,
            'browse' => 0,
            'read' => 0,
            'edit' => 1,
            'add' => 1,
            'delete' => 0,
            'details' => '{}',
            'order' => 5
        ]);


        Datarow::create([
            'id' => 5,
            'data_type_id' => 1,
            'field' => 'remember_token',
            'type' => 'text',
            'display_name' => 'Remember Token',
            'required' => 0,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => '{}',
            'order' => 6
        ]);


        Datarow::create([
            'id' => 6,
            'data_type_id' => 1,
            'field' => 'created_at',
            'type' => 'timestamp',
            'display_name' => 'Created At',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => '{}',
            'order' => 7
        ]);


        Datarow::create([
            'id' => 7,
            'data_type_id' => 1,
            'field' => 'updated_at',
            'type' => 'timestamp',
            'display_name' => 'Updated At',
            'required' => 0,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => '{}',
            'order' => 9
        ]);


        Datarow::create([
            'id' => 8,
            'data_type_id' => 1,
            'field' => 'avatar',
            'type' => 'image',
            'display_name' => 'Avatar',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => '{}',
            'order' => 10
        ]);


        Datarow::create([
            'id' => 11,
            'data_type_id' => 1,
            'field' => 'settings',
            'type' => 'hidden',
            'display_name' => 'Settings',
            'required' => 0,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => '{}',
            'order' => 12
        ]);


        Datarow::create([
            'id' => 12,
            'data_type_id' => 2,
            'field' => 'id',
            'type' => 'number',
            'display_name' => 'ID',
            'required' => 1,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => NULL,
            'order' => 1
        ]);


        Datarow::create([
            'id' => 13,
            'data_type_id' => 2,
            'field' => 'name',
            'type' => 'text',
            'display_name' => 'Name',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => NULL,
            'order' => 2
        ]);


        Datarow::create([
            'id' => 14,
            'data_type_id' => 2,
            'field' => 'created_at',
            'type' => 'timestamp',
            'display_name' => 'Created At',
            'required' => 0,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => NULL,
            'order' => 3
        ]);


        Datarow::create([
            'id' => 15,
            'data_type_id' => 2,
            'field' => 'updated_at',
            'type' => 'timestamp',
            'display_name' => 'Updated At',
            'required' => 0,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => NULL,
            'order' => 4
        ]);


        Datarow::create([
            'id' => 16,
            'data_type_id' => 3,
            'field' => 'id',
            'type' => 'number',
            'display_name' => 'ID',
            'required' => 1,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => NULL,
            'order' => 1
        ]);


        Datarow::create([
            'id' => 17,
            'data_type_id' => 3,
            'field' => 'name',
            'type' => 'text',
            'display_name' => 'Name',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => NULL,
            'order' => 2
        ]);


        Datarow::create([
            'id' => 18,
            'data_type_id' => 3,
            'field' => 'created_at',
            'type' => 'timestamp',
            'display_name' => 'Created At',
            'required' => 0,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => NULL,
            'order' => 3
        ]);


        Datarow::create([
            'id' => 19,
            'data_type_id' => 3,
            'field' => 'updated_at',
            'type' => 'timestamp',
            'display_name' => 'Updated At',
            'required' => 0,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => NULL,
            'order' => 4
        ]);


        Datarow::create([
            'id' => 20,
            'data_type_id' => 3,
            'field' => 'display_name',
            'type' => 'text',
            'display_name' => 'Display Name',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => NULL,
            'order' => 5
        ]);


        Datarow::create([
            'id' => 21,
            'data_type_id' => 1,
            'field' => 'role_id',
            'type' => 'text',
            'display_name' => 'Role',
            'required' => 0,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => '{}',
            'order' => 11
        ]);


        Datarow::create([
            'id' => 22,
            'data_type_id' => 4,
            'field' => 'id',
            'type' => 'number',
            'display_name' => 'ID',
            'required' => 1,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => NULL,
            'order' => 1
        ]);


        Datarow::create([
            'id' => 23,
            'data_type_id' => 4,
            'field' => 'parent_id',
            'type' => 'select_dropdown',
            'display_name' => 'Parent',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"default\":\"\",\"null\":\"\",\"options\":{\"\":\"-- None --\"},\"relationship\":{\"key\":\"id\",\"label\":\"name\"}}",
            'order' => 2
        ]);


        Datarow::create([
            'id' => 24,
            'data_type_id' => 4,
            'field' => 'order',
            'type' => 'text',
            'display_name' => 'Order',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"default\":1}",
            'order' => 3
        ]);


        Datarow::create([
            'id' => 25,
            'data_type_id' => 4,
            'field' => 'name',
            'type' => 'text',
            'display_name' => 'Name',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => NULL,
            'order' => 4
        ]);


        Datarow::create([
            'id' => 26,
            'data_type_id' => 4,
            'field' => 'slug',
            'type' => 'text',
            'display_name' => 'Slug',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"slugify\":{\"origin\":\"name\"}}",
            'order' => 5
        ]);


        Datarow::create([
            'id' => 27,
            'data_type_id' => 4,
            'field' => 'created_at',
            'type' => 'timestamp',
            'display_name' => 'Created At',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => NULL,
            'order' => 6
        ]);


        Datarow::create([
            'id' => 28,
            'data_type_id' => 4,
            'field' => 'updated_at',
            'type' => 'timestamp',
            'display_name' => 'Updated At',
            'required' => 0,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => NULL,
            'order' => 7
        ]);


        Datarow::create([
            'id' => 29,
            'data_type_id' => 5,
            'field' => 'id',
            'type' => 'number',
            'display_name' => 'ID',
            'required' => 1,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => '{}',
            'order' => 1
        ]);


        Datarow::create([
            'id' => 30,
            'data_type_id' => 5,
            'field' => 'author_id',
            'type' => 'text',
            'display_name' => 'Author',
            'required' => 1,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 0,
            'delete' => 1,
            'details' => '{}',
            'order' => 2
        ]);


        Datarow::create([
            'id' => 31,
            'data_type_id' => 5,
            'field' => 'category_id',
            'type' => 'text',
            'display_name' => 'Category',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 0,
            'details' => '{}',
            'order' => 3
        ]);


        Datarow::create([
            'id' => 32,
            'data_type_id' => 5,
            'field' => 'title',
            'type' => 'text',
            'display_name' => 'Title',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => '{}',
            'order' => 4
        ]);


        Datarow::create([
            'id' => 33,
            'data_type_id' => 5,
            'field' => 'excerpt',
            'type' => 'text_area',
            'display_name' => 'Excerpt',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => '{}',
            'order' => 5
        ]);


        Datarow::create([
            'id' => 34,
            'data_type_id' => 5,
            'field' => 'body',
            'type' => 'rich_text_box',
            'display_name' => 'Body',
            'required' => 1,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => '{}',
            'order' => 6
        ]);


        Datarow::create([
            'id' => 35,
            'data_type_id' => 5,
            'field' => 'image',
            'type' => 'image',
            'display_name' => 'Post Image',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"resize\":{\"width\":\"1000\",\"height\":\"null\"},\"quality\":\"70%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"medium\",\"scale\":\"50%\"},{\"name\":\"small\",\"scale\":\"25%\"},{\"name\":\"cropped\",\"crop\":{\"width\":\"300\",\"height\":\"250\"}}]}",
            'order' => 7
        ]);


        Datarow::create([
            'id' => 36,
            'data_type_id' => 5,
            'field' => 'slug',
            'type' => 'text',
            'display_name' => 'Slug',
            'required' => 1,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"slugify\":{\"origin\":\"title\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:posts,slug\"}}",
            'order' => 8
        ]);


        Datarow::create([
            'id' => 37,
            'data_type_id' => 5,
            'field' => 'meta_description',
            'type' => 'text_area',
            'display_name' => 'Meta Description',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => '{}',
            'order' => 9
        ]);


        Datarow::create([
            'id' => 38,
            'data_type_id' => 5,
            'field' => 'meta_keywords',
            'type' => 'text_area',
            'display_name' => 'Meta Keywords',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => '{}',
            'order' => 10
        ]);


        Datarow::create([
            'id' => 39,
            'data_type_id' => 5,
            'field' => 'status',
            'type' => 'select_dropdown',
            'display_name' => 'Status',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"default\":\"DRAFT\",\"options\":{\"PUBLISHED\":\"published\",\"DRAFT\":\"draft\",\"PENDING\":\"pending\"}}",
            'order' => 11
        ]);


        Datarow::create([
            'id' => 40,
            'data_type_id' => 5,
            'field' => 'created_at',
            'type' => 'timestamp',
            'display_name' => 'Created At',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => '{}',
            'order' => 12
        ]);


        Datarow::create([
            'id' => 41,
            'data_type_id' => 5,
            'field' => 'updated_at',
            'type' => 'timestamp',
            'display_name' => 'Updated At',
            'required' => 0,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => '{}',
            'order' => 13
        ]);


        Datarow::create([
            'id' => 42,
            'data_type_id' => 5,
            'field' => 'seo_title',
            'type' => 'text',
            'display_name' => 'SEO Title',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => '{}',
            'order' => 14
        ]);


        Datarow::create([
            'id' => 43,
            'data_type_id' => 5,
            'field' => 'featured',
            'type' => 'checkbox',
            'display_name' => 'Featured',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => '{}',
            'order' => 15
        ]);


        Datarow::create([
            'id' => 44,
            'data_type_id' => 6,
            'field' => 'id',
            'type' => 'number',
            'display_name' => 'ID',
            'required' => 1,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => NULL,
            'order' => 1
        ]);


        Datarow::create([
            'id' => 45,
            'data_type_id' => 6,
            'field' => 'author_id',
            'type' => 'text',
            'display_name' => 'Author',
            'required' => 1,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => NULL,
            'order' => 2
        ]);


        Datarow::create([
            'id' => 46,
            'data_type_id' => 6,
            'field' => 'title',
            'type' => 'text',
            'display_name' => 'Title',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => NULL,
            'order' => 3
        ]);


        Datarow::create([
            'id' => 47,
            'data_type_id' => 6,
            'field' => 'excerpt',
            'type' => 'text_area',
            'display_name' => 'Excerpt',
            'required' => 1,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => NULL,
            'order' => 4
        ]);


        Datarow::create([
            'id' => 48,
            'data_type_id' => 6,
            'field' => 'body',
            'type' => 'rich_text_box',
            'display_name' => 'Body',
            'required' => 1,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => NULL,
            'order' => 5
        ]);


        Datarow::create([
            'id' => 49,
            'data_type_id' => 6,
            'field' => 'slug',
            'type' => 'text',
            'display_name' => 'Slug',
            'required' => 1,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"slugify\":{\"origin\":\"title\"},\"validation\":{\"rule\":\"unique:pages,slug\"}}",
            'order' => 6
        ]);


        Datarow::create([
            'id' => 50,
            'data_type_id' => 6,
            'field' => 'meta_description',
            'type' => 'text',
            'display_name' => 'Meta Description',
            'required' => 1,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => NULL,
            'order' => 7
        ]);


        Datarow::create([
            'id' => 51,
            'data_type_id' => 6,
            'field' => 'meta_keywords',
            'type' => 'text',
            'display_name' => 'Meta Keywords',
            'required' => 1,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => NULL,
            'order' => 8
        ]);


        Datarow::create([
            'id' => 52,
            'data_type_id' => 6,
            'field' => 'status',
            'type' => 'select_dropdown',
            'display_name' => 'Status',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"default\":\"INACTIVE\",\"options\":{\"INACTIVE\":\"INACTIVE\",\"ACTIVE\":\"ACTIVE\"}}",
            'order' => 9
        ]);


        Datarow::create([
            'id' => 53,
            'data_type_id' => 6,
            'field' => 'created_at',
            'type' => 'timestamp',
            'display_name' => 'Created At',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => NULL,
            'order' => 10
        ]);


        Datarow::create([
            'id' => 54,
            'data_type_id' => 6,
            'field' => 'updated_at',
            'type' => 'timestamp',
            'display_name' => 'Updated At',
            'required' => 1,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => NULL,
            'order' => 11
        ]);


        Datarow::create([
            'id' => 55,
            'data_type_id' => 6,
            'field' => 'image',
            'type' => 'image',
            'display_name' => 'Page Image',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => NULL,
            'order' => 12
        ]);


        Datarow::create([
            'id' => 56,
            'data_type_id' => 1,
            'field' => 'email_verified_at',
            'type' => 'timestamp',
            'display_name' => '',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => '{}',
            'order' => 8
        ]);


        Datarow::create([
            'id' => 57,
            'data_type_id' => 9,
            'field' => 'id',
            'type' => 'number',
            'display_name' => 'Id',
            'required' => 1,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => '{}',
            'order' => 1
        ]);


        Datarow::create([
            'id' => 58,
            'data_type_id' => 9,
            'field' => 'role_id',
            'type' => 'text',
            'display_name' => 'Role Id',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => '{}',
            'order' => 10
        ]);


        Datarow::create([
            'id' => 59,
            'data_type_id' => 9,
            'field' => 'name',
            'type' => 'text',
            'display_name' => 'Name',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => '{}',
            'order' => 2
        ]);


        Datarow::create([
            'id' => 60,
            'data_type_id' => 9,
            'field' => 'email',
            'type' => 'text',
            'display_name' => 'Email',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => '{}',
            'order' => 3
        ]);


        Datarow::create([
            'id' => 61,
            'data_type_id' => 9,
            'field' => 'avatar',
            'type' => 'image',
            'display_name' => 'Avatar',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => '{}',
            'order' => 9
        ]);


        Datarow::create([
            'id' => 62,
            'data_type_id' => 9,
            'field' => 'email_verified_at',
            'type' => 'timestamp',
            'display_name' => 'Email Verified At',
            'required' => 0,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => '{}',
            'order' => 7
        ]);


        Datarow::create([
            'id' => 63,
            'data_type_id' => 9,
            'field' => 'password',
            'type' => 'password',
            'display_name' => 'Password',
            'required' => 1,
            'browse' => 0,
            'read' => 0,
            'edit' => 1,
            'add' => 1,
            'delete' => 0,
            'details' => '{}',
            'order' => 4
        ]);


        Datarow::create([
            'id' => 64,
            'data_type_id' => 9,
            'field' => 'remember_token',
            'type' => 'text',
            'display_name' => 'Remember Token',
            'required' => 0,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => '{}',
            'order' => 5
        ]);


        Datarow::create([
            'id' => 65,
            'data_type_id' => 9,
            'field' => 'settings',
            'type' => 'hidden',
            'display_name' => 'Settings',
            'required' => 0,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => '{}',
            'order' => 11
        ]);


        Datarow::create([
            'id' => 66,
            'data_type_id' => 9,
            'field' => 'created_at',
            'type' => 'timestamp',
            'display_name' => 'Created At',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => '{}',
            'order' => 6
        ]);


        Datarow::create([
            'id' => 67,
            'data_type_id' => 9,
            'field' => 'updated_at',
            'type' => 'timestamp',
            'display_name' => 'Updated At',
            'required' => 0,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => '{}',
            'order' => 8
        ]);


        Datarow::create([
            'id' => 68,
            'data_type_id' => 9,
            'field' => 'admin_belongsto_role_relationship',
            'type' => 'relationship',
            'display_name' => 'roles',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"admins\",\"pivot\":\"0\",\"taggable\":\"0\"}",
            'order' => 12
        ]);


        Datarow::create([
            'data_type_id' => 16,
            'field' => 'id',
            'type' => 'text',
            'display_name' => 'Id',
            'required' => 1,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => '{}',
            'order' => 1
        ]);


        Datarow::create([
            'data_type_id' => 16,
            'field' => 'photo_ar',
            'type' => 'image',
            'display_name' => 'Photo Ar',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"validation\":{\"rule\":\"required\"}}",
            'order' => 2
        ]);


        Datarow::create([
            'data_type_id' => 16,
            'field' => 'photo_en',
            'type' => 'image',
            'display_name' => 'Photo En',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"validation\":{\"rule\":\"required\"}}",
            'order' => 3
        ]);


        Datarow::create([
            'data_type_id' => 16,
            'field' => 'link',
            'type' => 'text',
            'display_name' => 'Link',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"validation\":{\"rule\":\"required\"}}",
            'order' => 4
        ]);
        Datarow::create([
            'data_type_id' => 16,
            'field' => 'title',
            'type' => 'text',
            'display_name' => 'Title',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"validation\":{\"rule\":\"required\"}}",
            'order' => 4
        ]);
        Datarow::create([
            'data_type_id' => 16,
            'field' => 'description',
            'type' => 'text_area',
            'display_name' => 'Description',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"validation\":{\"rule\":\"required\"}}",
            'order' => 4
        ]);



        Datarow::create([
            'data_type_id' => 16,
            'field' => 'created_at',
            'type' => 'timestamp',
            'display_name' => 'Created_at',
            'required' => 0,
            'browse' => 1,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => '{}',
            'order' => 6
        ]);


        Datarow::create([
            'data_type_id' => 16,
            'field' => 'updated_at',
            'type' => 'timestamp',
            'display_name' => 'updated at',
            'required' => 0,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => '{}',
            'order' => 7
        ]);


        Datarow::create([
            'data_type_id' => 16,
            'field' => 'status',
            'type' => 'hidden',
            'display_name' => 'Status',
            'required' => 0,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => '{}',
            'order' => 5
        ]);
        Datarow::create([
            'data_type_id' => 16,
            'field' => 'order',
            'type' => 'number',
            'display_name' => 'Order',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 0,
            'details' => '{}',
            'order' => 6
        ]);


        Datarow::create([
            'data_type_id' => 16,
            'field' => 'deleted_at',
            'type' => 'timestamp',
            'display_name' => '',
            'required' => 0,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => '{}',
            'order' => 8
        ]);
       
        Datarow::create([
            'id' => 125,
            'data_type_id' => 18,
            'field' => 'id',
            'type' => 'text',
            'display_name' => 'Id',
            'required' => 1,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => '{}',
            'order' => 1
        ]);


        Datarow::create([
            'id' => 126,
            'data_type_id' => 18,
            'field' => 'name',
            'type' => 'text',
            'display_name' => 'Name',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"validation\":{\"rule\":\"required\"}}",
            'order' => 2
        ]);


    

        Datarow::create([
            'id' => 128,
            'data_type_id' => 18,
            'field' => 'small_description',
            'type' => 'text_area',
            'display_name' => 'Small Description',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"validation\":{\"rule\":\"required\"}}",
            'order' => 6
        ]);


        Datarow::create([
            'id' => 129,
            'data_type_id' => 18,
            'field' => 'description',
            'type' => 'rich_text_box',
            'display_name' => 'Description',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"validation\":{\"rule\":\"required\"}}",
            'order' => 7
        ]);


        Datarow::create([
            'id' => 130,
            'data_type_id' => 18,
            'field' => 'address',
            'type' => 'text',
            'display_name' => 'Address',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"validation\":{\"rule\":\"required\"}}",
            'order' => 8
        ]);


        Datarow::create([
            'id' => 131,
            'data_type_id' => 18,
            'field' => 'phone',
            'type' => 'text',
            'display_name' => 'Phone',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"validation\":{\"rule\":\"required\"}}",
            'order' => 9
        ]);


        Datarow::create([
            'id' => 132,
            'data_type_id' => 18,
            'field' => 'email',
            'type' => 'text',
            'display_name' => 'Email',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"validation\":{\"rule\":\"required\"}}",
            'order' => 10
        ]);


        Datarow::create([
            'id' => 133,
            'data_type_id' => 18,
            'field' => 'map_x',
            'type' => 'text',
            'display_name' => 'Map X',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => '{}',
            'order' => 11
        ]);


        Datarow::create([
            'id' => 134,
            'data_type_id' => 18,
            'field' => 'map_y',
            'type' => 'text',
            'display_name' => 'Map Y',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => '{}',
            'order' => 12
        ]);


        Datarow::create([
            'id' => 135,
            'data_type_id' => 18,
            'field' => 'photo',
            'type' => 'image',
            'display_name' => 'Photo',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"validation\":{\"rule\":\"required\"}}",
            'order' => 13
        ]);


        Datarow::create([
            'id' => 136,
            'data_type_id' => 18,
            'field' => 'meta_keywords',
            'type' => 'text',
            'display_name' => 'Meta Keywords',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"validation\":{\"rule\":\"required\"}}",
            'order' => 14
        ]);


        Datarow::create([
            'id' => 137,
            'data_type_id' => 18,
            'field' => 'meta_description',
            'type' => 'text_area',
            'display_name' => 'Meta Description',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"validation\":{\"rule\":\"required\"}}",
            'order' => 15
        ]);


        Datarow::create([
            'id' => 138,
            'data_type_id' => 18,
            'field' => 'created_at',
            'type' => 'timestamp',
            'display_name' => 'Created At',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 0,
            'delete' => 1,
            'details' => '{}',
            'order' => 16
        ]);


        Datarow::create([
            'id' => 139,
            'data_type_id' => 18,
            'field' => 'updated_at',
            'type' => 'timestamp',
            'display_name' => 'Updated At',
            'required' => 0,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => '{}',
            'order' => 17
        ]);


        Datarow::create([
            'id' => 140,
            'data_type_id' => 18,
            'field' => 'status',
            'type' => 'text',
            'display_name' => '',
            'required' => 0,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => '{}',
            'order' => 18
        ]);


        Datarow::create([
            'id' => 141,
            'data_type_id' => 19,
            'field' => 'id',
            'type' => 'text',
            'display_name' => 'Id',
            'required' => 1,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => '{}',
            'order' => 1
        ]);


        Datarow::create([
            'id' => 142,
            'data_type_id' => 19,
            'field' => 'name',
            'type' => 'text',
            'display_name' => 'Name',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"validation\":{\"rule\":\"required\"}}",
            'order' => 2
        ]);


      

        Datarow::create([
            'id' => 144,
            'data_type_id' => 19,
            'field' => 'small_description',
            'type' => 'text_area',
            'display_name' => 'Small Description',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"validation\":{\"rule\":\"required\"}}",
            'order' => 6
        ]);


        Datarow::create([
            'id' => 145,
            'data_type_id' => 19,
            'field' => 'description',
            'type' => 'rich_text_box',
            'display_name' => 'Description',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"validation\":{\"rule\":\"required\"}}",
            'order' => 7
        ]);


        Datarow::create([
            'id' => 146,
            'data_type_id' => 19,
            'field' => 'photo',
            'type' => 'image',
            'display_name' => 'Photo',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"validation\":{\"rule\":\"required\"}}",
            'order' => 8
        ]);


        Datarow::create([
            'id' => 147,
            'data_type_id' => 19,
            'field' => 'meta_keywords',
            'type' => 'text',
            'display_name' => 'Meta Keywords',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"validation\":{\"rule\":\"required\"}}",
            'order' => 9
        ]);


        Datarow::create([
            'id' => 148,
            'data_type_id' => 19,
            'field' => 'meta_description',
            'type' => 'text_area',
            'display_name' => 'Meta Description',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"validation\":{\"rule\":\"required\"}}",
            'order' => 10
        ]);


        Datarow::create([
            'id' => 149,
            'data_type_id' => 19,
            'field' => 'status',
            'type' => 'text',
            'display_name' => 'Status',
            'required' => 0,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => '{}',
            'order' => 11
        ]);


        Datarow::create([
            'id' => 150,
            'data_type_id' => 19,
            'field' => 'created_at',
            'type' => 'timestamp',
            'display_name' => 'Created At',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 0,
            'delete' => 1,
            'details' => '{}',
            'order' => 12
        ]);


        Datarow::create([
            'id' => 151,
            'data_type_id' => 19,
            'field' => 'updated_at',
            'type' => 'timestamp',
            'display_name' => 'Updated At',
            'required' => 0,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => '{}',
            'order' => 13
        ]);

       

        Datarow::create([
            'id' => 164,
            'data_type_id' => 21,
            'field' => 'id',
            'type' => 'text',
            'display_name' => 'Id',
            'required' => 1,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => '{}',
            'order' => 1
        ]);


        Datarow::create([
            'id' => 167,
            'data_type_id' => 21,
            'field' => 'created_at',
            'type' => 'timestamp',
            'display_name' => 'Created At',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 0,
            'delete' => 1,
            'details' => '{}',
            'order' => 4
        ]);


        Datarow::create([
            'id' => 168,
            'data_type_id' => 21,
            'field' => 'updated_at',
            'type' => 'timestamp',
            'display_name' => 'Updated At',
            'required' => 0,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => '{}',
            'order' => 5
        ]);


        Datarow::create([
            'id' => 169,
            'data_type_id' => 21,
            'field' => 'name',
            'type' => 'text',
            'display_name' => 'name',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"validation\":{\"rule\":\"required\"}}",
            'order' => 2
        ]);


        Datarow::create([
            'id' => 170,
            'data_type_id' => 21,
            'field' => 'slug',
            'type' => 'text',
            'display_name' => 'slug',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"slugify\":{\"origin\":\"name\",\"forceUpdate\":true}}",
            'order' => 3
        ]);


        Datarow::create([
            'id' => 171,
            'data_type_id' => 21,
            'field' => 'description',
            'type' => 'text_area',
            'display_name' => 'description',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"validation\":{\"rule\":\"required\"}}",
            'order' => 4
        ]);


        Datarow::create([
            'id' => 173,
            'data_type_id' => 5,
            'field' => 'post_belongstomany_tag_relationship',
            'type' => 'relationship',
            'display_name' => 'tags',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"model\":\"App\\\\Tag\",\"table\":\"tags\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"post_tag\",\"pivot\":\"1\",\"taggable\":\"on\"}",
            'order' => 16
        ]);


        Datarow::create([
            'id' => 174,
            'data_type_id' => 22,
            'field' => 'id',
            'type' => 'text',
            'display_name' => 'Id',
            'required' => 1,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => '{}',
            'order' => 1
        ]);


        Datarow::create([
            'id' => 176,
            'data_type_id' => 22,
            'field' => 'description',
            'type' => 'rich_text_box',
            'display_name' => 'Description',
            'required' => 1,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"validation\":{\"rule\":\"required\"}}",
            'order' => 6
        ]);

      

        Datarow::create([
            'id' => 177,
            'data_type_id' => 22,
            'field' => 'start',
            'type' => 'timestamp',
            'display_name' => 'Start',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"validation\":{\"rule\":\"required|date\"}}",
            'order' => 7
        ]);


        Datarow::create([
            'id' => 178,
            'data_type_id' => 22,
            'field' => 'end',
            'type' => 'timestamp',
            'display_name' => 'End',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"validation\":{\"rule\":\"required|date|after_or_equal:start\"}}",
            'order' => 8
        ]);


        Datarow::create([
            'id' => 179,
            'data_type_id' => 22,
            'field' => 'img',
            'type' => 'image',
            'display_name' => 'Image',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{}",
            'order' => 9
        ]);


        Datarow::create([
            'id' => 180,
            'data_type_id' => 22,
            'field' => 'images',
            'type' => 'multiple_images',
            'display_name' => 'Images',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => '{}',
            'order' => 10
        ]);


        Datarow::create([
            'id' => 181,
            'data_type_id' => 22,
            'field' => 'map_x',
            'type' => 'text',
            'display_name' => 'Map X',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => '{}',
            'order' => 11
        ]);


        Datarow::create([
            'id' => 182,
            'data_type_id' => 22,
            'field' => 'map_y',
            'type' => 'text',
            'display_name' => 'Map Y',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => '{}',
            'order' => 12
        ]);


        Datarow::create([
            'id' => 183,
            'data_type_id' => 22,
            'field' => 'stock',
            'type' => 'number',
            'display_name' => 'Stock',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => '{}',
            'order' => 13
        ]);


        Datarow::create([
            'id' => 184,
            'data_type_id' => 22,
            'field' => 'status',
            'type' => 'number',
            'display_name' => 'Status',
            'required' => 0,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => '{}',
            'order' => 14
        ]);


        Datarow::create([
            'id' => 185,
            'data_type_id' => 22,
            'field' => 'created_at',
            'type' => 'timestamp',
            'display_name' => 'Created At',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 0,
            'delete' => 1,
            'details' => '{}',
            'order' => 15
        ]);


        Datarow::create([
            'id' => 186,
            'data_type_id' => 22,
            'field' => 'updated_at',
            'type' => 'timestamp',
            'display_name' => 'Updated At',
            'required' => 0,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => '{}',
            'order' => 16
        ]);


        Datarow::create([
            'id' => 187,
            'data_type_id' => 22,
            'field' => 'title',
            'type' => 'text',
            'display_name' => 'Title',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"validation\":{\"rule\":\"required\"}}",
            'order' => 2
        ]);


       

        Datarow::create([
            'id' => 189,
            'data_type_id' => 22,
            'field' => 'meta_keywords',
            'type' => 'text',
            'display_name' => 'meta Keywords',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"validation\":{\"rule\":\"required\"}}",
            'order' => 17
        ]);


        Datarow::create([
            'id' => 190,
            'data_type_id' => 22,
            'field' => 'meta_description',
            'type' => 'text_area',
            'display_name' => 'meta Description',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"validation\":{\"rule\":\"required\"}}",
            'order' => 18
        ]);


        Datarow::create([
            'id' => 191,
            'data_type_id' => 1,
            'field' => 'last_name',
            'type' => 'text',
            'display_name' => 'Last Name',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => '{}',
            'order' => 3
        ]);


        Datarow::create([
            'id' => 192,
            'data_type_id' => 1,
            'field' => 'phone',
            'type' => 'text',
            'display_name' => 'Phone',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => '{"validation":{"rule":"digits:8"}}',
            'order' => 13
        ]);


        Datarow::create([
            'id' => 193,
            'data_type_id' => 1,
            'field' => 'gender',
            'type' => 'text',
            'display_name' => 'Gender',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => '{}',
            'order' => 14
        ]);


        Datarow::create([
            'id' => 194,
            'data_type_id' => 1,
            'field' => 'address',
            'type' => 'text_area',
            'display_name' => '',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => '{}',
            'order' => 15
        ]);


        Datarow::create([
            'id' => 195,
            'data_type_id' => 5,
            'field' => 'post_belongstomany_user_relationship',
            'type' => 'relationship',
            'display_name' => 'users',
            'required' => 0,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => "{\"model\":\"App\\\\User\",\"table\":\"users\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"post_user\",\"pivot\":\"1\",\"taggable\":\"0\"}",
            'order' => 17
        ]);


        Datarow::create([
            'id' => 204,
            'data_type_id' => 19,
            'field' => 'slug',
            'type' => 'text',
            'display_name' => 'Slug',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"slugify\":{\"origin\":\"name\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:services,slug\"}}",
            'order' => 3
        ]);


      

        Datarow::create([
            'id' => 206,
            'data_type_id' => 18,
            'field' => 'slug',
            'type' => 'text',
            'display_name' => 'Slug',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"slugify\":{\"origin\":\"name\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:clinics,slug\"}}",
            'order' => 3
        ]);


      


        Datarow::create([
            'id' => 208,
            'data_type_id' => 22,
            'field' => 'slug',
            'type' => 'text',
            'display_name' => 'Slug',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"slugify\":{\"origin\":\"title\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:events,slug\"}}",
            'order' => 3
        ]);




        Datarow::create([
            'id' => 210,
            'data_type_id' => 26,
            'field' => 'id',
            'type' => 'text',
            'display_name' => 'Id',
            'required' => 1,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => '{}',
            'order' => 1
        ]);


        Datarow::create([
            'id' => 211,
            'data_type_id' => 26,
            'field' => 'first_name',
            'type' => 'text',
            'display_name' => 'First Name',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => '{}',
            'order' => 2
        ]);


        Datarow::create([
            'id' => 212,
            'data_type_id' => 26,
            'field' => 'last_name',
            'type' => 'text',
            'display_name' => 'Last Name',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => '{}',
            'order' => 3
        ]);


        Datarow::create([
            'id' => 213,
            'data_type_id' => 26,
            'field' => 'email',
            'type' => 'text',
            'display_name' => 'Email',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => '{"validation":{"rule":"email"}}',
            'order' => 4
        ]);


        Datarow::create([
            'id' => 214,
            'data_type_id' => 26,
            'field' => 'phone',
            'type' => 'text',
            'display_name' => 'Phone',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => '{"validation":{"rule":"regex:/^(009665|9665|\+9665|05|5)(5|0|3|6|4|9|1|8|7)([0-9]{7})$/"}}',
            'order' => 5
        ]);


        Datarow::create([
            'id' => 215,
            'data_type_id' => 26,
            'field' => 'gender',
            'type' => 'select_dropdown',
            'display_name' => 'Gender',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"default\":\"Male\",\"options\":{\"1\":\"Male\",\"2\":\"Female\"}}",
            'order' => 6
        ]);


        Datarow::create([
            'id' => 216,
            'data_type_id' => 26,
            'field' => 'clinic_id',
            'type' => 'text',
            'display_name' => 'Clinic Id',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => '{}',
            'order' => 7
        ]);


        Datarow::create([
            'id' => 217,
            'data_type_id' => 26,
            'field' => 'type',
            'type' => 'select_dropdown',
            'display_name' => 'Type',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"default\":\"clinic\",\"options\":{\"1\":\"clinic\",\"2\":\"doctor\",\"3\":\"service\",\"4\":\"post\"}}",
            'order' => 8
        ]);


        Datarow::create([
            'id' => 218,
            'data_type_id' => 26,
            'field' => 'url',
            'type' => 'text',
            'display_name' => 'Url',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => '{"validation":{"rule":"url"}}',
            'order' => 9
        ]);


        Datarow::create([
            'id' => 219,
            'data_type_id' => 26,
            'field' => 'further_requirements',
            'type' => 'text_area',
            'display_name' => 'Further Requirements',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => '{}',
            'order' => 10
        ]);


        Datarow::create([
            'id' => 220,
            'data_type_id' => 26,
            'field' => 'created_at',
            'type' => 'timestamp',
            'display_name' => 'Created At',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 0,
            'delete' => 1,
            'details' => '{}',
            'order' => 11
        ]);


        Datarow::create([
            'id' => 221,
            'data_type_id' => 26,
            'field' => 'updated_at',
            'type' => 'timestamp',
            'display_name' => 'Updated At',
            'required' => 0,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => '{}',
            'order' => 12
        ]);


        Datarow::create([
            'id' => 222,
            'data_type_id' => 26,
            'field' => 'clinic_request_belongsto_clinic_relationship',
            'type' => 'relationship',
            'display_name' => 'clinics',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"model\":\"App\\\\Clinic\",\"table\":\"clinics\",\"type\":\"belongsTo\",\"column\":\"clinic_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"admins\",\"pivot\":\"0\",\"taggable\":\"0\"}",
            'order' => 13
        ]);


        Datarow::create([
            'id' => 223,
            'data_type_id' => 28,
            'field' => 'id',
            'type' => 'text',
            'display_name' => 'Id',
            'required' => 1,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => '{}',
            'order' => 1
        ]);


        Datarow::create([
            'id' => 224,
            'data_type_id' => 28,
            'field' => 'title',
            'type' => 'text',
            'display_name' => 'Title',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"validation\":{\"rule\":\"required\"}}",
            'order' => 2
        ]);


        Datarow::create([
            'id' => 225,
            'data_type_id' => 28,
            'field' => 'url',
            'type' => 'text',
            'display_name' => 'Url',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"validation\":{\"rule\":\"required\"}}",
            'order' => 3
        ]);


        Datarow::create([
            'id' => 226,
            'data_type_id' => 28,
            'field' => 'status',
            'type' => 'text',
            'display_name' => 'Status',
            'required' => 0,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => '{}',
            'order' => 4
        ]);


        Datarow::create([
            'id' => 227,
            'data_type_id' => 28,
            'field' => 'created_at',
            'type' => 'timestamp',
            'display_name' => 'Created At',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 0,
            'delete' => 1,
            'details' => '{}',
            'order' => 5
        ]);


        Datarow::create([
            'id' => 228,
            'data_type_id' => 28,
            'field' => 'updated_at',
            'type' => 'timestamp',
            'display_name' => 'Updated At',
            'required' => 0,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => '{}',
            'order' => 6
        ]);


        Datarow::create([
            'id' => 229,
            'data_type_id' => 29,
            'field' => 'id',
            'type' => 'number',
            'display_name' => 'ID',
            'required' => 1,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => '{}',
            'order' => 0
        ]);


        Datarow::create([
            'id' => 230,
            'data_type_id' => 29,
            'field' => 'speciality_id',
            'type' => 'text',
            'display_name' => 'Speciality Id',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"relationship\":{\"key\":\"id\",\"label\":\"name\"}}",
            'order' => 1
        ]);


        Datarow::create([
            'id' => 232,
            'data_type_id' => 29,
            'field' => 'clinic_id',
            'type' => 'text',
            'display_name' => 'Clinic Id',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"relationship\":{\"key\":\"id\",\"label\":\"name\"}}",
            'order' => 3
        ]);


        Datarow::create([
            'id' => 234,
            'data_type_id' => 29,
            'field' => 'title',
            'type' => 'text',
            'display_name' => 'Title',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"validation\":{\"rule\":\"required\"}}",
            'order' => 5
        ]);




        Datarow::create([
            'id' => 236,
            'data_type_id' => 29,
            'field' => 'description',
            'type' => 'rich_text_box',
            'display_name' => 'Description',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"validation\":{\"rule\":\"required\"}}",
            'order' => 7
        ]);
       

        Datarow::create([
            'id' => 237,
            'data_type_id' => 29,
            'field' => 'position',
            'type' => 'text',
            'display_name' => 'Position',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"validation\":{\"rule\":\"required\"}}",
            'order' => 8
        ]);


        Datarow::create([
            'id' => 238,
            'data_type_id' => 29,
            'field' => 'speciality',
            'type' => 'text',
            'display_name' => 'Speciality',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"validation\":{\"rule\":\"required\"}}",
            'order' => 9
        ]);


        Datarow::create([
            'id' => 239,
            'data_type_id' => 29,
            'field' => 'photo',
            'type' => 'image',
            'display_name' => 'Photo',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => '{}',
            'order' => 10
        ]);


        Datarow::create([
            'id' => 240,
            'data_type_id' => 29,
            'field' => 'meta_keywords',
            'type' => 'text',
            'display_name' => 'Meta Keywords',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => '{}',
            'order' => 11
        ]);


        Datarow::create([
            'id' => 241,
            'data_type_id' => 29,
            'field' => 'meta_description',
            'type' => 'text_area',
            'display_name' => 'Meta Description',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => '{}',
            'order' => 12
        ]);


        Datarow::create([
            'id' => 242,
            'data_type_id' => 29,
            'field' => 'status',
            'type' => 'text',
            'display_name' => 'Status',
            'required' => 0,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => '{}',
            'order' => 13
        ]);


        Datarow::create([
            'id' => 243,
            'data_type_id' => 29,
            'field' => 'created_at',
            'type' => 'timestamp',
            'display_name' => 'Created At',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => '{}',
            'order' => 14
        ]);


        Datarow::create([
            'id' => 244,
            'data_type_id' => 29,
            'field' => 'updated_at',
            'type' => 'timestamp',
            'display_name' => 'Updated At',
            'required' => 0,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => '{}',
            'order' => 15
        ]);

        
        Datarow::create([
            'id' => 245,
            'data_type_id' => 30,
            'field' => 'id',
            'type' => 'number',
            'display_name' => 'ID',
            'required' => 1,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => NULL,
            'order' => 0
        ]);


        Datarow::create([
            'id' => 246,
            'data_type_id' => 30,
            'field' => 'doctor_id',
            'type' => 'text',
            'display_name' => 'Doctor Id',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => '{"validation":{"rule":"required"}}',
            'order' => 1
        ]);


        Datarow::create([
            'id' => 247,
            'data_type_id' => 30,
            'field' => 'workinghours_belongsto_doctor_relationship',
            'type' => 'relationship',
            'display_name' => 'Doctor',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"model\":\"App\\\\Doctor\",\"table\":\"doctors\",\"type\":\"belongsTo\",\"column\":\"doctor_id\",\"key\":\"id\",\"label\":\"title\",\"pivot_table\":\"admins\",\"pivot\":\"0\",\"taggable\":\"0\"}",
            'order' => 2
        ]);


        Datarow::create([
            'id' => 248,
            'data_type_id' => 30,
            'field' => 'day',
            'type' => 'select_dropdown',
            'display_name' => 'Day',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"default\":\"Saturday\",\"options\":{\"Saturday\":\"Saturday\",\"Sunday\":\"Sunday\",\"Monday\":\"Monday\",\"Tuesday\":\"Tuesday\",\"Wednesday\":\"Wednesday\",\"Thursday\":\"Thursday\",\"Friday\":\"Friday\"}}",
            'order' => 3
        ]);


        Datarow::create([
            'id' => 249,
            'data_type_id' => 30,
            'field' => 'start',
            'type' => 'time',
            'display_name' => 'Start',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"validation\":{\"rule\":\"required\"}}",
            'order' => 4
        ]);


        Datarow::create([
            'id' => 250,
            'data_type_id' => 30,
            'field' => 'end',
            'type' => 'time',
            'display_name' => 'End',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"validation\":{\"rule\":\"required\"}}",
            'order' => 5
        ]);


        Datarow::create([
            'id' => 251,
            'data_type_id' => 30,
            'field' => 'type',
            'type' => 'select_dropdown',
            'display_name' => 'Type',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"default\":\"Working\",\"options\":{\"Working\":\"Working\",\"Break\":\"Break\"}}",
            'order' => 6
        ]);


        Datarow::create([
            'id' => 252,
            'data_type_id' => 30,
            'field' => 'created_at',
            'type' => 'timestamp',
            'display_name' => 'Created At',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => NULL,
            'order' => 7
        ]);


        Datarow::create([
            'id' => 253,
            'data_type_id' => 30,
            'field' => 'updated_at',
            'type' => 'timestamp',
            'display_name' => 'Updated At',
            'required' => 0,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => NULL,
            'order' => 8
        ]);


        Datarow::create([
            'id' => 254,
            'data_type_id' => 31,
            'field' => 'id',
            'type' => 'number',
            'display_name' => 'ID',
            'required' => 1,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => '{}',
            'order' => 0
        ]);


        Datarow::create([
            'id' => 255,
            'data_type_id' => 31,
            'field' => 'doctor_id',
            'type' => 'text',
            'display_name' => 'Doctor Id',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => '{"validation":{"rule":"required"}}',
            'order' => 1
        ]);


        Datarow::create([
            'id' => 257,
            'data_type_id' => 31,
            'field' => 'user_id',
            'type' => 'text',
            'display_name' => 'User Id',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => '{}',
            'order' => 3
        ]);


        Datarow::create([
            'id' => 259,
            'data_type_id' => 31,
            'field' => 'start',
            'type' => 'timestamp',
            'display_name' => 'Start',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"validation\":{\"rule\":\"required\"}}",
            'order' => 5
        ]);


        Datarow::create([
            'id' => 260,
            'data_type_id' => 31,
            'field' => 'duration',
            'type' => 'number',
            'display_name' => 'Duration',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"validation\":{\"rule\":\"required|integer\"}}",
            'order' => 6
        ]);


        Datarow::create([
            'id' => 261,
            'data_type_id' => 31,
            'field' => 'comments',
            'type' => 'text_area',
            'display_name' => 'Comments',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"validation\":{\"rule\":\"required\"}}",
            'order' => 7
        ]);


        Datarow::create([
            'id' => 262,
            'data_type_id' => 31,
            'field' => 'confirmed',
            'type' => 'select_dropdown',
            'display_name' => 'Confirmed',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"validation\":{\"rule\":\"required\"},\"default\":\"0\",\"options\":{\"0\":\"No\",\"1\":\"Yes\"}}",
            'order' => 8
        ]);


        Datarow::create([
            'id' => 263,
            'data_type_id' => 31,
            'field' => 'payment_confirmed',
            'type' => 'select_dropdown',
            'display_name' => 'Payment Confirmed',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"validation\":{\"rule\":\"required\"},\"default\":\"0\",\"options\":{\"0\":\"No\",\"1\":\"Yes\"}}",
            'order' => 9
        ]);


        Datarow::create([
            'id' => 264,
            'data_type_id' => 31,
            'field' => 'created_at',
            'type' => 'timestamp',
            'display_name' => 'Created At',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => '{}',
            'order' => 10
        ]);


        Datarow::create([
            'id' => 265,
            'data_type_id' => 31,
            'field' => 'updated_at',
            'type' => 'timestamp',
            'display_name' => 'Updated At',
            'required' => 0,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => '{}',
            'order' => 11
        ]);


        Datarow::create([
            'id' => 266,
            'data_type_id' => 32,
            'field' => 'id',
            'type' => 'number',
            'display_name' => 'ID',
            'required' => 1,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => NULL,
            'order' => 0
        ]);


        Datarow::create([
            'id' => 267,
            'data_type_id' => 32,
            'field' => 'name',
            'type' => 'text',
            'display_name' => 'Name',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"validation\":{\"rule\":\"required\"}}",
            'order' => 1
        ]);


        Datarow::create([
            'id' => 268,
            'data_type_id' => 32,
            'field' => 'created_at',
            'type' => 'timestamp',
            'display_name' => 'Created At',
            'required' => 0,
            'browse' => 0,
            'read' => 1,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => NULL,
            'order' => 2
        ]);


        Datarow::create([
            'id' => 269,
            'data_type_id' => 32,
            'field' => 'updated_at',
            'type' => 'timestamp',
            'display_name' => 'Updated At',
            'required' => 0,
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 0,
            'delete' => 0,
            'details' => NULL,
            'order' => 3
        ]);


        Datarow::create([
            'id' => 270,
            'data_type_id' => 29,
            'field' => 'slug',
            'type' => 'text',
            'display_name' => 'Slug',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => '{}',
            'order' => 4
        ]);



        Datarow::create([
            'id' => 272,
            'data_type_id' => 29,
            'field' => 'email',
            'type' => 'text',
            'display_name' => 'Email',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => '{"validation":{"rule":["email","regex:/^[a-zA-Z0-9_.+-]+@(?:(?:[a-zA-Z0-9-]+\\\.)?[a-zA-Z]+\\\.)?(Andalusiagroup|andalusiagroup)\\\.net$/"]},"default":"@andalusiagroup.net"}',
            'order' => 16
        ]);


        Datarow::create([
            'id' => 273,
            'data_type_id' => 29,
            'field' => 'phone',
            'type' => 'text',
            'display_name' => 'Phone',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => '{"validation":{"rule":"digits:8"}}',
            'order' => 17
        ]);


        Datarow::create([
            'id' => 274,
            'data_type_id' => 29,
            'field' => 'price',
            'type' => 'number',
            'display_name' => 'Price',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => '{"validation":{"rule":"integer"}}',
            'order' => 18
        ]);


        Datarow::create([
            'id' => 275,
            'data_type_id' => 29,
            'field' => 'duration',
            'type' => 'number',
            'display_name' => 'Duration By Min',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => '{"validation":{"rule":"required|integer"}}',
            'order' => 19
        ]);


        Datarow::create([
            'id' => 276,
            'data_type_id' => 29,
            'field' => 'gender',
            'type' => 'select_dropdown',
            'display_name' => 'Gender',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"default\":\"male\",\"options\":{\"male\":\"Male\",\"female\":\"Female\"}}",
            'order' => 21
        ]);


        Datarow::create([
            'id' => 285,
            'data_type_id' => 29,
            'field' => 'doctor_belongsto_clinic_relationship',
            'type' => 'relationship',
            'display_name' => 'clinics',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"model\":\"App\\\\Clinic\",\"table\":\"clinics\",\"type\":\"belongsTo\",\"column\":\"clinic_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"admins\",\"pivot\":\"0\",\"taggable\":null}",
            'order' => 22
        ]);


        Datarow::create([
            'id' => 286,
            'data_type_id' => 29,
            'field' => 'doctor_belongsto_speciality_relationship',
            'type' => 'relationship',
            'display_name' => 'specialities',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"model\":\"App\\\\Speciality\",\"table\":\"specialities\",\"type\":\"belongsTo\",\"column\":\"speciality_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"admins\",\"pivot\":\"0\",\"taggable\":null}",
            'order' => 23
        ]);


        Datarow::create([
            'id' => 292,
            'data_type_id' => 31,
            'field' => 'appointment_belongsto_doctor_relationship',
            'type' => 'relationship',
            'display_name' => 'doctors',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"model\":\"App\\\\Doctor\",\"table\":\"doctors\",\"type\":\"belongsTo\",\"column\":\"doctor_id\",\"key\":\"id\",\"label\":\"title\",\"pivot_table\":\"admins\",\"pivot\":\"0\",\"taggable\":null}",
            'order' => 12
        ]);


        Datarow::create([
            'id' => 293,
            'data_type_id' => 31,
            'field' => 'appointment_belongsto_user_relationship',
            'type' => 'relationship',
            'display_name' => 'users',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"model\":\"App\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"user_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"admins\",\"pivot\":\"0\",\"taggable\":null}",
            'order' => 13
        ]);

        Datarow::create([
            'id' => 294,
            'data_type_id' => 32,
            'field' => 'clinic_id',
            'type' => 'text',
            'display_name' => 'Clinic Id',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "",
            'order' => 3
        ]);

        Datarow::create([
            'id' => 295,
            'data_type_id' => 32,
            'field' => 'specialities_belongsto_clinic_relationship',
            'type' => 'relationship',
            'display_name' => 'Clinic',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"model\":\"App\\\\Clinic\",\"table\":\"clinics\",\"type\":\"belongsTo\",\"column\":\"clinic_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"admins\",\"pivot\":\"0\",\"taggable\":null}",
            'order' => 4
        ]);

        Datarow::create([
            'id' => 296,
            'data_type_id' => 32,
            'field' => 'image',
            'type' => 'image',
            'display_name' => 'Image',
            'required' => 0,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => '',
            'order' => 5
        ]);

        Datarow::create([
            'data_type_id' => 29,
            'field' => 'small_description',
            'type' => 'text_area',
            'display_name' => 'Small Description',
            'required' =>1,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"validation\":{\"rule\":\"required\"}}",
            'order' => 24
        ]);
        Datarow::create([
            'data_type_id' => 22,
            'field' => 'small_description',
            'type' => 'text_area',
            'display_name' => 'Small description',
            'required' => 1,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"validation\":{\"rule\":\"required\"}}",
            'order' => 19
        ]);

        Datarow::create([
            'data_type_id' => 22,
            'field' => 'topevent',
            'type' => 'checkbox',
            'display_name' => 'Top event',
            'required' => 1,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => '{}',
            'order' => 20
        ]);

        Datarow::create([
            'data_type_id' => 19,
            'field' => 'order',
            'type' => 'number',
            'display_name' => 'Order',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"validation\":{\"rule\":\"required\"}}",
            'order' => 11
        ]);
        Datarow::create([
            'data_type_id' => 19,
            'field' => 'is_new',
            'type' => 'checkbox',
            'display_name' => 'Is new',
            'required' =>0,
            'browse' => 0,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "",
            'order' => 11
        ]);

        Datarow::create([
            'data_type_id' => 5,
            'field' => 'order',
            'type' => 'number',
            'display_name' => 'Order',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"validation\":{\"rule\":\"required\"}}",
            'order' => 11
        ]);

       
        Datarow::create([
            'data_type_id' => 22,
            'field' => 'facebook',
            'type' => 'text',
            'display_name' => 'Facebook',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"validation\":{\"rule\":\"required\"}}",
            'order' => 18
        ]);
        Datarow::create([
            'data_type_id' => 22,
            'field' => 'twitter',
            'type' => 'text',
            'display_name' => 'Twitter',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"validation\":{\"rule\":\"required\"}}",
            'order' => 18
        ]);
        
        Datarow::create([
            'data_type_id' => 22,
            'field' => 'youtube',
            'type' => 'text',
            'display_name' => 'Youtube',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"validation\":{\"rule\":\"required\"}}",
            'order' => 18
        ]);
        Datarow::create([
            'data_type_id' => 22,
            'field' => 'whatsapp',
            'type' => 'text',
            'display_name' => 'Whatsapp',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"validation\":{\"rule\":\"required\"}}",
            'order' => 18
        ]);
        Datarow::create([
            'data_type_id' => 22,
            'field' => 'instagram',
            'type' => 'text',
            'display_name' => 'Instagram',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"validation\":{\"rule\":\"required\"}}",
            'order' => 18
        ]);

        Datarow::create([
            'data_type_id' => 22,
            'field' => 'order',
            'type' => 'number',
            'display_name' => 'Order',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => "{\"validation\":{\"rule\":\"required\"}}",
            'order' => 18
        ]);
        Datarow::create([
            'data_type_id' => 29,
            'field' => 'order',
            'type' => 'number',
            'display_name' => 'Order',
            'required' => 1,
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'details' => '{}',
            'order' => 13
        ]);

//        _________________________End________Seed  data_rows Table___________________________________________________________________________


//        ________________"________Start________Seed clinics Table___________________________________________________________________________
        Clinic::create([
            'id' => 1,
            'name' => 'عيادة أمراض القلب',
            'slug' => 'ayadh-amradh-alqlb',
            'small_description' => 'تضم عيادة أمراض القلب بمستشفى أندلسية حي الجامعة أمهر أطباء وخبراء القلب في المملكة والشرق الأوسط، لتقديم خدمة ورعاية أفضل للمرضى بدءاً من التشخيص إلى العلاج، حيث ساعدت عيادة أمراض القلب في علاج ما يزيد على 2000 مريض، وأعادت لهم الأمل في حياة سعيدة وآمنة من جديد.',
            'description' => '

تضم عيادة أمراض القلب بمستشفى أندلسية حي الجامعة أمهر أطباء وخبراء القلب في المملكة والشرق الأوسط، لتقديم خدمة ورعاية أفضل للمرضى بدءاً من التشخيص إلى العلاج، حيث ساعدت عيادة أمراض القلب في علاج ما يزيد على 2000 مريض، وأعادت لهم الأمل في حياة سعيدة وآمنة من جديد.

\n
وتتميز العيادة بخدمات استثنائية تساعد على أن تكون رحلة العلاج رحلة آمنة وبأقصى درجات الرعاية للمرضى، مثل:-

\n


\n
\n
خدمة طوارئ القلب متوفرة 24 ساعة يومياً طوال أيام الأسبوع.
\n
وجود استشاري قلب عند الطلب 24 ساعة يومياً طوال أيام الأسبوع.
\n
وحدة رعاية القلب تعمل على مدار 24 ساعة يومياً.
\n
\n


\n
الخدمات التي تقدمها عيادة أمراض القلب:-
\n
\n
إجراء قسطرة القلب التشخيصية والعلاجية.
\n
علاج أمراض القلب الروماتيزمية والوراثية.
\n
فشل وتضخم عضلة القلب.
\n
تركيب صمامات ودعامات القلب.
\n
علاج عدم انتظام ضربات القلب.
\n
علاج أمراض الشرايين التاجية.
\n
الذبحة الصدرية وجلطة القلب.
\n
تصلب الشرايين.
\n
رسم القلب العادي وبالمجهود.
\n
فحص القلب بالموجات الصوتية (إيكو).
\n
رسم القلب لمدة 24 ساعة (هولتر).
\n
',
            'address' => 'حي الجامعة - شارع السيرة العطرة',
            'phone' => '12345678',
            'email' => 'hjh.info@andalusiagroup.net',
            'map_x' => '21.58323',
            'map_y' => '29.953463',
            'photo' => 'clinics\\January2020\\fuVVomxRgSDIEwQ6gogq.jpg',
            'meta_keywords' => 'عيادة أمراض القلب،امراض القلب،دكتور امراض القلب',
            'meta_description' => 'تضم عيادة أمراض القلب بمستشفى أندلسية حي الجامعة أمهر أطباء وخبراء القلب في المملكة والشرق الأوسط، لتقديم خدمة ورعاية أفضل للمرضى بدءاً من التشخيص إلى العلاج',
            'status' => 1,
            'created_at' => '2020-01-29 06:34:00',
            'updated_at' => '2020-04-04 11:38:00'
        ]);


        Clinic::create([
            'id' => 2,
            'name' => 'اسم بالعرب',
            'slug' => 'asm-balarb',
            'small_description' => 'تجربة وصف صغير ',
            'description' => '

وصف المنشور

',
            'address' => 'تجرية ',
            'phone' => '12345678',
            'email' => 'test@example.com',
            'map_x' => NULL,
            'map_y' => NULL,
            'photo' => 'clinics/April2020/jhPeaQXKjhtnAZFrnS7i.png',
            'meta_keywords' => 'test',
            'meta_description' => 'تجربة البيانات الاساسية بالعربي ',
            'status' => 1,
            'created_at' => '2020-04-06 13:18:17',
            'updated_at' => '2020-04-06 13:18:28'
        ]);

//        _________________________End________Seed clinics Table___________________________________________________________________________



//        _________________________Start________Seed doctor Table___________________________________________________________________________
        Doctor::create( [
            'id'=>1,
            'title'=>'أكرم ماجد',
            'slug'=>'أكرم-ماجد',
            'description'=>'بكالوريوس في طب وجراحة الفم والأسنان - الإجراءات والفحوصات التي تخص الأسنان- عمليات خلع الأسنان والخلع الجراحي- تنظيف الأسنان- بانوراما الأسنان - أشعة عادية على الأسنان بمستشفى حي الجامعة',
            'position'=>'استشاري',
            'speciality'=>'أخصائي طب الأسنان',
            'photo'=>'doctors\\Appdoctorphotos\\Akram-Maged.jpg',
            'meta_keywords'=>'',
            'meta_description'=>'',
            'status'=>1,
            'created_at'=>'2020-04-07 21:10:27',
            'updated_at'=>'2020-04-07 21:10:27',
            'clinic_id'=>NULL,
            'email'=>'AKRAM.MAGED@andalusiagroup.net',
            'phone'=>'12345678',
            'price'=>'150',
            'duration'=>'15',
            'speciality_id'=>1,
            'gender'=>'male'
        ] );



        Doctor::create( [
            'id'=>2,
            'title'=>'أحمد جابر',
            'slug'=>'أحمد-جابر',
            'description'=>'ماجيستر في أمراض القلب والأوعية الدموية--حالات ضغط الدم وتصلب الشرايين.- عدم انتظام ضربات القلب - أمراض القلب الروماتيزمية - أمراض صمامات القلب - أمراض الشرايين التاجية (جلطة القلب - الذبحة الصدرية- فشل عضلة القلب وتضخم عضلة القلب - علاج جلطات الشرايين التاجية الحادة بالقسطرة- إجراء رسم القلب العادي وبالمجهود - رسم قلب لمدة 24 ساعة (هولتر)-موجات صوتية على القلب-متابعة قياس الضغط 24 ساعة',
            'position'=>'أخصائي',
            'speciality'=>'أخصائي أمراض القلب والأوعية الدموية',
            'photo'=>'doctors\\Appdoctorphotos\\Ahmed-Gaber.jpg',
            'meta_keywords'=>'',
            'meta_description'=>'',
            'status'=>1,
            'created_at'=>'2020-04-07 21:10:27',
            'updated_at'=>'2020-04-07 21:10:27',
            'clinic_id'=>NULL,
            'email'=>'AHMED.JABER@andalusiagroup.net',
            'phone'=>'50002',
            'price'=>'75',
            'duration'=>'15',
            'speciality_id'=>2,
            'gender'=>'male'
        ] );



        Doctor::create( [
            'id'=>3,
            'title'=>'مصطفى سلامة',
            'slug'=>'مصطفى-سلامة',
            'description'=>'\"استشاري الجراحة العامة لفريقنا الطبي المميز بمستشفى أندلسية حي الجامعة.\r\n\r\nخبرة أكثر من 15 عامًا في الجراحة العامة، وحاصل على دكتوراه في الجراحة العامة من جامعة الأزهر بالقاهرة، وعمل كأخصائي أول للجراحة العامة بمستشفى جامعة ابن سينا بجدة\r\n\"\r\n',
            'position'=>'استشاري',
            'speciality'=>'استشاري الجراحة العامة',
            'photo'=>'doctors\\Appdoctorphotos\\Moustafa-Salama.jpg',
            'meta_keywords'=>'',
            'meta_description'=>'',
            'status'=>1,
            'created_at'=>'2020-04-07 21:10:27',
            'updated_at'=>'2020-04-07 21:10:27',
            'clinic_id'=>NULL,
            'email'=>'Moustafa-Salama@andalusiagroup.net',
            'phone'=>'50003',
            'price'=>'150',
            'duration'=>'15',
            'speciality_id'=>3,
            'gender'=>'male'
        ] );



        Doctor::create( [
            'id'=>4,
            'title'=>'عصام عبد الفتاح',
            'slug'=>'عصام-عبد-الفتاح',
            'description'=>'ماجستير الأمراض الجلدية والتناسلية - التهاب الجلد والحكة والحساسية-البقع الجلدية البيضاء والملونة والهالات السوداء-السنطات والزوائد الجلدية-حب الشباب وآثاره',
            'position'=>'أخصائي',
            'speciality'=>'أخصائي الأمراض الجلدية',
            'photo'=>'doctors\\Appdoctorphotos\\Essam-AbdelFattah.jpg',
            'meta_keywords'=>'',
            'meta_description'=>'',
            'status'=>1,
            'created_at'=>'2020-04-07 21:10:27',
            'updated_at'=>'2020-04-07 21:10:27',
            'clinic_id'=>NULL,
            'email'=>'Essam.AbdelFatah@andalusiagroup.net',
            'phone'=>'50004',
            'price'=>'75',
            'duration'=>'15',
            'speciality_id'=>4,
            'gender'=>'male'
        ] );



        Doctor::create( [
            'id'=>5,
            'title'=>'هبة غازي',
            'slug'=>'هبة-غازي',
            'description'=>'لحاصلة على بكالوريوس في الطب من جامعة الإسكندرية 2005م، والحاصلة أيضاً على ماجستير في الأمراض الجلدية والتناسلية، بالإضافة إلى دبلومة في الطب التجميلي والليزر.بمستشفى حي الجامعة',
            'position'=>'أخصائي',
            'speciality'=>'أخصائي الأمراض الجلدية',
            'photo'=>'doctors\\Appdoctorphotos\\Heba-Ghazy.jpg',
            'meta_keywords'=>'',
            'meta_description'=>'',
            'status'=>1,
            'created_at'=>'2020-04-07 21:10:27',
            'updated_at'=>'2020-04-07 21:10:27',
            'clinic_id'=>NULL,
            'email'=>'heba.ghazy@andalusiagroup.net',
            'phone'=>'50005',
            'price'=>'75',
            'duration'=>'15',
            'speciality_id'=>4,
            'gender'=>'female'
        ] );



        Doctor::create( [
            'id'=>6,
            'title'=>'إبراهيم عيد',
            'slug'=>'إبراهيم-عيد',
            'description'=>'ماجستير في الأنف والأذن والحنجرة -   علاج التهاب اللوزتين والحلق وخراج خلف اللوزتين- النزيف الدموي من الأنف- الزدات الأنفية والانسداد',
            'position'=>'أخصائي',
            'speciality'=>'أخصائى أنف وأذن وحنجرة',
            'photo'=>'doctors\\Appdoctorphotos\\Ibrahim-Eid.jpg',
            'meta_keywords'=>'',
            'meta_description'=>'',
            'status'=>1,
            'created_at'=>'2020-04-07 21:10:27',
            'updated_at'=>'2020-04-07 21:10:27',
            'clinic_id'=>NULL,
            'email'=>'IBRAHIM.EID@andalusiagroup.net',
            'phone'=>'50006',
            'price'=>'75',
            'duration'=>'15',
            'speciality_id'=>5,
            'gender'=>'male'
        ] );



        Doctor::create( [
            'id'=>7,
            'title'=>'علاء الشامي',
            'title'=>'Alaa AL Shamy',
            'slug'=>'علاء-الشامي',
            'description'=>'ماجستير أمراض الباطنة - علاج أمراض الجهاز الهضمي والكبد- أمراض سوء الامتصاص والهضم- قرحة المعدة والأثنى عشر- مناظير الجهاز الهضمي- الكبد الدهني وتضخم الكبد- التهابات البنكرياس- القولون العصبي- التشخيص المبكر لأورام الجهاز الهضمي- الغدد الصماء والاضطراب الهرموني- حمى (الضنك – النزفية – الانفلونزا)- حمى (التيفويد – المالطية)- تشخيص مرض السكري والوقاية من مضاعفاته- آلام المفاصل الروماتيزمية- الروماتويد والذئبة الحمراء والأمراض المناعية-  المغص والالتهابات الكلوية- الفشل الكلوي ومسبباته- منظار المعدة- منظار القولون- مناظير القنوات المرارية- تركيب بالون المعدة- ربط وحقن دوالي المرئ والمعدة- توسيع المرئ والقولون- استئصال اللحمية بالمنظار',
            'position'=>'أخصائي',
            'speciality'=>'أخصائي أمراض الباطنة وأمراض الكلى',
            'photo'=>'doctors\\Appdoctorphotos\\Alaa-AL-Shamy.jpg',
            'meta_keywords'=>'',
            'meta_description'=>'',
            'status'=>1,
            'created_at'=>'2020-04-07 21:10:27',
            'updated_at'=>'2020-04-07 21:10:27',
            'clinic_id'=>NULL,
            'email'=>'ALAA.ELSHAMY@andalusiagroup.net',
            'phone'=>'50007',
            'price'=>'75',
            'duration'=>'15',
            'speciality_id'=>6,
            'gender'=>'male'
        ] );



        Doctor::create( [
            'id'=>8,
            'title'=>'خالد عبد العزيز',
            'slug'=>'خالد-عبد-العزيز',
            'description'=>'ماجستير أمراض الباطنة - علاج أمراض الجهاز الهضمي والكبد- أمراض سوء الامتصاص والهضم- قرحة المعدة والأثنى عشر- مناظير الجهاز الهضمي- الكبد الدهني وتضخم الكبد- التهابات البنكرياس- القولون العصبي- التشخيص المبكر لأورام الجهاز الهضمي- الغدد الصماء والاضطراب الهرموني- حمى (الضنك – النزفية – الانفلونزا)- حمى (التيفويد – المالطية)- تشخيص مرض السكري والوقاية من مضاعفاته- آلام المفاصل الروماتيزمية- الروماتويد والذئبة الحمراء والأمراض المناعية-  المغص والالتهابات الكلوية- الفشل الكلوي ومسبباته- منظار المعدة- منظار القولون- مناظير القنوات المرارية- تركيب بالون المعدة- ربط وحقن دوالي المرئ والمعدة- توسيع المرئ والقولون- استئصال اللحمية بالمنظار بمستشفى حي الجامعة',
            'position'=>'أخصائي',
            'speciality'=>'أخصائي أمراض الجهاز الهضمي والكلى',
            'photo'=>'doctors\\Appdoctorphotos\\Khaled-AbdelAziz.jpg',
            'meta_keywords'=>'',
            'meta_description'=>'',
            'status'=>1,
            'created_at'=>'2020-04-07 21:10:27',
            'updated_at'=>'2020-04-07 21:10:27',
            'clinic_id'=>NULL,
            'email'=>'KHALID.ABDULATEF@andalusiagroup.net',
            'phone'=>'50008',
            'price'=>'75',
            'duration'=>'15',
            'speciality_id'=>7,
            'gender'=>'male'
        ] );



        Doctor::create( [
            'id'=>9,
            'title'=>'عزت كريمة',
            'slug'=>'عزت-كريمة',
            'description'=>'ماجستير أمراض الباطنة - علاج أمراض الجهاز الهضمي والكبد- أمراض سوء الامتصاص والهضم- قرحة المعدة والأثنى عشر- مناظير الجهاز الهضمي- الكبد الدهني وتضخم الكبد- التهابات البنكرياس- القولون العصبي- التشخيص المبكر لأورام الجهاز الهضمي- الغدد الصماء والاضطراب الهرموني- حمى (الضنك – النزفية – الانفلونزا)- حمى (التيفويد – المالطية)- تشخيص مرض السكري والوقاية من مضاعفاته- آلام المفاصل الروماتيزمية- الروماتويد والذئبة الحمراء والأمراض المناعية- المغص والالتهابات الكلوية- الفشل الكلوي ومسبباته- منظار المعدة- منظار القولون- مناظير القنوات المرارية- تركيب بالون المعدة- ربط وحقن دوالي المرئ والمعدة- توسيع المرئ والقولون- استئصال اللحمية بالمنظار بمستشفى حي الجامعة',
            'position'=>'أخصائي',
            'speciality'=>'أخصائي الامراض الباطنية',
            'photo'=>'doctors\\Appdoctorphotos\\Ezzat-Karima.jpg',
            'meta_keywords'=>'',
            'meta_description'=>'',
            'status'=>1,
            'created_at'=>'2020-04-07 21:10:27',
            'updated_at'=>'2020-04-07 21:10:27',
            'clinic_id'=>NULL,
            'email'=>'Ezzat.Karima@andalusiagroup.net',
            'phone'=>'50009',
            'price'=>'75',
            'duration'=>'15',
            'speciality_id'=>8,
            'gender'=>'female'
        ] );



        Doctor::create( [
            'id'=>10,
            'title'=>'أسامة عبد السلام',
            'slug'=>'أسامة-عبد-السلام',
            'description'=>'دكتوراه في الأمراض العصبية - الصرع- ضعف وضمور العضلات- أمراض الأعصاب المركزية والطرفية- شلل وآلام الأعصاب (الخامس والسابع)- الجلطات الدماغية والشلل- أمراض الذاكرة (الزهايمر)- الصداع بأنواعه- أمراض الحركة (الشلل الرعاش)- التهاب الأعصاب الطرفية- فقدان الذاكرة- أمراض الحبل الشوكي- رسم عصب- رسم عضلات بمستشفى حي الجامعة',
            'position'=>'استشاري',
            'speciality'=>'استشارى أمراض المخ و الأعصاب',
            'photo'=>'doctors\\Appdoctorphotos\\Osama-AbdelSalam.jpg',
            'meta_keywords'=>'',
            'meta_description'=>'',
            'status'=>1,
            'created_at'=>'2020-04-07 21:10:27',
            'updated_at'=>'2020-04-07 21:10:27',
            'clinic_id'=>NULL,
            'email'=>'Osama.AbdelSalam@andalusiagroup.net',
            'phone'=>'50010',
            'price'=>'150',
            'duration'=>'15',
            'speciality_id'=>9,
            'gender'=>'male'
        ] );



        Doctor::create( [
            'id'=>11,
            'title'=>'منال فوزي',
            'slug'=>'منال-فوزي',
            'description'=>'ماجيستير أمراض النساء والتوليد - التهابات الجهاز التناسلي-  آلام واضطرابات الدورة الشهرية- الوقاية والتشخيص المبكر للأورام- استئصال أورام الرحم والمبيض بالمنظار  (أكياس المبيض – الورم الليفي)- سقوط الرحم.- الأندومتريوزيس- متابعة مرحلة ما بعد انقطاع الطمث.- الولادة الطبيعية بدون ألم- الولادة القيصرية- جهاز قياس نبضات قلب الجنين CTG- حالات الحمل الحرج والإجهاض المتكرر- حالات الحمل خارج الرحم- تسمم الحمل- علاج عقم الزوجين- تنظيم الأسرة- إجراء اختبارات الحمل- مسحة عنق الرحم- إجراء الموجات فوق الصوتية',
            'position'=>'أخصائي',
            'speciality'=>'أخصائى أمراض النساء والولادة',
            'photo'=>'doctors\\Appdoctorphotos\\Manal-Fawzy.jpg',
            'meta_keywords'=>'',
            'meta_description'=>'',
            'status'=>1,
            'created_at'=>'2020-04-07 21:10:27',
            'updated_at'=>'2020-04-07 21:10:27',
            'clinic_id'=>NULL,
            'email'=>'MANAL.AHMED@andalusiagroup.net',
            'phone'=>'50011',
            'price'=>'75',
            'duration'=>'15',
            'speciality_id'=>10,
            'gender'=>'female'
        ] );



        Doctor::create( [
            'id'=>12,
            'title'=>'شيماء عصام',
            'slug'=>'شيماء-عصام',
            'description'=>'ماجستير في أمراض النساء والتوليد - التهابات الجهاز التناسلي-  آلام واضطرابات الدورة الشهرية- الوقاية والتشخيص المبكر للأورام- استئصال أورام الرحم والمبيض بالمنظار  (أكياس المبيض – الورم الليفي)- سقوط الرحم.- الأندومتريوزيس- متابعة مرحلة ما بعد انقطاع الطمث.- الولادة الطبيعية بدون ألم- الولادة القيصرية- جهاز قياس نبضات قلب الجنين CTG- حالات الحمل الحرج والإجهاض المتكرر- حالات الحمل خارج الرحم- تسمم الحمل- علاج عقم الزوجين- تنظيم الأسرة- إجراء اختبارات الحمل- مسحة عنق الرحم- إجراء الموجات فوق الصوتية',
            'position'=>'أخصائي',
            'speciality'=>'أخصائى أمراض النساء والولادة',
            'photo'=>'doctors\\Appdoctorphotos\\Shaimaa-Essam.jpg',
            'meta_keywords'=>'',
            'meta_description'=>'',
            'status'=>1,
            'created_at'=>'2020-04-07 21:10:27',
            'updated_at'=>'2020-04-07 21:10:27',
            'clinic_id'=>NULL,
            'email'=>'SHIMAA.HANAFY@andalusiagroup.net',
            'phone'=>'50012',
            'price'=>'75',
            'duration'=>'15',
            'speciality_id'=>10,
            'gender'=>'female'
        ] );



        Doctor::create( [
            'id'=>13,
            'title'=>'نهير درويش',
            'slug'=>'نهير-درويش',
            'description'=>'خبرة 15 سنة في طب النساء والولادة، وحاصلة على البورد العربي في اختصاص الولادة وأمراض النساء، وعلى بكالوريوس الطب والجراحة، وماجستير في أمراض النساء والولادة. بمستشفى حي الجامعة',
            'position'=>'أخصائي',
            'speciality'=>'أخصائى أول نساء وولادة',
            'photo'=>'doctors\\Appdoctorphotos\\Nohier-Darweesh.jpg',
            'meta_keywords'=>'',
            'meta_description'=>'',
            'status'=>1,
            'created_at'=>'2020-04-07 21:10:27',
            'updated_at'=>'2020-04-07 21:10:27',
            'clinic_id'=>NULL,
            'email'=>'noheir.darwish@andaluisagroup.net',
            'phone'=>'50013',
            'price'=>'75',
            'duration'=>'15',
            'speciality_id'=>11,
            'gender'=>'female'
        ] );



        Doctor::create( [
            'id'=>14,
            'title'=>'محمد نصر',
            'slug'=>'محمد-نصر',
            'description'=>'محمد نصر استشاري طب وجراحة العيون والليزر لفريقنا الطبي بمستشفى أندلسية حي الجامعة.\r\nاستشاري جراحة العيون بوحدة الليزر بمستشفى قصر العيني، وعضو الجمعية الأوروبية لجراحة المياه البيضاء وإصلاح عيوب الإبصار، والجمعية الأوروبية لجراحة الشبكية، والأكاديمية الأمريكية للعيون، وحاصل على شهادة المجلس العالمي للعيون.',
            'position'=>'استشاري',
            'speciality'=>'استشارى طب و جراحة العيون',
            'photo'=>'doctors\\Appdoctorphotos\\Mohammed-Nasr.jpg',
            'meta_keywords'=>'',
            'meta_description'=>'',
            'status'=>1,
            'created_at'=>'2020-04-07 21:10:27',
            'updated_at'=>'2020-04-07 21:10:27',
            'clinic_id'=>NULL,
            'email'=>'m4nasr@yahoo.com',
            'phone'=>'50014',
            'price'=>'150',
            'duration'=>'15',
            'speciality_id'=>12,
            'gender'=>'male'
        ] );



        Doctor::create( [
            'id'=>15,
            'title'=>'محمود حرب',
            'slug'=>'محمود-حرب',
            'description'=>'ماجستير في جراحة العظام - آلام والتهابات المفاصل- تمزق الأربطة- خلع المفاصل- إصابات غضروف الركبة- تمزق الرباط الصليبي الأمامي والخلفي- علاج الخلع المتكرر لمفصل الكتف- جراحات استبدال المفاصل والمفاصل الصناعية- تغيير مفصل الركبة- الكسور ومضاعفاتها (بطء الالتحام – الاعوجاج)- خشونة الركبة- آلم القدمين- حقن البلازما للركبة- الاستبدال الكلي لمفصل الركبة والكوع- عملية منظار الركبة ومناظير المفاصل- هشاشة العظام- التهابات وخشونة المفاصل- الطب الرياضي- عمليات العمود الفقري - عمليات تسليك الأعصاب والأوتار- تثبيت الكسور وعمليات الشرائح والمسامير - علاج العيوب الخلقية لعظام اليد',
            'position'=>'أخصائي',
            'speciality'=>'أخصائي أمراض العظام والمفاصل',
            'photo'=>'doctors\\Appdoctorphotos\\Mahmoud-Harb.jpg',
            'meta_keywords'=>'',
            'meta_description'=>'',
            'status'=>1,
            'created_at'=>'2020-04-07 21:10:27',
            'updated_at'=>'2020-04-07 21:10:27',
            'clinic_id'=>NULL,
            'email'=>'MAHMOUD.HARB@andalusiagroup.net',
            'phone'=>'50015',
            'price'=>'75',
            'duration'=>'15',
            'speciality_id'=>13,
            'gender'=>'male'
        ] );



        Doctor::create( [
            'id'=>16,
            'title'=>'محمد العشماوي',
            'slug'=>'محمد-العشماوي',
            'description'=>'خبرة 14 سنة في طب العظام، وحاصل على الماجستير والدكتوراه في طب العظام والكسور والإصابات، والزمالة الألمانية لطب',
            'position'=>'أخصائي',
            'speciality'=>'أخصائي أمراض العظام والمفاصل',
            'photo'=>'doctors\\Appdoctorphotos\\Mohammed-Ashmway.jpg',
            'meta_keywords'=>'',
            'meta_description'=>'',
            'status'=>1,
            'created_at'=>'2020-04-07 21:10:27',
            'updated_at'=>'2020-04-07 21:10:27',
            'clinic_id'=>NULL,
            'email'=>'mohamedashmway@andalusiagroup.net',
            'phone'=>'50016',
            'price'=>'75',
            'duration'=>'15',
            'speciality_id'=>13,
            'gender'=>'male'
        ] );



        Doctor::create( [
            'id'=>17,
            'title'=>'منصور عبد الله',
            'slug'=>'منصور-عبد-الله',
            'description'=>'ماجستير في طب الأطفال - الفحص الشامل بعد الولادة- متابعة وعلاج الصفراء لحديثي الولادة- مشاكل الرضاعة- أمراض الجهاز التنفسي والهضمي لحديثي الولادة - التهاب الشعب الهوائية والالتهاب الرئوي - الحساسية والربو- الكحة المزمنة - الحمى الروماتيزمية على القلب- الالتهاب الكبدي- التهاب الكلى- تطعيمات الأطفال ',
            'position'=>'أخصائي',
            'speciality'=>'أخصائى طب الأطفال',
            'photo'=>'doctors\\Appdoctorphotos\\Mansour-Abdullah.jpg',
            'meta_keywords'=>'',
            'meta_description'=>'',
            'status'=>1,
            'created_at'=>'2020-04-07 21:10:27',
            'updated_at'=>'2020-04-07 21:10:27',
            'clinic_id'=>NULL,
            'email'=>'MANSOR.ABDULLAH@andalusiagroup.net',
            'phone'=>'50017',
            'price'=>'75',
            'duration'=>'15',
            'speciality_id'=>14,
            'gender'=>'male'
        ] );



        Doctor::create( [
            'id'=>18,
            'title'=>'ميرفت عبد الحميد',
            'slug'=>'ميرفت-عبد-الحميد',
            'description'=>'ماجستير في طب الأطفال - الفحص الشامل بعد الولادة- متابعة وعلاج الصفراء لحديثي الولادة- مشاكل الرضاعة- أمراض الجهاز التنفسي والهضمي لحديثي الولادة - التهاب الشعب الهوائية والالتهاب الرئوي - الحساسية والربو- الكحة المزمنة - الحمى الروماتيزمية على القلب- الالتهاب الكبدي- التهاب الكلى- تطعيمات الأطفال',
            'position'=>'أخصائي',
            'speciality'=>'أخصائى طب الأطفال',
            'photo'=>'doctors\\Appdoctorphotos\\Mervat-AbdElhamid.jpg',
            'meta_keywords'=>'',
            'meta_description'=>'',
            'status'=>1,
            'created_at'=>'2020-04-07 21:10:27',
            'updated_at'=>'2020-04-07 21:10:27',
            'clinic_id'=>NULL,
            'email'=>'MERVAT.DEGHED@andalusiagroup.net',
            'phone'=>'50018',
            'price'=>'75',
            'duration'=>'15',
            'speciality_id'=>14,
            'gender'=>'female'
        ] );



        Doctor::create( [
            'id'=>19,
            'title'=>'محمد إفريج',
            'slug'=>'محمد-إفريج',
            'description'=>'أخصائي اول المسالك البوليه -  ماجستير  في جراحة المسالك البوليه -علاج حصوات الكلى وتفتيتها وحصوات المسالك البولية -مناظير الجهاز البولي (الكلى – الحالب - المثانية) -العيوب الخلقية في الكلى والحالب والمثانة -ضيق وانسداد مجرى البول -المغص الكلوي المتكرر -أورام الجهاز البولي التناسلي-سلس البول والبول الدومي - أمراض الذكورة والعقم والعجز الجنسي عند الرجال -علاج أمراض البروستاتا والكشف الدوري- تفتيت الحصوات عن طريق جهاز الموجات التصادمية -تفتيت حصوات الكلى بالليزر عن طريق منظار الكلى -تفتيت حصوات المثانة باستخدام المفتت الهوائي والليزر -تفتيت حصوات الحالب باستخدام المفتت الهوائي الكلوي-وحدة مسالك الأطفال-علاج تشوهات الجهاز البولي التناسلي للأطفال-تصليح فتحة مجرى البول- تصليح إعوجاج القضيب-تصليح ضيق حوض الكلى-تصليح الارتجاع البولي من المثانة للحالب جراحياً وبدون جراحة .بمستشفى حي الجامعة',
            'position'=>'استشاري',
            'speciality'=>'استشاري المسالك البولية',
            'photo'=>'doctors\\Appdoctorphotos\\Mohammed-Efrieg.jpg',
            'meta_keywords'=>'',
            'meta_description'=>'',
            'status'=>1,
            'created_at'=>'2020-04-07 21:10:27',
            'updated_at'=>'2020-04-07 21:10:27',
            'clinic_id'=>NULL,
            'email'=>'Mohamed.Efrieg@andalusiagroup.net',
            'phone'=>'50019',
            'price'=>'150',
            'duration'=>'15',
            'speciality_id'=>15,
            'gender'=>'male'
        ] );



        Doctor::create( [
            'id'=>20,
            'title'=>'رانيا الباز',
            'slug'=>'رانيا-الباز',
            'description'=>'استشاري الامراض النفسية -دكتوراه في الامراض النفسيه -استشارات نفسية -متابعة مرضي الاكتئاب و الزهايمر-أضطرابات المزاج  -اكتئاب الحمل و ما بعد الولادة  -التدريب على تنمية مهارات أولياء الامور-العلاج السلوكي -التدريب على المهارات الاجتماعية. بمستشفى حي الجامعة',
            'position'=>'استشاري',
            'speciality'=>'استشارى أمراض النفسية',
            'photo'=>'doctors\\Appdoctorphotos\\Rania-Elbaz.jpg',
            'meta_keywords'=>'',
            'meta_description'=>'',
            'status'=>1,
            'created_at'=>'2020-04-07 21:10:27',
            'updated_at'=>'2020-04-07 21:10:27',
            'clinic_id'=>NULL,
            'email'=>'Rania.ELBaz@andalusiagroup.com',
            'phone'=>'50020',
            'price'=>'150',
            'duration'=>'15',
            'speciality_id'=>16,
            'gender'=>'female'
        ] );



        Doctor::create( [
            'id'=>21,
            'title'=>'أهداف عنان',
            'slug'=>'أهداف-عنان',
            'description'=>'',
            'position'=>'استشاري',
            'speciality'=>'استشارى الأمراض الصدرية',
            'photo'=>'doctors\\Appdoctorphotos\\Ahdaf-Anan.jpg',
            'meta_keywords'=>'',
            'meta_description'=>'',
            'status'=>1,
            'created_at'=>'2020-04-07 21:10:27',
            'updated_at'=>'2020-04-07 21:10:27',
            'clinic_id'=>NULL,
            'email'=>'AHDAF.ANNAN@andalusiagroup.net',
            'phone'=>'50021',
            'price'=>'150',
            'duration'=>'15',
            'speciality_id'=>17,
            'gender'=>'female'
        ] );



        Doctor::create( [
            'id'=>22,
            'title'=>'نبيل هيبة',
            'slug'=>'نبيل-هيبة',
            'description'=>'',
            'position'=>'استشاري',
            'speciality'=>'استشارى الأمراض الصدرية',
            'photo'=>'doctors\\Appdoctorphotos\\Nabil-Heba.jpg',
            'meta_keywords'=>'',
            'meta_description'=>'',
            'status'=>1,
            'created_at'=>'2020-04-07 21:10:27',
            'updated_at'=>'2020-04-07 21:10:27',
            'clinic_id'=>NULL,
            'email'=>'NABIL.HIBAH@andalusiagroup.net',
            'phone'=>'50022',
            'price'=>'150',
            'duration'=>'15',
            'speciality_id'=>17,
            'gender'=>'female'
        ] );
//        _________________________End________Seed doctor Table___________________________________________________________________________

//        _________________________Start________Seed menus Table___________________________________________________________________________

        Menu::create( [
            'id'=>1,
            'name'=>'admin',
            'created_at'=>'2020-04-01 06:26:52',
            'updated_at'=>'2020-04-01 06:26:52'
        ] );

        Menu::create( [
            'id'=>2,
            'name'=>'site',
            'created_at'=>'2020-04-01 06:26:52',
            'updated_at'=>'2020-04-01 06:26:52'
        ] );
//        _________________________End________Seed menus Table___________________________________________________________________________

//        _________________________Start________Seed MenuItems Table___________________________________________________________________________
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
            'id'=>68,
            'menu_id'=>1,
            'title'=>'Doctors',
            'url'=>'',
            'target'=>'_self',
            'icon_class'=>'voyager-activity',
            'color'=>NULL,
            'parent_id'=>67,
            'order'=>1,
            'created_at'=>'2020-04-01 06:26:54',
            'updated_at'=>'2020-04-01 06:26:54',
            'route'=>'voyager.doctors.index',
            'parameters'=>NULL
        ] );



        Menuitem::create( [
            'id'=>69,
            'menu_id'=>1,
            'title'=>'Working Hours',
            'url'=>'',
            'target'=>'_self',
            'icon_class'=>'voyager-receipt',
            'color'=>NULL,
            'parent_id'=>67,
            'order'=>2,
            'created_at'=>'2020-04-01 06:26:54',
            'updated_at'=>'2020-04-01 06:26:54',
            'route'=>'voyager.workinghours.index',
            'parameters'=>NULL
        ] );



        Menuitem::create( [
            'id'=>70,
            'menu_id'=>1,
            'title'=>'Appointments',
            'url'=>'',
            'target'=>'_self',
            'icon_class'=>'voyager-alarm-clock',
            'color'=>NULL,
            'parent_id'=>67,
            'order'=>3,
            'created_at'=>'2020-04-01 06:26:55',
            'updated_at'=>'2020-04-01 06:26:55',
            'route'=>'voyager.appointments.index',
            'parameters'=>NULL
        ] );



        Menuitem::create( [
            'id'=>71,
            'menu_id'=>1,
            'title'=>'Specialities',
            'url'=>'',
            'target'=>'_self',
            'icon_class'=>'voyager-certificate',
            'color'=>NULL,
            'parent_id'=>67,
            'order'=>4,
            'created_at'=>'2020-04-01 06:26:55',
            'updated_at'=>'2020-04-01 06:26:55',
            'route'=>'voyager.specialities.index',
            'parameters'=>NULL
        ] );
        

        Menuitem::create( [
            'menu_id'=>1,
            'title'=>'Partners',
            'url'=>'',
            'target'=>'_self',
            'icon_class'=>'voyager-photos',
            'color'=>'#000000',
            'parent_id'=>NULL,
            'order'=>8,
            'created_at'=>'2020-02-09 12:51:57',
            'updated_at'=>'2020-02-09 12:53:59',
            'route'=>'voyager.partners.index',
            'parameters'=>NULL
        ] );

        Menuitem::create( [
            'menu_id'=>1,
            'title'=>'Testimonials',
            'url'=>'',
            'target'=>'_self',
            'icon_class'=>'voyager-people',
            'color'=>'#000000',
            'parent_id'=>NULL,
            'order'=>9,
            'created_at'=>'2020-02-09 12:51:57',
            'updated_at'=>'2020-02-09 12:53:59',
            'route'=>'voyager.testimonials.index',
            'parameters'=>NULL
        ] );

        Menuitem::create( [
            'menu_id'=>1,
            'title'=>'Selling points',
            'url'=>'',
            'target'=>'_self',
            'icon_class'=>'voyager-shop',
            'color'=>'#000000',
            'parent_id'=>NULL,
            'order'=>10,
            'created_at'=>'2020-02-09 12:51:57',
            'updated_at'=>'2020-02-09 12:53:59',
            'route'=>'voyager.selling-points.index',
            'parameters'=>NULL
        ] );

        Menuitem::create( [
            'menu_id'=>1,
            'title'=>'journeys',
            'url'=>'',
            'target'=>'_self',
            'icon_class'=>'voyager-images',
            'color'=>'#000000',
            'parent_id'=>NULL,
            'order'=>11,
            'created_at'=>'2020-02-09 12:51:57',
            'updated_at'=>'2020-02-09 12:53:59',
            'route'=>'voyager.journeys.index',
            'parameters'=>NULL
        ] );



//        _________________________End________Seed menuitems Table___________________________________________________________________________

        //        _________________________Start________Seed pages Table___________________________________________________________________________

        Page::create( [
            'id'=>1,
            'author_id'=>0,
            'title'=>'Hello World',
            'excerpt'=>'Hang the jib grog grog blossom grapple dance the hempen jig gangway pressgang bilge rat to go on account lugger. Nelsons folly gabion line draught scallywag fire ship gaff fluke fathom case shot. Sea Legs bilge rat sloop matey gabion long clothes run a shot across the bow Gold Road cog league.',
            'body'=>'

Hello World. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.

\n
Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.

',
            'image'=>'pages/page1.jpg',
            'slug'=>'hello-world',
            'meta_description'=>'Yar Meta Description',
            'meta_keywords'=>'Keyword1, Keyword2',
            'status'=>'ACTIVE',
            'created_at'=>'2020-04-01 06:26:54',
            'updated_at'=>'2020-04-01 06:26:54'
        ] );
        //        _________________________End________Seed pages Table___________________________________________________________________________

        //        _________________________Start________Seed post Table___________________________________________________________________________
        Post::create( [
            'id'=>1,
            'author_id'=>1,
            'category_id'=>2,
            'title'=>'عملية تغيير مفصل الركبة',
            'seo_title'=>'عملية تغيير مفصل الركبة',
            'excerpt'=>'تعتبر من أدق عمليات العظام التي تحتاج للخبرة والمهارة في إجراءها لتجنب حدوث أي مضاعفات، ويتم إجراء هذة العملية نتيجة تعرض المفصل للضرر الشديد',
            'body'=>'

عملية تغيير مفصل الركبة

\n
عملية تغيير مفصل الركبة
\n
تعتبر من أدق عمليات العظام التي تحتاج للخبرة والمهارة في إجراءها لتجنب حدوث أي مضاعفات، ويتم إجراء هذة العملية نتيجة تعرض المفصل للضرر الشديد أو للتآكل مما يسبب آلام قوية يصعب تحملها وتؤدي لصعوبة في الحركة، وهنا العملية هي الحل الأمثل للتخلص من هذه الآلام المزعجة وامتلاك القدرة على ممارسة الأنشطة اليومية بسهولة.

\n
تحتاج هذة العملية لإجراء الكثير من الفحوصات والتحاليل قبل العملية للتأكد من أنها الحل المناسب والأخير للقضاء على آلام الركبة والقدرة على الحركة بشكل سليم.

\n
وفي العملية يتم استبدال المفصل الطبيعي بآخر صناعي مصنوع من التيتانيوم أو البلاستيك القوي، ويتم إجراءها تحت تأثير التخدير الموضعي أو الكلي حسب ما يحدده الطبيب.

\n
تنقسم عملية تغيير المفصل إلى نوعين وهما :-
\n
- تغيير كلي لمفصل الركبة.

\n
حيث يتم تغيير المفصل بالكامل نتيجة حدوث تضرر أو تآكل المفصل بالكامل.

\n
- تغيير جزئي لمفصل الركبة.

\n
حيث يتم تغيير الجزء المتضرر فقط من المفصل، وذلك ضمن شروط معينة وهي:-

\n
- أن يكون الرباط الصليبي الأمامي سليمًا.

\n
- وأن يكون النصف الخارجي من المفصل سليمًا.

\n
- أن يكون مقدار الاعوجاج أقل من 15 درجة.

\n
6 أسباب لإجراء عملية مفصل الركبة :
\n
يلجأ الطبيب لإجراء تغيير المفصل الركبة للحالات التي لا تتحمل الآلام والضغط على الركبة ومن هذه الحالات:-

\n
1- هشاشة العظام:

\n
وتعتبر هشاشة العظام من الأسباب الرئيسية لإجراء العملية حيث يصبح المفصل ضعيف وهش غير قادر على تحمل المزيد من الضغط عليه.

\n
2- خشونة الركبة:

\n
الخشونة هي تآكل لغضروف الركبة ومن ثم تآكل المفصل نفسه وفي الحالات المتقدمة يصبح المفصل غير قادر على امتصاص الصدمات مما يعوق الحركة بشكل كبير أو يمنعها نسبياً.

\n
3- زيادة الوزن:

\n
تشكل السمنة خطراً  كبيراً على مفصل الركبة لأن الوزن الزائد يؤدي إلى زيادة الضغط على المفصل و

\n
تآكل الغضروف.

\n
4- الإصابات الخارجية:

\n
كالإصابات التي تحدث في الملاعب أو إصابات الحوادث والكسور.

\n
5- الاستئصال الجزئي للغضروف المفصلي للركبة:

\n
بعد هذا الاستئصال يفقد المفصل قدرته على امتصاص الصدمات فقد تحتاج بعض الحالات حينها لاستبدال المفصل.

\n
6- التهاب المفاصل الروماتويدي:

\n
تسبب الالتهابات الروماتويدية آلام شديدة لا تُحتمل في المفاصل وقد تؤدي في النهاية إلى تشوه كامل في المفصل فيضطر الطبيب لإجراء عملية تبديل مفصل الركبة.

\n
علامات تستدعي إجراء عملية تغيير مفصل الركبة :-
\n
- حدوث تآكل في مفصل أو غضروف الركبة.

\n
- آلام شديدة في الركبة وتظهر خاصة في أوقات الراحة وأثناء النوم ليلاً.

\n
- التيبس والتصلب في مفصل الركبة لأنه يسبب صعوبة في ممارسة الأنشطة اليومية كصعوبة في ارتداء الملابس أو الأحذية وغيرها من الأنشطة اليومية المعتادة.

\n
- صعوبة في المشي.

\n
- محدودية الحركة وعدم قيام المفصل بأداء وظيفته كاملة. "عملية

\n
4 خطوات هامة قبل عـملية تغيير مـفصل الركبة:-
\n
قبل إجراء عملية تبديل مفصل الركبة يقوم الطبيب بتحديد الفحوصات والتحاليل التي يحتاجها المريض وهي:-

\n
- إجراء أشعة رنين مغناطيسي أو أشعة سينية على الركبة.

\n
- إجراء تحاليل للدم كصورة دم كاملة، وتخثر الدم، وكيمياء الدم، ووظائف الكلى والكبد.

\n
- إجراء فحص البول.

\n
- إجراء تخطيط كهربية القلب (رسم القلب).

\n
وإذا كان المريض يتناول أدوية معينة يحدد الطبيب الأدوية التي يجب التوقف عن تناولها قبل العملية.

\n
هل تظهر مضاعفات بعد عملية تغيير مفصل الركبة
\n
في بعض الحالات قد تظهر بعض المضاعفات مثل:

\n
- حدوث تورم والتهابات وآلام في المفصل.

\n
- التعرض لكسور في عظام الركبة.

\n
- حدوث تصلب في مفصل الركبة.

\n
- حدوث ضرر في العصب أو العضلات.

\n
ولكن هناك بعض الشروط التي قد تحميك من هذه المضاعفات وتساعد في نجاح عملية تبديل مفصل الركبة وهي..

\n
- إجراء العملية تحت إشراف طبيب عظام ماهر ومتخصص وله خبرة في إجراء عملية تبديل مفصل الركبة لمرات عديدة.

\n
- التأكد من جودة نوع المفصل المستخدم.

\n
- التخلص من الوزن الزائد قبل إجراء الجراحة.

\n
- عمل جلسات علاج طبيعي بعد إجراء الجراحة.

\n
-اتباع تعليمات الطبيب للحفاظ على المفصل لأطول فترة ممكنة.

\n
أهمية العلاج الطبيعي بعد عملية تغيير مفصل الركبة :-
\n
- يعد العلاج الطبيعي من أهم خطوات التعافي بعد عملية تبديل مفصل الركبة، وللحفاظ على مفصل الركبة الذي تم استبداله.

\n
- يعمل العلاج الطبيعي على تقوية عضلات الساق الضعيفة، لأن قوة العضلات تساعد في تخفيف ضغط وزن الجسم على مفاصل الركبة.

\n
بعد عملية تبديل مفصل الركبة تعرف على أنواع تمارين العلاج الطبيعي
\n
تتنوع تمارين العلاج الطبيعي لتناسب تفاصيل كل حالة ومن هذه التمارين..

\n
- العلاج المائي، لعلاج آلام العضلات الناتجة عن إجراء الجراحة، والشعور بالراحة والاسترخاء.

\n
- تمارين التوازن والإطالة والتقوية.

\n
- استخدام النبضات الكهربائية لتنشيط وتقوية العضلات.

\n
- استخدام الأشعة تحت الحمراء لتخفيف الألم والالتهابات، حيث أن حرارتها تساعد على توسيع الأوعية الدموية التي تخفف من الشعور بالألم بشكل كبير.

\n
- تدليك الأنسجة العميقة للتخفيف من تشنجات العضلات وتقليل الالتهابات.

\n
- العلاج بالترددات الاهتزازية لتقوية العضلات وزيادة نشاط الأعصاب.

\n
نصائح هامة بعد العملية :-
\n
- الراحة التامة في الفراش ووضع الساق في خط مستقيم لتسهيل تدفق الدم والتخفيف من الألم.

\n
- الانتظام في تناول الأدوية كما يصفها الطبيب لتمام التعافي من آثار العملية.

\n
- استخدام كمادات الثلج على مفصل الركبة في البداية بعد إجراء عملية تبديل مفصل الركبة، فالثلج يساعد على تخدير منطقة المفصل وبالتالي تقليل الشعور بالألم والتخفيف من الالتهابات.

\n
- بعد التئام الجرح يمكن استخدام كمادات المياه الساخنة للتخفيف من الألم وزيادة الشعور بالراحة والاسترخاء.

\n
- يمكن استخدام العكاز أو الكرسي المتحرك مؤقتاً خلال الأيام الأولى من إجراء الجراحة عند القيام بأي نشاط معين، وذلك لتجنب زيادة الضغط على المفصل أثناء المشي أو الجلوس.

\n
- الانتظام في عمل جلسات العلاج الطبيعي.

\n
- الالتزام بممارسة التمارين المنزلية التي يحددها الطبيب بانتظام للحفاظ على سلامة مفصل الركبة لأطول فترة ممكنة.

\n
- تجنب ثني الركبة أثناء الجلوس أو القفز خلال الأسابيع الأولى من إجراء عملية تبديل مفصل الركبة.

\n
- تجنب استخدام السلم لعدم الضغط علي الركبة التي تم إجراء العملية بها.

\n
- تجنب قيادة السيارة نهائياً حتى تمام التعافي من العملية والقدرة على تحريك المفصل بشكل سليم.

\n
- الالتزام بعمل الفحص الدوري لمفصل الركبة من خلال الأشعة للتأكد من أن المفصل يعمل بكفاءة وعدم وجود أي خلل في المفصل أو عظام الركبة.

\n
- النوم على سرير مرتفع للقيام من عليه بسهولة وعدم الشعور بألم.

\n
- الحفاظ على وزن الجسم لتجنب زيادة الضغط على مفصل الركبة.

\n
ومع الإلتزام بهذه النصائح وتعليمات الطبيب، يستعيد المفصل قوته وأداء وظيفته كاملة حيث يمكنك العودة لممارسة أنشطتك اليومية بسهولة ودون عناء.

\n
تعرف ايضاً علي :
\n
علاج ارتفاع الكوليسترول

\n
جلطة القلب و طرق التعامل معها.

\n
علاج اضطرابات النوم

\n
"سجل

',
            'image'=>'posts\\February2020\\V8egCZUkNuLBg6CtuDwZ.jpg',
            'slug'=>'عملية-تغيير-مفصل-الركبة',
            'meta_description'=>'تعرف الان على عملية تغيير مفصل الركبة فى السعودية وعملية تغيير مفصل الفخذ وماهي النصائح وافضل طرق للوقاية من مضاعفاتها..',
            'meta_keywords'=>'عملية تغيير مفصل الركبة',
            'status'=>'PUBLISHED',
            'featured'=>0,
            'created_at'=>'2020-02-19 08:03:12',
            'updated_at'=>'2020-02-26 13:33:00'
        ] );
        //        _________________________End________Seed Post Table___________________________________________________________________________



        //        _________________________Start________Seed post tag Table___________________________________________________________________________

        Posttag::create( [
            'id'=>1,
            'post_id'=>1,
            'tag_id'=>1,
            'created_at'=>NULL,
            'updated_at'=>NULL
        ] );
        Posttag::create( [
            'id'=>2,
            'post_id'=>1,
            'tag_id'=>2,
            'created_at'=>NULL,
            'updated_at'=>NULL
        ] );

        //        _________________________End________Seed post tag Table___________________________________________________________________________

        //        _________________________Start________Seed Seosetting Table___________________________________________________________________________
        Seosetting::create( [
            'id'=>3,
            'key'=>'title-meta.Title_Separator',
            'display_name'=>'Title Separator',
            'value'=>'|',
            'details'=>'\n            {\n    "default" : "|",\n    "options" : {\n        "-": "-",\n        "_": "_",\n        "__": "__",\n        ".": ".",\n        "*": "*",\n        "|": "|",\n        "~": "~",\n        "<": "<",\n        ">": ">",\n        "«": "«",\n        "»": "»"\n    }\n    }\n            ',
            'type'=>'select_dropdown',
            'order'=>2,
            'group'=>'Title & Meta'
        ] );



        Seosetting::create( [
            'id'=>4,
            'key'=>'title-meta.Title_template',
            'display_name'=>'Title template',
            'value'=>NULL,
            'details'=>NULL,
            'type'=>'text',
            'order'=>1,
            'group'=>'Title & Meta'
        ] );



        Seosetting::create( [
            'id'=>5,
            'key'=>'title-meta.meta_description_template',
            'display_name'=>'Meta description template',
            'value'=>NULL,
            'details'=>NULL,
            'type'=>'text_area',
            'order'=>3,
            'group'=>'Title & Meta'
        ] );



        Seosetting::create( [
            'id'=>9,
            'key'=>'social.Facebook_page_uRL',
            'display_name'=>'Facebook Page URL',
            'value'=>'http://facebook.com',
            'details'=>NULL,
            'type'=>'text',
            'order'=>5,
            'group'=>'Social'
        ] );



        Seosetting::create( [
            'id'=>10,
            'key'=>'social.Twitter_username',
            'display_name'=>'Twitter Username',
            'value'=>'http://twitter.com',
            'details'=>NULL,
            'type'=>'text',
            'order'=>6,
            'group'=>'Social'
        ] );



        Seosetting::create( [
            'id'=>11,
            'key'=>'social.Instagram_uRL',
            'display_name'=>'Instagram URL',
            'value'=>'http://instagram.com',
            'details'=>NULL,
            'type'=>'text',
            'order'=>7,
            'group'=>'Social'
        ] );



        Seosetting::create( [
            'id'=>12,
            'key'=>'social.LinkedIn_uRL',
            'display_name'=>'LinkedIn URL',
            'value'=>'http://linkedin.com',
            'details'=>NULL,
            'type'=>'text',
            'order'=>8,
            'group'=>'Social'
        ] );



        Seosetting::create( [
            'id'=>13,
            'key'=>'social.YouTube_uRL',
            'display_name'=>'YouTube URL',
            'value'=>'http://youtube.com',
            'details'=>NULL,
            'type'=>'text',
            'order'=>9,
            'group'=>'Social'
        ] );



        Seosetting::create( [
            'id'=>14,
            'key'=>'open-graph.title',
            'display_name'=>'title',
            'value'=>NULL,
            'details'=>NULL,
            'type'=>'text',
            'order'=>10,
            'group'=>'Open Graph'
        ] );



        Seosetting::create( [
            'id'=>15,
            'key'=>'open-graph.description',
            'display_name'=>'description',
            'value'=>NULL,
            'details'=>NULL,
            'type'=>'text',
            'order'=>11,
            'group'=>'Open Graph'
        ] );



        Seosetting::create( [
            'id'=>16,
            'key'=>'open-graph.url',
            'display_name'=>'url',
            'value'=>NULL,
            'details'=>NULL,
            'type'=>'text',
            'order'=>12,
            'group'=>'Open Graph'
        ] );



        Seosetting::create( [
            'id'=>17,
            'key'=>'open-graph.image',
            'display_name'=>'image',
            'value'=>'settings\\February2020\\7GifG2E3SPoOjatdYazK.jpg',
            'details'=>NULL,
            'type'=>'image',
            'order'=>13,
            'group'=>'Open Graph'
        ] );



        Seosetting::create( [
            'id'=>19,
            'key'=>'open-graph.image:secure_url',
            'display_name'=>'image:secure_url',
            'value'=>'settings\\February2020\\dfBs9bkLbAyjymF0AZ5J.jpg',
            'details'=>NULL,
            'type'=>'image',
            'order'=>14,
            'group'=>'Open Graph'
        ] );



        Seosetting::create( [
            'id'=>20,
            'key'=>'twitter.cart',
            'display_name'=>'cart',
            'value'=>NULL,
            'details'=>NULL,
            'type'=>'text',
            'order'=>15,
            'group'=>'Twitter'
        ] );



        Seosetting::create( [
            'id'=>21,
            'key'=>'twitter.title',
            'display_name'=>'title',
            'value'=>NULL,
            'details'=>NULL,
            'type'=>'text',
            'order'=>16,
            'group'=>'Twitter'
        ] );



        Seosetting::create( [
            'id'=>22,
            'key'=>'twitter.description',
            'display_name'=>'description',
            'value'=>NULL,
            'details'=>NULL,
            'type'=>'text',
            'order'=>17,
            'group'=>'Twitter'
        ] );



        Seosetting::create( [
            'id'=>23,
            'key'=>'twitter.site',
            'display_name'=>'site',
            'value'=>NULL,
            'details'=>NULL,
            'type'=>'text',
            'order'=>18,
            'group'=>'Twitter'
        ] );



        Seosetting::create( [
            'id'=>24,
            'key'=>'twitter.image',
            'display_name'=>'image',
            'value'=>'settings\\February2020\\BNMlDDtOFWtAWA76EuZF.jpg',
            'details'=>NULL,
            'type'=>'image',
            'order'=>19,
            'group'=>'Twitter'
        ] );


        //        _________________________End________Seed Seosetting Table___________________________________________________________________________

        //        _________________________Start________Seed services Table___________________________________________________________________________
        Service::create( [
            'id'=>1,
            'title'=>'وحدة قسطرة القلب',
            'slug'=>'وحدة-قسطرة-القلب',
            'small_description'=>'حرصاً من مستشفى حي الجامعة على تقديم أفضل الرعاية الطبية الدقيقة للمرضى، تشمل رعايتنا توفير وحدة خاصة بقسطرة القلب تم تأسيسها من أجل تقديم العناية والاهتمام المطلوبين للحالات التي تحتاج إلى قسطرة القلب، وذلك من خلال توفير عدد كافي من الأسرة بالمستشفى بالإضافة إلى أحدث وأدق الأجهزة والتقنيات اللازمة لرعاية المريض ومتابعته أثناء وبعد إجراء القسطرة.',
            'description'=>'

حرصاً من مستشفى حي الجامعة على تقديم أفضل الرعاية الطبية الدقيقة للمرضى، تشمل رعايتنا توفير وحدة خاصة بقسطرة القلب تم تأسيسها من أجل تقديم العناية والاهتمام المطلوبين للحالات التي تحتاج إلى قسطرة القلب، وذلك من خلال توفير عدد كافي من الأسرة بالمستشفى بالإضافة إلى أحدث وأدق الأجهزة والتقنيات اللازمة لرعاية المريض ومتابعته أثناء وبعد إجراء القسطرة.

\n
وتوفر مستشفى حي الجامعة أيضاً العناية والرعاية اللازمة للمريض بعد إجراء قسطرة القلب، حيث يجب نقل المريض بعدها إلى غرفة رعاية مركزة ليخضع للملاحظة لمدة من الزمن يحددها الطبيب الخاص، يتم ملاحظة معدل ضربات القلب وقياس ضغط الدم بانتظام، وتوفير مراقبة مستمرة للمؤشرات الحيوية للقلب حتى يتعافى المريض.

',
            'photo'=>'services/10Cardiology.jpg',
            'meta_keywords'=>'',
            'meta_description'=>'',
            'status'=>1,
            'created_at'=>'2020-01-29 06:10:00',
            'updated_at'=>'2020-02-05 11:48:04'
        ] );


        //        _________________________End________Seed services Table___________________________________________________________________________

        //        _________________________Start________Seed Settings Table___________________________________________________________________________

        Setting::create( [
            'id'=>5,
            'key'=>'admin.bg_image',
            'display_name'=>'Admin Background Image',
            'value'=>'settings\\December2019\\uwHa7tePgQ7T8DsDm1VO.jpg',
            'details'=>'',
            'type'=>'image',
            'order'=>5,
            'group'=>'Admin'
        ] );



        Setting::create( [
            'id'=>8,
            'key'=>'admin.loader',
            'display_name'=>'Admin Loader',
            'value'=>'settings\\December2019\\aoMDezpMVFGX2Xfj4AvD.png',
            'details'=>'',
            'type'=>'image',
            'order'=>3,
            'group'=>'Admin'
        ] );



        Setting::create( [
            'id'=>9,
            'key'=>'admin.icon_image',
            'display_name'=>'Admin Icon Image',
            'value'=>'settings\\December2019\\TA2m2BERw1japFLiKb0S.png',
            'details'=>'',
            'type'=>'image',
            'order'=>4,
            'group'=>'Admin'
        ] );



        Setting::create( [
            'id'=>12,
            'key'=>'site.address_ar',
            'display_name'=>'Address Arabic',
            'value'=>'Elmhafza',
            'details'=>NULL,
            'type'=>'text',
            'order'=>7,
            'group'=>'Site'
        ] );



        Setting::create( [
            'id'=>13,
            'key'=>'site.address_en',
            'display_name'=>'Address English',
            'value'=>'aa',
            'details'=>NULL,
            'type'=>'text',
            'order'=>9,
            'group'=>'Site'
        ] );



        Setting::create( [
            'id'=>14,
            'key'=>'site.phone',
            'display_name'=>'phone',
            'value'=>'01126697538',
            'details'=>NULL,
            'type'=>'text',
            'order'=>8,
            'group'=>'Site'
        ] );



        Setting::create( [
            'id'=>15,
            'key'=>'site.facebook',
            'display_name'=>'FaceBook',
            'value'=>'facebook.com',
            'details'=>NULL,
            'type'=>'text',
            'order'=>10,
            'group'=>'Site'
        ] );




        Setting::create( [
            'id'=>22,
            'key'=>'home.Planning',
            'display_name'=>'Planning',
            'value'=>'settings\\January2020\\NJQ1neyWoaqGQ1UjQzE1.png',
            'details'=>NULL,
            'type'=>'image',
            'order'=>16,
            'group'=>'home'
        ] );



        Setting::create( [
            'id'=>23,
            'key'=>'home.Build',
            'display_name'=>'Build',
            'value'=>'settings\\January2020\\LexhiWNqEE9ZhWGrJ8A4.png',
            'details'=>NULL,
            'type'=>'image',
            'order'=>17,
            'group'=>'home'
        ] );



        Setting::create( [
            'id'=>24,
            'key'=>'home.Our_Work_1',
            'display_name'=>'Our Work 1',
            'value'=>'settings\\January2020\\Szv9f79pN5hMK0Iu2mai.jpg',
            'details'=>NULL,
            'type'=>'image',
            'order'=>18,
            'group'=>'home'
        ] );



        Setting::create( [
            'id'=>25,
            'key'=>'home.Our_Work_2',
            'display_name'=>'Our Work 2',
            'value'=>'settings\\January2020\\UmD0BeZQfn3cGeNbwLKm.jpg',
            'details'=>NULL,
            'type'=>'image',
            'order'=>19,
            'group'=>'home'
        ] );



        Setting::create( [
            'id'=>26,
            'key'=>'home.Our_Work_3',
            'display_name'=>'Our Work 3',
            'value'=>'settings\\January2020\\v9ZiHGxNC4XZumvUqkU8.jpg',
            'details'=>NULL,
            'type'=>'image',
            'order'=>20,
            'group'=>'home'
        ] );



        Setting::create( [
            'id'=>34,
            'key'=>'site.title_ar',
            'display_name'=>'title',
            'value'=>'www',
            'details'=>NULL,
            'type'=>'text',
            'order'=>21,
            'group'=>'Site'
        ] );



        Setting::create( [
            'id'=>35,
            'key'=>'site.title_en',
            'display_name'=>'title EN',
            'value'=>'www',
            'details'=>NULL,
            'type'=>'text',
            'order'=>22,
            'group'=>'Site'
        ] );



        Setting::create( [
            'id'=>36,
            'key'=>'site.description_ar',
            'display_name'=>'description Ar',
            'value'=>'www',
            'details'=>NULL,
            'type'=>'text_area',
            'order'=>23,
            'group'=>'Site'
        ] );



        Setting::create( [
            'id'=>37,
            'key'=>'site.description_en',
            'display_name'=>'description En',
            'value'=>NULL,
            'details'=>NULL,
            'type'=>'text_area',
            'order'=>24,
            'group'=>'Site'
        ] );



        Setting::create( [
            'id'=>38,
            'key'=>'site.logo',
            'display_name'=>'logo',
            'value'=>'settings\\January2020\\TvNmuG4QHsS2wSfN2iiN.jpg',
            'details'=>NULL,
            'type'=>'image',
            'order'=>25,
            'group'=>'Site'
        ] );



        Setting::create( [
            'id'=>39,
            'key'=>'site.ahmed',
            'display_name'=>'ahmed',
            'value'=>NULL,
            'details'=>NULL,
            'type'=>'text',
            'order'=>26,
            'group'=>'Site'
        ] );



        Setting::create( [
            'id'=>41,
            'key'=>'site.fav',
            'display_name'=>'fav',
            'value'=>'settings\\February2020\\2FZbQZs2EdsFgSzNgeVS.jpg',
            'details'=>NULL,
            'type'=>'image',
            'order'=>27,
            'group'=>'Site'
        ] );



        Setting::create( [
            'id'=>42,
            'key'=>'site.title_meta_data',
            'display_name'=>'Meta Data',
            'value'=>NULL,
            'details'=>NULL,
            'type'=>'text',
            'order'=>28,
            'group'=>'Site'
        ] );



        Setting::create( [
            'id'=>43,
            'key'=>'site.desc',
            'display_name'=>'123123',
            'value'=>NULL,
            'details'=>NULL,
            'type'=>'text_area',
            'order'=>29,
            'group'=>'Site'
        ] );



        Setting::create( [
            'id'=>44,
            'key'=>'.description Ar',
            'display_name'=>'description Ar',
            'value'=>NULL,
            'details'=>NULL,
            'type'=>'text_area',
            'order'=>30,
            'group'=>NULL
        ] );



        Setting::create( [
            'id'=>46,
            'key'=>'site.terms',
            'display_name'=>'terms',
            'value'=>'

Welcome to Website Name!

\r\n
These terms and conditions outline the rules and regulations for the use of Company Name\'s Website, located at Website.com.

\r\n
By accessing this website we assume you accept these terms and conditions. Do not continue to use Website Name if you do not agree to take all of the terms and conditions stated on this page.

\r\n
The following terminology applies to these Terms and Conditions, Privacy Statement and Disclaimer Notice and all Agreements: “Client”, “You” and “Your” refers to you, the person log on this website and compliant to the Company\'s terms and conditions. “The Company”, “Ourselves”, “We”, “Our” and “Us”, refers to our Company. “Party”, “Parties”, or “Us”, refers to both the Client and ourselves. All terms refer to the offer, acceptance and consideration of payment necessary to undertake the process of our assistance to the Client in the most appropriate manner for the express purpose of meeting the Client\'s needs in respect of provision of the Company\'s stated services, in accordance with and subject to, prevailing law of Netherlands. Any use of the above terminology or other words in the singular, plural, capitalization and/or he/she or they, are taken as interchangeable and therefore as referring to same.

\r\n
Cookies
\r\n
We employ the use of cookies. By accessing Website Name, you agreed to use cookies in agreement with the Company Name\'s Privacy Policy.

\r\n
Most interactive websites use cookies to let us retrieve the user\'s details for each visit. Cookies are used by our website to enable the functionality of certain areas to make it easier for people visiting our website. Some of our affiliate/advertising partners may also use cookies.

\r\n
License
\r\n
Unless otherwise stated, Company Name and/or its licensors own the intellectual property rights for all material on Website Name. All intellectual property rights are reserved. You may access this from Website Name for your own personal use subjected to restrictions set in these terms and conditions.

\r\n
You must not:

\r\n
\r\n
Republish material from Website Name
\r\n
Sell, rent or sub-license material from Website Name
\r\n
Reproduce, duplicate or copy material from Website Name
\r\n
Redistribute content from Website Name
\r\n
\r\n
This Agreement shall begin on the date hereof.

\r\n
Parts of this website offer an opportunity for users to post and exchange opinions and information in certain areas of the website. Company Name does not filter, edit, publish or review Comments prior to their presence on the website. Comments do not reflect the views and opinions of Company Name,its agents and/or affiliates. Comments reflect the views and opinions of the person who post their views and opinions. To the extent permitted by applicable laws, Company Name shall not be liable for the Comments or for any liability, damages or expenses caused and/or suffered as a result of any use of and/or posting of and/or appearance of the Comments on this website.

\r\n
Company Name reserves the right to monitor all Comments and to remove any Comments which can be considered inappropriate, offensive or causes breach of these Terms and Conditions.

\r\n
You warrant and represent that:

\r\n
\r\n
You are entitled to post the Comments on our website and have all necessary licenses and consents to do so;
\r\n
The Comments do not invade any intellectual property right, including without limitation copyright, patent or trademark of any third party;
\r\n
The Comments do not contain any defamatory, libelous, offensive, indecent or otherwise unlawful material which is an invasion of privacy
\r\n
The Comments will not be used to solicit or promote business or custom or present commercial activities or unlawful activity.
\r\n
\r\n
You hereby grant Company Name a non-exclusive license to use, reproduce, edit and authorize others to use, reproduce and edit any of your Comments in any and all forms, formats or media.

\r\n
Hyperlinking to our Content
\r\n
The following organizations may link to our Website without prior written approval:

\r\n
\r\n
Government agencies;
\r\n
Search engines;
\r\n
News organizations;
\r\n
Online directory distributors may link to our Website in the same manner as they hyperlink to the Websites of other listed businesses; and
\r\n
System wide Accredited Businesses except soliciting non-profit organizations, charity shopping malls, and charity fundraising groups which may not hyperlink to our Web site.
\r\n
\r\n
These organizations may link to our home page, to publications or to other Website information so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products and/or services; and (c) fits within the context of the linking party\'s site.

\r\n
We may consider and approve other link requests from the following types of organizations:

\r\n
\r\n
commonly-known consumer and/or business information sources;
\r\n
dot.com community sites;
\r\n
associations or other groups representing charities;
\r\n
online directory distributors;
\r\n
internet portals;
\r\n
accounting, law and consulting firms; and
\r\n
educational institutions and trade associations.
\r\n
\r\n
We will approve link requests from these organizations if we decide that: (a) the link would not make us look unfavorably to ourselves or to our accredited businesses; (b) the organization does not have any negative records with us; (c) the benefit to us from the visibility of the hyperlink compensates the absence of Company Name; and (d) the link is in the context of general resource information.

\r\n
These organizations may link to our home page so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products or services; and (c) fits within the context of the linking party\'s site.

\r\n
If you are one of the organizations listed in paragraph 2 above and are interested in linking to our website, you must inform us by sending an e-mail to Company Name. Please include your name, your organization name, contact information as well as the URL of your site, a list of any URLs from which you intend to link to our Website, and a list of the URLs on our site to which you would like to link. Wait 2-3 weeks for a response.

\r\n
Approved organizations may hyperlink to our Website as follows:

\r\n
\r\n
By use of our corporate name; or
\r\n
By use of the uniform resource locator being linked to; or
\r\n
By use of any other description of our Website being linked to that makes sense within the context and format of content on the linking party\'s site.
\r\n
\r\n
No use of Company Name\'s logo or other artwork will be allowed for linking absent a trademark license agreement.

\r\n
iFrames
\r\n
Without prior approval and written permission, you may not create frames around our Webpages that alter in any way the visual presentation or appearance of our Website.

\r\n
Content Liability
\r\n
We shall not be hold responsible for any content that appears on your Website. You agree to protect and defend us against all claims that is rising on your Website. No link(s) should appear on any Website that may be interpreted as libelous, obscene or criminal, or which infringes, otherwise violates, or advocates the infringement or other violation of, any third party rights.

\r\n
Reservation of Rights
\r\n
We reserve the right to request that you remove all links or any particular link to our Website. You approve to immediately remove all links to our Website upon request. We also reserve the right to amen these terms and conditions and it\'s linking policy at any time. By continuously linking to our Website, you agree to be bound to and follow these linking terms and conditions.

\r\n
Removal of links from our website
\r\n
If you find any link on our Website that is offensive for any reason, you are free to contact and inform us any moment. We will consider requests to remove links but we are not obligated to or so or to respond to you directly.

\r\n
We do not ensure that the information on this website is correct, we do not warrant its completeness or accuracy; nor do we promise to ensure that the website remains available or that the material on the website is kept up to date.

\r\n
Disclaimer
\r\n
To the maximum extent permitted by applicable law, we exclude all representations, warranties and conditions relating to our website and the use of this website. Nothing in this disclaimer will:

\r\n
\r\n
limit or exclude our or your liability for death or personal injury;
\r\n
limit or exclude our or your liability for fraud or fraudulent misrepresentation;
\r\n
limit any of our or your liabilities in any way that is not permitted under applicable law; or
\r\n
exclude any of our or your liabilities that may not be excluded under applicable law.
\r\n
\r\n
The limitations and prohibitions of liability set in this Section and elsewhere in this disclaimer: (a) are subject to the preceding paragraph; and (b) govern all liabilities arising under the disclaimer, including liabilities arising in contract, in tort and for breach of statutory duty.

\r\n
As long as the website and the information and services on the website are provided free of charge, we will not be liable for any loss or damage of any nature.

',
            'details'=>NULL,
            'type'=>'rich_text_box',
            'order'=>31,
            'group'=>'Site'
        ] );


        Setting::create( [
            'id'=>47,
            'key'=>'site.consent',
            'display_name'=>'consent',
            'value'=>'

Welcome to Website Name!

\r\n
These terms and conditions outline the rules and regulations for the use of Company Name\'s Website, located at Website.com.

\r\n
By accessing this website we assume you accept these terms and conditions. Do not continue to use Website Name if you do not agree to take all of the terms and conditions stated on this page.

\r\n
The following terminology applies to these Terms and Conditions, Privacy Statement and Disclaimer Notice and all Agreements: “Client”, “You” and “Your” refers to you, the person log on this website and compliant to the Company\'s terms and conditions. “The Company”, “Ourselves”, “We”, “Our” and “Us”, refers to our Company. “Party”, “Parties”, or “Us”, refers to both the Client and ourselves. All terms refer to the offer, acceptance and consideration of payment necessary to undertake the process of our assistance to the Client in the most appropriate manner for the express purpose of meeting the Client\'s needs in respect of provision of the Company\'s stated services, in accordance with and subject to, prevailing law of Netherlands. Any use of the above terminology or other words in the singular, plural, capitalization and/or he/she or they, are taken as interchangeable and therefore as referring to same.

\r\n
Cookies
\r\n
We employ the use of cookies. By accessing Website Name, you agreed to use cookies in agreement with the Company Name\'s Privacy Policy.

\r\n
Most interactive websites use cookies to let us retrieve the user\'s details for each visit. Cookies are used by our website to enable the functionality of certain areas to make it easier for people visiting our website. Some of our affiliate/advertising partners may also use cookies.

\r\n
License
\r\n
Unless otherwise stated, Company Name and/or its licensors own the intellectual property rights for all material on Website Name. All intellectual property rights are reserved. You may access this from Website Name for your own personal use subjected to restrictions set in these terms and conditions.

\r\n
You must not:

\r\n
\r\n
Republish material from Website Name
\r\n
Sell, rent or sub-license material from Website Name
\r\n
Reproduce, duplicate or copy material from Website Name
\r\n
Redistribute content from Website Name
\r\n
\r\n
This Agreement shall begin on the date hereof.

\r\n
Parts of this website offer an opportunity for users to post and exchange opinions and information in certain areas of the website. Company Name does not filter, edit, publish or review Comments prior to their presence on the website. Comments do not reflect the views and opinions of Company Name,its agents and/or affiliates. Comments reflect the views and opinions of the person who post their views and opinions. To the extent permitted by applicable laws, Company Name shall not be liable for the Comments or for any liability, damages or expenses caused and/or suffered as a result of any use of and/or posting of and/or appearance of the Comments on this website.

\r\n
Company Name reserves the right to monitor all Comments and to remove any Comments which can be considered inappropriate, offensive or causes breach of these Terms and Conditions.

\r\n
You warrant and represent that:

\r\n
\r\n
You are entitled to post the Comments on our website and have all necessary licenses and consents to do so;
\r\n
The Comments do not invade any intellectual property right, including without limitation copyright, patent or trademark of any third party;
\r\n
The Comments do not contain any defamatory, libelous, offensive, indecent or otherwise unlawful material which is an invasion of privacy
\r\n
The Comments will not be used to solicit or promote business or custom or present commercial activities or unlawful activity.
\r\n
\r\n
You hereby grant Company Name a non-exclusive license to use, reproduce, edit and authorize others to use, reproduce and edit any of your Comments in any and all forms, formats or media.

\r\n
Hyperlinking to our Content
\r\n
The following organizations may link to our Website without prior written approval:

\r\n
\r\n
Government agencies;
\r\n
Search engines;
\r\n
News organizations;
\r\n
Online directory distributors may link to our Website in the same manner as they hyperlink to the Websites of other listed businesses; and
\r\n
System wide Accredited Businesses except soliciting non-profit organizations, charity shopping malls, and charity fundraising groups which may not hyperlink to our Web site.
\r\n
\r\n
These organizations may link to our home page, to publications or to other Website information so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products and/or services; and (c) fits within the context of the linking party\'s site.

\r\n
We may consider and approve other link requests from the following types of organizations:

\r\n
\r\n
commonly-known consumer and/or business information sources;
\r\n
dot.com community sites;
\r\n
associations or other groups representing charities;
\r\n
online directory distributors;
\r\n
internet portals;
\r\n
accounting, law and consulting firms; and
\r\n
educational institutions and trade associations.
\r\n
\r\n
We will approve link requests from these organizations if we decide that: (a) the link would not make us look unfavorably to ourselves or to our accredited businesses; (b) the organization does not have any negative records with us; (c) the benefit to us from the visibility of the hyperlink compensates the absence of Company Name; and (d) the link is in the context of general resource information.

\r\n
These organizations may link to our home page so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products or services; and (c) fits within the context of the linking party\'s site.

\r\n
If you are one of the organizations listed in paragraph 2 above and are interested in linking to our website, you must inform us by sending an e-mail to Company Name. Please include your name, your organization name, contact information as well as the URL of your site, a list of any URLs from which you intend to link to our Website, and a list of the URLs on our site to which you would like to link. Wait 2-3 weeks for a response.

\r\n
Approved organizations may hyperlink to our Website as follows:

\r\n
\r\n
By use of our corporate name; or
\r\n
By use of the uniform resource locator being linked to; or
\r\n
By use of any other description of our Website being linked to that makes sense within the context and format of content on the linking party\'s site.
\r\n
\r\n
No use of Company Name\'s logo or other artwork will be allowed for linking absent a trademark license agreement.

\r\n
iFrames
\r\n
Without prior approval and written permission, you may not create frames around our Webpages that alter in any way the visual presentation or appearance of our Website.

\r\n
Content Liability
\r\n
We shall not be hold responsible for any content that appears on your Website. You agree to protect and defend us against all claims that is rising on your Website. No link(s) should appear on any Website that may be interpreted as libelous, obscene or criminal, or which infringes, otherwise violates, or advocates the infringement or other violation of, any third party rights.

\r\n
Reservation of Rights
\r\n
We reserve the right to request that you remove all links or any particular link to our Website. You approve to immediately remove all links to our Website upon request. We also reserve the right to amen these terms and conditions and it\'s linking policy at any time. By continuously linking to our Website, you agree to be bound to and follow these linking terms and conditions.

\r\n
Removal of links from our website
\r\n
If you find any link on our Website that is offensive for any reason, you are free to contact and inform us any moment. We will consider requests to remove links but we are not obligated to or so or to respond to you directly.

\r\n
We do not ensure that the information on this website is correct, we do not warrant its completeness or accuracy; nor do we promise to ensure that the website remains available or that the material on the website is kept up to date.

\r\n
Disclaimer
\r\n
To the maximum extent permitted by applicable law, we exclude all representations, warranties and conditions relating to our website and the use of this website. Nothing in this disclaimer will:

\r\n
\r\n
limit or exclude our or your liability for death or personal injury;
\r\n
limit or exclude our or your liability for fraud or fraudulent misrepresentation;
\r\n
limit any of our or your liabilities in any way that is not permitted under applicable law; or
\r\n
exclude any of our or your liabilities that may not be excluded under applicable law.
\r\n
\r\n
The limitations and prohibitions of liability set in this Section and elsewhere in this disclaimer: (a) are subject to the preceding paragraph; and (b) govern all liabilities arising under the disclaimer, including liabilities arising in contract, in tort and for breach of statutory duty.

\r\n
As long as the website and the information and services on the website are provided free of charge, we will not be liable for any loss or damage of any nature.

',
            'details'=>NULL,
            'type'=>'rich_text_box',
            'order'=>32,
            'group'=>'Site'
        ] );


        Setting::create( [
            'id'=>48,
            'key'=>'notification.new',
            'display_name'=>'new',
            'value'=>'<p>&nbsp;</p>
<table class="MsoTableGrid" style="margin-left: 28.5pt; border-collapse: collapse; border: none;" border="1" cellspacing="0" cellpadding="0">
<tbody>
<tr style="height: 16.85pt;">
<td style="width: 79.25pt; border: 1pt solid windowtext; background: #9cc2e5; padding: 0in 5.4pt; height: 16.85pt;" valign="top" width="106">
<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;" align="center"><strong><span style="font-size: 20pt; font-family: \'Arabic Typesetting\';">Email Topic</span></strong></p>
</td>
<td style="width: 331.7pt; border-top: 1pt solid windowtext; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-image: initial; border-left: none; background: #9cc2e5; padding: 0in 5.4pt; height: 16.85pt;" valign="top" width="442">
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span lang="AR-EG" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;">موعدك في خدمة أندلسية</span><span dir="LTR" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;">&nbsp;DotCare</span></p>
</td>
</tr>
<tr style="height: 16.85pt;">
<td style="width: 79.25pt; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-image: initial; border-top: none; background: #9cc2e5; padding: 0in 5.4pt; height: 16.85pt;" valign="top" width="106">
<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;" align="center"><span style="font-size: 20pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;" align="center"><span style="font-size: 20pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;" align="center"><span style="font-size: 20pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;" align="center"><span style="font-size: 20pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;" align="center"><strong><span style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;">New</span></strong></p>
</td>
<td style="width: 331.7pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; padding: 0in 5.4pt; height: 16.85pt;" valign="top" width="442">
<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: right; line-height: normal;" align="right"><span dir="RTL" lang="AR-SA" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;">عزيزي سيد\[[user_name]]</span></p>
<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: right; line-height: normal;" align="right"><span dir="RTL" lang="AR-SA" style="font-size: 20pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><strong><span lang="AR-SA" style="font-size: 26pt; font-family: \'Arabic Typesetting\'; color: #7030a0;">لقد تم إرسال الحجز الخاص بك </span></strong><strong><span lang="AR-EG" style="font-size: 26pt; font-family: \'Arabic Typesetting\'; color: #7030a0;">بنجاح</span></strong></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-size: 20pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;">الأسم:[[user_name]]</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;"><span style="font-size: 26.6667px;">رقم الهاتف:[[user_phone]]</span></span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;">البريد الألكتروني: [[user_email]]</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;">أسم الطبيب: [[doctor_name]]</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;">&nbsp;وقت الحجز: [[Appointment_start]]</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;">مدة الحجز: [[Appointment_duration]]</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span lang="AR-SA" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: red;">&nbsp;</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><strong><span lang="AR-SA" style="font-size: 26pt; font-family: \'Arabic Typesetting\'; color: #7030a0;">عندما تكون مستعد</span></strong></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span lang="AR-SA" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;">اضغط على الرابط التالي لبدء المحادثة مع طبيبك:</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span style="color: black;"><a href="https://www.andalusia.care/user/person/online-consultation"><span dir="LTR">https://www.andalusia.care/user/person/online-consultation</span></a></span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span dir="LTR" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: red;">&nbsp;</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span lang="AR-SA" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: red;">ويمكنك حجز استشارة منزلية من خلال الرابط التالي:</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span style="color: black;"><a href="https://page.andalusiahjh.com/home-care-go"><span dir="LTR">https://page.andalusiahjh.com/home-care-go</span></a></span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span lang="AR-SA" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: red;">&nbsp;</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span lang="AR-SA" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: red;">&nbsp;</span><span lang="AR-SA" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;">شكراً لثقتك بمجموعة أندلسية الطبية</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span dir="LTR" style="font-size: 20pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
</td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>',
            'details'=>NULL,
            'type'=>'rich_text_box',
            'order'=>33,
            'group'=>'Notification'
        ] );


        Setting::create( [
            'id'=>49,
            'key'=>'notification.confirmed',
            'display_name'=>'confirmed',
            'value'=>'<table class="MsoTableGrid" style="margin-left: 28.5pt; border-collapse: collapse; border: none;" border="1" cellspacing="0" cellpadding="0">
<tbody>
<tr style="height: 16.85pt;">
<td style="width: 79.25pt; border: 1pt solid windowtext; background: #9cc2e5; padding: 0in 5.4pt; height: 16.85pt;" valign="top" width="106">
<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;" align="center"><strong><span style="font-size: 20pt; font-family: \'Arabic Typesetting\';">Email Topic</span></strong></p>
</td>
<td style="width: 331.7pt; border-top: 1pt solid windowtext; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-image: initial; border-left: none; background: #9cc2e5; padding: 0in 5.4pt; height: 16.85pt;" valign="top" width="442">
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span lang="AR-EG" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;">موعدك في خدمة أندلسية</span><span dir="LTR" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;">&nbsp;DotCare</span></p>
</td>
</tr>
<tr style="height: 16.85pt;">
<td style="width: 79.25pt; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-image: initial; border-top: none; background: #9cc2e5; padding: 0in 5.4pt; height: 16.85pt;" valign="top" width="106">
<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;" align="center"><span style="font-size: 20pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;" align="center"><span style="font-size: 20pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;" align="center"><span style="font-size: 20pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;" align="center"><span style="font-size: 20pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;" align="center"><strong><span style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;">Confirmation</span></strong></p>
</td>
<td style="width: 331.7pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; padding: 0in 5.4pt; height: 16.85pt;" valign="top" width="442">
<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: right; line-height: normal;" align="right"><span dir="RTL" lang="AR-SA" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;">عزيزي سيد\[[user_name]]</span></p>
<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: right; line-height: normal;" align="right"><span dir="RTL" lang="AR-SA" style="font-size: 20pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><strong><span lang="AR-SA" style="font-size: 26pt; font-family: \'Arabic Typesetting\'; color: #7030a0;">لقد تم تأكيد الحجز الخاص بك&nbsp;</span></strong><strong><span lang="AR-EG" style="font-size: 26pt; font-family: \'Arabic Typesetting\'; color: #7030a0;">بنجاح</span></strong></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-size: 20pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;">الأسم:[[user_name]]</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;"><span style="font-size: 26.6667px;">رقم الهاتف:[[user_phone]]</span></span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;">البريد الألكتروني: [[user_email]]</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;">أسم الطبيب: [[doctor_name]]</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;">&nbsp;وقت الحجز: [[Appointment_start]]</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;">مدة الحجز: [[Appointment_duration]]</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span lang="AR-SA" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: red;">&nbsp;</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><strong><span lang="AR-SA" style="font-size: 26pt; font-family: \'Arabic Typesetting\'; color: #7030a0;">عندما تكون مستعد</span></strong></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span lang="AR-SA" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;">اضغط على الرابط التالي لبدء المحادثة مع طبيبك:</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><a href="https://www.andalusia.care/user/person/online-consultation"><span dir="LTR">https://www.andalusia.care/user/person/online-consultation</span></a></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span dir="LTR" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: red;">&nbsp;</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span lang="AR-SA" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: red;">ويمكنك حجز استشارة منزلية من خلال الرابط التالي:</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span style="color: black;"><a href="https://page.andalusiahjh.com/home-care-go"><span dir="LTR">https://page.andalusiahjh.com/home-care-go</span></a></span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span lang="AR-SA" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: red;">&nbsp;</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span lang="AR-SA" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: red;">&nbsp;</span><span lang="AR-SA" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;">شكراً لثقتك بمجموعة أندلسية الطبية</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span dir="LTR" style="font-size: 20pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
</td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>',
            'details'=>NULL,
            'type'=>'rich_text_box',
            'order'=>34,
            'group'=>'Notification'
        ] );


        Setting::create( [
            'id'=>50,
            'key'=>'notification.rejected',
            'display_name'=>'rejected',
            'value'=>'<p>&nbsp;</p>
<table class="MsoTableGrid" style="margin-left: 28.5pt; border-collapse: collapse; border: none;" border="1" cellspacing="0" cellpadding="0">
<tbody>
<tr style="height: 16.85pt;">
<td style="width: 79.25pt; border: 1pt solid windowtext; background: #9cc2e5; padding: 0in 5.4pt; height: 16.85pt;" valign="top" width="106">
<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;" align="center"><strong><span style="font-size: 20pt; font-family: \'Arabic Typesetting\';">Email Topic</span></strong></p>
</td>
<td style="width: 331.7pt; border-top: 1pt solid windowtext; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-image: initial; border-left: none; background: #9cc2e5; padding: 0in 5.4pt; height: 16.85pt;" valign="top" width="442">
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span lang="AR-EG" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;">موعدك في خدمة أندلسية</span><span dir="LTR" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;">&nbsp;DotCare</span></p>
</td>
</tr>
<tr style="height: 16.85pt;">
<td style="width: 79.25pt; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-image: initial; border-top: none; background: #9cc2e5; padding: 0in 5.4pt; height: 16.85pt;" valign="top" width="106">
<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;" align="center"><span style="font-size: 20pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;" align="center"><span style="font-size: 20pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;" align="center"><span style="font-size: 20pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;" align="center"><span style="font-size: 20pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;" align="center"><strong><span style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;">Cancellation</span></strong></p>
</td>
<td style="width: 331.7pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; padding: 0in 5.4pt; height: 16.85pt;" valign="top" width="442">
<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: right; line-height: normal;" align="right"><span dir="RTL" lang="AR-SA" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;">عزيزي سيد\[[user_name]]</span></p>
<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: right; line-height: normal;" align="right"><span dir="RTL" lang="AR-SA" style="font-size: 20pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal" dir="RTL" style="text-align: center; direction: rtl; unicode-bidi: embed;" align="center"><strong><span lang="AR-SA" style="font-size: 26.0pt; line-height: 107%; font-family: \'Arabic Typesetting\'; color: #7030a0;">لقد تم إلغاء الحجز الخاص بك </span></strong><strong><span lang="AR-EG" style="font-size: 26.0pt; line-height: 107%; font-family: \'Arabic Typesetting\'; color: #7030a0; mso-bidi-language: AR-EG;">بنجاح</span></strong></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-size: 20pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;">الأسم:[[user_name]]</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;"><span style="font-size: 26.6667px;">رقم الهاتف:[[user_phone]]</span></span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;">البريد الألكتروني: [[user_email]]</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;">أسم الطبيب: [[doctor_name]]</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;">&nbsp;وقت الحجز: [[Appointment_start]]</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;">مدة الحجز: [[Appointment_duration]]</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span lang="AR-SA" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: red;">&nbsp;</span></p>
<p class="MsoNormal" dir="RTL" style="text-align: center; direction: rtl; unicode-bidi: embed;" align="center"><strong><span lang="AR-SA" style="font-size: 20.0pt; line-height: 107%; font-family: \'Arabic Typesetting\'; color: #7030a0;">ليس لديك مواعيد في خدمة الــ</span></strong><strong><span dir="LTR" style="font-size: 20.0pt; line-height: 107%; font-family: \'Arabic Typesetting\'; color: #7030a0;">DotCare</span></strong></p>
<p class="MsoNormal" dir="RTL" style="text-align: center; direction: rtl; unicode-bidi: embed;" align="center"><span dir="LTR" style="font-size: 20.0pt; line-height: 107%; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal" dir="RTL" style="text-align: center; direction: rtl; unicode-bidi: embed;" align="center"><span lang="AR-EG" style="font-size: 20.0pt; line-height: 107%; font-family: \'Arabic Typesetting\'; mso-bidi-language: AR-EG;">للتواصل مع طبيب مختص أوحجز استشارة منزلية</span></p>
<p class="MsoNormal" dir="RTL" style="text-align: center; direction: rtl; unicode-bidi: embed;" align="center"><strong><span lang="AR-EG" style="font-size: 20.0pt; line-height: 107%; font-family: \'Arabic Typesetting\'; color: #7030a0; mso-bidi-language: AR-EG;">أضغط هنا</span></strong></p>
<p class="MsoNormal" dir="RTL" style="text-align: center; direction: rtl; unicode-bidi: embed;" align="center"><a href="https://page.andalusiahjh.com/home-care-go"><span dir="LTR">https://page.andalusiahjh.com/home-care-go</span></a></p>
<p class="MsoNormal" dir="RTL" style="text-align: center; direction: rtl; unicode-bidi: embed;" align="center"><span lang="AR-SA" style="font-size: 20.0pt; line-height: 107%; font-family: \'Arabic Typesetting\'; color: red;">&nbsp;</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center">&nbsp;</p>
<p class="MsoNormal" dir="RTL" style="text-align: center; direction: rtl; unicode-bidi: embed;" align="center"><span lang="AR-SA" style="font-size: 20.0pt; line-height: 107%; font-family: \'Arabic Typesetting\'; color: red;">&nbsp;</span><span lang="AR-SA" style="font-size: 20.0pt; line-height: 107%; font-family: \'Arabic Typesetting\';">شكراً لثقتك بمستشفيات أندلسية</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span dir="LTR" style="font-size: 20pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
</td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>',
            'details'=>NULL,
            'type'=>'rich_text_box',
            'order'=>35,
            'group'=>'Notification'
        ] );


        Setting::create( [
            'id'=>51,
            'key'=>'notification.payment',
            'display_name'=>'payment',
            'value'=>'<table class="MsoTableGrid" style="margin-left: 28.5pt; border-collapse: collapse; border: none;" border="1" cellspacing="0" cellpadding="0">
<tbody>
<tr style="height: 16.85pt;">
<td style="width: 79.25pt; border: 1pt solid windowtext; background: #9cc2e5; padding: 0in 5.4pt; height: 16.85pt;" valign="top" width="106">
<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;" align="center"><strong><span style="font-size: 20pt; font-family: \'Arabic Typesetting\';">Email Topic</span></strong></p>
</td>
<td style="width: 331.7pt; border-top: 1pt solid windowtext; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-image: initial; border-left: none; background: #9cc2e5; padding: 0in 5.4pt; height: 16.85pt;" valign="top" width="442">
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span lang="AR-EG" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;">موعدك في خدمة أندلسية</span><span dir="LTR" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;">&nbsp;DotCare</span></p>
</td>
</tr>
<tr style="height: 16.85pt;">
<td style="width: 79.25pt; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-image: initial; border-top: none; background: #9cc2e5; padding: 0in 5.4pt; height: 16.85pt;" valign="top" width="106">
<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;" align="center"><span style="font-size: 20pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;" align="center"><span style="font-size: 20pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;" align="center"><span style="font-size: 20pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;" align="center"><span style="font-size: 20pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;" align="center"><strong><span style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;">Payment Confirmation</span></strong></p>
</td>
<td style="width: 331.7pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; padding: 0in 5.4pt; height: 16.85pt;" valign="top" width="442">
<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: right; line-height: normal;" align="right"><span dir="RTL" lang="AR-SA" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;">عزيزي سيد\[[user_name]]</span></p>
<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: right; line-height: normal;" align="right"><span dir="RTL" lang="AR-SA" style="font-size: 20pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><strong><span lang="AR-SA" style="font-size: 26pt; font-family: \'Arabic Typesetting\'; color: #7030a0;">لقد تم تأكيد دفع الحجز الخاص بك </span></strong><strong><span lang="AR-EG" style="font-size: 26pt; font-family: \'Arabic Typesetting\'; color: #7030a0;">بنجاح</span></strong></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-size: 20pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;">الأسم:[[user_name]]</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;"><span style="font-size: 26.6667px;">رقم الهاتف:[[user_phone]]</span></span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;">البريد الألكتروني: [[user_email]]</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;">أسم الطبيب: [[doctor_name]]</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;">&nbsp;وقت الحجز: [[Appointment_start]]</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;">مدة الحجز: [[Appointment_duration]]</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span lang="AR-SA" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: red;">&nbsp;</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><strong><span lang="AR-SA" style="font-size: 26pt; font-family: \'Arabic Typesetting\'; color: #7030a0;">عندما تكون مستعد</span></strong></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span lang="AR-SA" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;">اضغط على الرابط التالي لبدء المحادثة مع طبيبك:</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><a href="https://www.andalusia.care/user/person/online-consultation"><span dir="LTR">https://www.andalusia.care/user/person/online-consultation</span></a></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span dir="LTR" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: red;">&nbsp;</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span lang="AR-SA" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: red;">ويمكنك حجز استشارة منزلية من خلال الرابط التالي:</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span style="color: black;"><a href="https://page.andalusiahjh.com/home-care-go"><span dir="LTR">https://page.andalusiahjh.com/home-care-go</span></a></span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span lang="AR-SA" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: red;">&nbsp;</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span lang="AR-SA" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: red;">&nbsp;</span><span lang="AR-SA" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;">شكراً لثقتك بمجموعة أندلسية الطبية</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span dir="LTR" style="font-size: 20pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
</td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>',
            'details'=>NULL,
            'type'=>'rich_text_box',
            'order'=>36,
            'group'=>'Notification'
        ] );


        Setting::create( [
            'id'=>52,
            'key'=>'sms.new',
            'display_name'=>'new',
            'value'=>'تم إرسال حجز الموعد مع طبيبك المختص في خدمة DotCare للتفاصيل:
https://www.andalusia.care/user/person/online-consultation',
            'details'=>NULL,
            'type'=>'text_area',
            'order'=>37,
            'group'=>'sms'
        ] );



        Setting::create( [
            'id'=>53,
            'key'=>'sms.confirmed',
            'display_name'=>'confirmed',
            'value'=>'تم تأكيد حجز الموعد مع طبيبك المختص في خدمة DotCare للتفاصيل:
https://www.andalusia.care/user/person/online-consultation',
            'details'=>NULL,
            'type'=>'text_area',
            'order'=>38,
            'group'=>'sms'
        ] );



        Setting::create( [
            'id'=>54,
            'key'=>'sms.rejected',
            'display_name'=>'rejected',
            'value'=>'تم إلغاء الحجز الخاص بك في خدمة DotCare للتفاصيل:
https://www.andalusia.care/user/person/online-consultation',
            'details'=>NULL,
            'type'=>'text_area',
            'order'=>39,
            'group'=>'sms'
        ] );

        Setting::create( [
            'id'=>55,
            'key'=>'sms.payment',
            'display_name'=>'payment',
            'value'=>'تم تأكيد دفع حجز الموعد مع طبيبك المختص في خدمة DotCare للتفاصيل:
https://www.andalusia.care/user/person/online-consultation',
            'details'=>NULL,
            'type'=>'text_area',
            'order'=>40,
            'group'=>'sms'
        ] );

        Setting::create( [
            'id'=>56,
            'key'=>'sms.change',
            'display_name'=>'change',
            'value'=>'تم تغيير موعد الحجز الخاص بك في خدمة DotCare إلى [[Appointment_start]] للتفاصيل:
https://www.andalusia.care/user/person/online-consultation',
            'details'=>NULL,
            'type'=>'text_area',
            'order'=>40,
            'group'=>'sms'
        ] );

        Setting::create( [
            'id'=>57,
            'key'=>'notification.change',
            'display_name'=>'change',
            'value'=>'<p>&nbsp;</p>
<p class="MsoNormal"><span style="font-family: \'Times New Roman\',serif; mso-ascii-theme-font: major-bidi; mso-hansi-theme-font: major-bidi; mso-bidi-theme-font: major-bidi;"><span style="mso-spacerun: yes;">&nbsp;</span></span></p>
<table class="MsoTableGrid" style="margin-left: 28.5pt; border-collapse: collapse; border: none; mso-border-alt: solid windowtext .5pt; mso-yfti-tbllook: 1184; mso-padding-alt: 0in 5.4pt 0in 5.4pt;" border="1" cellspacing="0" cellpadding="0">
<tbody>
<tr style="mso-yfti-irow: 0; mso-yfti-firstrow: yes; height: 16.85pt;">
<td style="width: 79.25pt; border: solid windowtext 1.0pt; mso-border-alt: solid windowtext .5pt; background: #F7CAAC; mso-background-themecolor: accent2; mso-background-themetint: 102; padding: 0in 5.4pt 0in 5.4pt; height: 16.85pt;" valign="top" width="106">
<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: center; line-height: normal;" align="center"><strong><span style="font-size: 16.0pt; font-family: \'Arabic Typesetting\';">Email Topic</span></strong></p>
</td>
<td style="width: 331.7pt; border: solid windowtext 1.0pt; border-left: none; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; background: #F7CAAC; mso-background-themecolor: accent2; mso-background-themetint: 102; padding: 0in 5.4pt 0in 5.4pt; height: 16.85pt;" valign="top" width="442">
<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span lang="AR-EG" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\'; color: black; mso-color-alt: windowtext; mso-bidi-language: AR-EG;">موعدك في خدمة أندلسية </span><span dir="LTR" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\'; color: black; mso-color-alt: windowtext; mso-bidi-language: AR-EG;"><span style="mso-spacerun: yes;">&nbsp;</span>DotCare</span></p>
</td>
</tr>
<tr style="mso-yfti-irow: 1; mso-yfti-lastrow: yes; height: 16.85pt;">
<td style="width: 79.25pt; border: solid windowtext 1.0pt; border-top: none; mso-border-top-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; background: #F7CAAC; mso-background-themecolor: accent2; mso-background-themetint: 102; padding: 0in 5.4pt 0in 5.4pt; height: 16.85pt;" valign="top" width="106">
<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: center; line-height: normal;" align="center"><span style="font-size: 20.0pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: center; line-height: normal;" align="center"><span style="font-size: 20.0pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: center; line-height: normal;" align="center"><span style="font-size: 20.0pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: center; line-height: normal;" align="center"><span style="font-size: 20.0pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: center; line-height: normal;" align="center"><strong><span style="font-size: 16.0pt; font-family: \'Times New Roman\',serif; mso-ascii-theme-font: major-bidi; mso-hansi-theme-font: major-bidi; mso-bidi-theme-font: major-bidi; color: black; mso-color-alt: windowtext;">Change</span></strong></p>
</td>
<td style="width: 331.7pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .5pt; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; background: white; mso-background-themecolor: background1; padding: 0in 5.4pt 0in 5.4pt; height: 16.85pt;" valign="top" width="442">
<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: right; line-height: normal;" align="right"><span dir="RTL" lang="AR-SA" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\'; color: black; mso-color-alt: windowtext;">عزيزي سيد\ [[user_name]]</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><strong><span lang="AR-SA" style="font-size: 26.0pt; font-family: \'Arabic Typesetting\'; color: #7030a0;">لقد تم </span></strong><strong><span lang="AR-EG" style="font-size: 26.0pt; font-family: \'Arabic Typesetting\'; color: #7030a0; mso-bidi-language: AR-EG;">تغيير موعد</span></strong><strong><span lang="AR-SA" style="font-size: 26.0pt; font-family: \'Arabic Typesetting\'; color: #7030a0;"> الحجز الخاص بك بنجاح</span></strong></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span lang="AR-SA" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\'; color: red;">&nbsp;</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\'; color: black; mso-color-alt: windowtext; mso-bidi-language: AR-EG;">الأسم:[[user_name]]</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\'; color: black; mso-color-alt: windowtext; mso-bidi-language: AR-EG;"><span style="font-size: 26.6667px;">رقم الهاتف:[[user_phone]]</span></span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\'; color: black; mso-color-alt: windowtext; mso-bidi-language: AR-EG;">البريد الألكتروني: [[user_email]]</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\'; color: black; mso-color-alt: windowtext; mso-bidi-language: AR-EG;">أسم الطبيب: [[doctor_name]]</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\'; color: black; mso-color-alt: windowtext; mso-bidi-language: AR-EG;"><span style="mso-spacerun: yes;">&nbsp;</span>وقت الحجز: [[Appointment_start]]</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\'; color: black; mso-color-alt: windowtext; mso-bidi-language: AR-EG;">مدة الحجز: [[Appointment_duration]]</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span lang="AR-SA" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\'; color: red;">&nbsp;</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><strong><span lang="AR-SA" style="font-size: 24.0pt; font-family: \'Arabic Typesetting\'; color: #7030a0;">عندما تكون مستعد </span></strong></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span lang="AR-SA" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\'; color: black; mso-color-alt: windowtext;">اضغط على الرابط التالي لبدء المحادثة مع طبيبك:</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><a href="https://www.andalusia.care/user/person/online-consultation"><span dir="LTR">https://www.andalusia.care/user/person/online-consultation</span></a></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span dir="LTR" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\'; color: red;">&nbsp;</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span lang="AR-SA" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\'; color: red;">ويمكنك حجز استشارة منزلية من خلال الرابط التالي:</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span style="color: black; mso-color-alt: windowtext;"><a href="https://page.andalusiahjh.com/home-care-go"><span dir="LTR">https://page.andalusiahjh.com/home-care-go</span></a></span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span lang="AR-SA" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\'; color: red;">&nbsp;</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span lang="AR-SA" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\'; color: red;"><span style="mso-spacerun: yes;">&nbsp;</span></span><span lang="AR-SA" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\'; color: black; mso-color-alt: windowtext;">شكراً لثقتك بمستشفيات أندلسية</span></p>
</td>
</tr>
</tbody>
</table>
<p class="MsoNormal"><span style="font-size: 20.0pt; line-height: 107%; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal"><span style="mso-tab-count: 1;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></p>
<p class="MsoNormal">&nbsp;</p>
<p>&nbsp;</p>',
            'details'=>NULL,
            'type'=>'rich_text_box',
            'order'=>37,
            'group'=>'Notification'
        ] );

        Setting::create( [
            'id'=>58,
            'key'=>'site.terms_ar',
            'display_name'=>'Terms (AR)',
            'value'=>'بعض الكلام هنا',
            'details'=>NULL,
            'type'=>'rich_text_box',
            'order'=>32,
            'group'=>'Site'
        ] );

        Setting::create( [
            'id'=>59,
            'key'=>'site.consent_ar',
            'display_name'=>'consent (AR)',
            'value'=>'بعض الكلام',
            'details'=>NULL,
            'type'=>'rich_text_box',
            'order'=>34,
            'group'=>'Site'
        ] );

        Setting::create( [
            'id'=>60,
            'key'=>'notification.user_new',
            'display_name'=>'new user',
            'value'=>'<table class="MsoTableGrid" style="margin-left: 28.5pt; border-collapse: collapse; border: none; mso-border-alt: solid windowtext .5pt; mso-yfti-tbllook: 1184; mso-padding-alt: 0in 5.4pt 0in 5.4pt;" border="1" cellspacing="0" cellpadding="0">
<tbody>
<tr style="mso-yfti-irow: 0; mso-yfti-firstrow: yes; height: 16.85pt;">
<td style="width: 79.25pt; border: solid windowtext 1.0pt; mso-border-alt: solid windowtext .5pt; background: #9CC2E5; mso-background-themecolor: accent1; mso-background-themetint: 153; padding: 0in 5.4pt 0in 5.4pt; height: 16.85pt;" valign="top" width="106">
<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: center; line-height: normal;" align="center"><strong><span style="font-size: 20.0pt; font-family: \'Arabic Typesetting\';">Email Topic</span></strong></p>
</td>
<td style="width: 331.7pt; border: solid windowtext 1.0pt; border-left: none; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; background: #9CC2E5; mso-background-themecolor: accent1; mso-background-themetint: 153; padding: 0in 5.4pt 0in 5.4pt; height: 16.85pt;" valign="top" width="442">
<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\'; color: black; mso-color-alt: windowtext; mso-bidi-language: AR-EG;">مرحباً بك في خدمة أندلسية</span><span dir="LTR" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\'; color: black; mso-color-alt: windowtext; mso-bidi-language: AR-EG;"> DotCare</span></p>
</td>
</tr>
<tr style="mso-yfti-irow: 1; mso-yfti-lastrow: yes; height: 16.85pt;">
<td style="width: 79.25pt; border: solid windowtext 1.0pt; border-top: none; mso-border-top-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; background: #9CC2E5; mso-background-themecolor: accent1; mso-background-themetint: 153; padding: 0in 5.4pt 0in 5.4pt; height: 16.85pt;" valign="top" width="106">
<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: center; line-height: normal;" align="center"><span style="font-size: 20.0pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: center; line-height: normal;" align="center"><span style="font-size: 20.0pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: center; line-height: normal;" align="center"><span style="font-size: 20.0pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: center; line-height: normal;" align="center"><span style="font-size: 20.0pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: center; line-height: normal;" align="center"><strong><span style="font-size: 20.0pt; font-family: \'Arabic Typesetting\'; color: black; mso-color-alt: windowtext;">Registration </span></strong></p>
</td>
<td style="width: 331.7pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .5pt; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; background: white; mso-background-themecolor: background1; padding: 0in 5.4pt 0in 5.4pt; height: 16.85pt;" valign="top" width="442">
<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: right; line-height: normal;" align="right"><span dir="RTL" lang="AR-SA" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\'; color: black; mso-color-alt: windowtext;">عزيزي سيد\ [[user_name]]</span></p>
<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: right; line-height: normal;" align="right"><span dir="RTL" lang="AR-SA" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><strong><span lang="AR-SA" style="font-size: 26.0pt; font-family: \'Arabic Typesetting\'; color: #7030a0;">لقد تم التسجيل في خدمة الــ</span></strong><strong><span dir="LTR" style="font-size: 26.0pt; font-family: \'Arabic Typesetting\'; color: #7030a0;">DotCare</span></strong><strong><span lang="AR-EG" style="font-size: 26.0pt; font-family: \'Arabic Typesetting\'; color: #7030a0; mso-bidi-language: AR-EG;"> بنجاح</span></strong></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span lang="AR-SA" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\'; color: red;">&nbsp;</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><strong><span lang="AR-SA" style="font-size: 26.0pt; font-family: \'Arabic Typesetting\'; color: #7030a0;">لحجز أول موعد أونلاين</span></strong></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span lang="AR-SA" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\'; color: black; mso-color-alt: windowtext;">اضغط على الرابط التالي:</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><a href="https://www.andalusia.care/user/person/online-consultation"><span dir="LTR">https://www.andalusia.care/user/person/online-consultation</span></a></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span lang="AR-SA" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\'; color: red;">&nbsp;</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span lang="AR-SA" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\'; color: red;">ويمكنك حجز استشارة منزلية من خلال الرابط التالي:</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span style="color: black; mso-color-alt: windowtext;"><a href="https://page.andalusiahjh.com/home-care-go"><span dir="LTR">https://page.andalusiahjh.com/home-care-go</span></a></span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span lang="AR-SA" style="font-family: \'Arial\',sans-serif; mso-ascii-font-family: Calibri; mso-ascii-theme-font: minor-latin; mso-hansi-font-family: Calibri; mso-hansi-theme-font: minor-latin; mso-bidi-theme-font: minor-bidi;">&nbsp;</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span lang="AR-SA" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\'; color: red;"><span style="mso-spacerun: yes;">&nbsp;</span></span><span lang="AR-SA" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\'; color: black; mso-color-alt: windowtext;">شكراً لثقتك بمجموعة أندلسية الطبية</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span dir="LTR" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
</td>
</tr>
</tbody>
</table>
<p class="MsoNormal"><span style="font-size: 20.0pt; line-height: 107%; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal"><span style="mso-tab-count: 1;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></p>
<p class="MsoNormal">&nbsp;</p>',
            'details'=>NULL,
            'type'=>'rich_text_box',
            'order'=>38,
            'group'=>'Notification'
        ] );

        Setting::create( [
            'id'=>61,
            'key'=>'sms.user_new',
            'display_name'=>'new user',
            'value'=>'لقد تم التسجيل في خدمة الــDotCare بنجاح لحجز أول موعد أونلاين:
https://www.andalusia.care/user/person/online-consultation',
            'details'=>NULL,
            'type'=>'text_area',
            'order'=>41,
            'group'=>'sms'
        ] );

        Setting::create( [
            'id'=>62,
            'key'=>'notification.coordinator_emails',
            'display_name'=>'coordinator emails',
            'value'=>'Hjh-OnlineConfirmation@andalusiagroup.net',
            'details' => "{\"validation\":{\"rule\":\"emails\"}}",
            'type'=>'text_area',
            'order'=>41,
            'group'=>'Notification'
        ] );

        Setting::create( [
            'id'=>63,
            'key'=>'sms.coordinator_phones',
            'display_name'=>'coordinator phones',
            'value'=>'966560779354',
            'details' => "{\"validation\":{\"rule\":\"phones\"}}",
            'type'=>'text_area',
            'order'=>45,
            'group'=>'sms'
        ] );

        Setting::create( [
            'id'=>64,
            'key'=>'notification.payment_failed',
            'display_name'=>'payment failed',
            'value'=>'<table class="MsoTableGrid" style="margin-left: 28.5pt; border-collapse: collapse; border: none; mso-border-alt: solid windowtext .5pt; mso-yfti-tbllook: 1184; mso-padding-alt: 0in 5.4pt 0in 5.4pt;" border="1" cellspacing="0" cellpadding="0">
<tbody>
<tr style="mso-yfti-irow: 0; mso-yfti-firstrow: yes; height: 16.85pt;">
<td style="width: 79.25pt; border: solid windowtext 1.0pt; mso-border-alt: solid windowtext .5pt; background: #9CC2E5; mso-background-themecolor: accent1; mso-background-themetint: 153; padding: 0in 5.4pt 0in 5.4pt; height: 16.85pt;" valign="top" width="106">
<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: center; line-height: normal;" align="center"><strong><span style="font-size: 20.0pt; font-family: \'Arabic Typesetting\';">Email Topic</span></strong></p>
</td>
<td style="width: 331.7pt; border: solid windowtext 1.0pt; border-left: none; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; background: #9CC2E5; mso-background-themecolor: accent1; mso-background-themetint: 153; padding: 0in 5.4pt 0in 5.4pt; height: 16.85pt;" valign="top" width="442">
<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\'; color: black; mso-color-alt: windowtext; mso-bidi-language: AR-EG;">لقد فشل الدفع في خدمة أندلسية</span><span dir="LTR" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\'; color: black; mso-color-alt: windowtext; mso-bidi-language: AR-EG;"> DotCare</span></p>
</td>
</tr>
<tr style="mso-yfti-irow: 1; mso-yfti-lastrow: yes; height: 16.85pt;">
<td style="width: 79.25pt; border: solid windowtext 1.0pt; border-top: none; mso-border-top-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; background: #9CC2E5; mso-background-themecolor: accent1; mso-background-themetint: 153; padding: 0in 5.4pt 0in 5.4pt; height: 16.85pt;" valign="top" width="106">
<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: center; line-height: normal;" align="center"><span style="font-size: 20.0pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: center; line-height: normal;" align="center"><span style="font-size: 20.0pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: center; line-height: normal;" align="center"><span style="font-size: 20.0pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: center; line-height: normal;" align="center"><span style="font-size: 20.0pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: center; line-height: normal;" align="center"><strong><span style="font-size: 20.0pt; font-family: \'Arabic Typesetting\'; color: black; mso-color-alt: windowtext;">Failed Payment </span></strong></p>
</td>
<td style="width: 331.7pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .5pt; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; background: white; mso-background-themecolor: background1; padding: 0in 5.4pt 0in 5.4pt; height: 16.85pt;" valign="top" width="442">
<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: right; line-height: normal;" align="right"><span dir="RTL" lang="AR-SA" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\'; color: black; mso-color-alt: windowtext;">عزيزي سيد\ [[user_name]]</span></p>
<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: right; line-height: normal;" align="right"><span dir="RTL" lang="AR-SA" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><strong><span lang="AR-SA" style="font-size: 26.0pt; font-family: \'Arabic Typesetting\'; color: #7030a0;">لقد فشلت عملية الدفع في خدمة الــ</span></strong><strong><span dir="LTR" style="font-size: 26.0pt; font-family: \'Arabic Typesetting\'; color: #7030a0;">DotCare</span></strong><strong><span lang="AR-EG" style="font-size: 26.0pt; font-family: \'Arabic Typesetting\'; color: #7030a0; mso-bidi-language: AR-EG;"> بنجاح</span></strong></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span lang="AR-SA" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\'; color: red;">&nbsp;</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\'; color: black; mso-color-alt: windowtext; mso-bidi-language: AR-EG;">رقم العملية: [[order_id]]</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><strong><span lang="AR-SA" style="font-size: 26.0pt; font-family: \'Arabic Typesetting\'; color: #7030a0;">لحجز أول موعد أونلاين</span></strong></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span lang="AR-SA" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\'; color: black; mso-color-alt: windowtext;">اضغط على الرابط التالي:</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><a href="https://www.andalusia.care/user/person/online-consultation"><span dir="LTR">https://www.andalusia.care/user/person/online-consultation</span></a></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span lang="AR-SA" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\'; color: red;">&nbsp;</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span lang="AR-SA" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\'; color: red;">ويمكنك حجز استشارة منزلية من خلال الرابط التالي:</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span style="color: black; mso-color-alt: windowtext;"><a href="https://page.andalusiahjh.com/home-care-go"><span dir="LTR">https://page.andalusiahjh.com/home-care-go</span></a></span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span lang="AR-SA" style="font-family: \'Arial\',sans-serif; mso-ascii-font-family: Calibri; mso-ascii-theme-font: minor-latin; mso-hansi-font-family: Calibri; mso-hansi-theme-font: minor-latin; mso-bidi-theme-font: minor-bidi;">&nbsp;</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span lang="AR-SA" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\'; color: red;"><span style="mso-spacerun: yes;">&nbsp;</span></span><span lang="AR-SA" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\'; color: black; mso-color-alt: windowtext;">شكراً لثقتك بمجموعة أندلسية الطبية</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span dir="LTR" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
</td>
</tr>
</tbody>
</table>
<p class="MsoNormal"><span style="font-size: 20.0pt; line-height: 107%; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal"><span style="mso-tab-count: 1;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></p>
<p class="MsoNormal">&nbsp;</p>',
            'details'=>NULL,
            'type'=>'rich_text_box',
            'order'=>39,
            'group'=>'Notification'
        ] );

        Setting::create( [
            'id'=>65,
            'key'=>'sms.payment_failed',
            'display_name'=>'payment failed',
            'value'=>'قد فشلت عملية الدفع رقم: [[order_id]]',
            'details' => null,
            'type'=>'text_area',
            'order'=>42,
            'group'=>'sms'
        ] );

        Setting::create( [
            'id'=>66,
            'key'=>'notification.payment_pending',
            'display_name'=>'payment pending',
            'value'=>'<table class="MsoTableGrid" style="margin-left: 28.5pt; border-collapse: collapse; border: none; mso-border-alt: solid windowtext .5pt; mso-yfti-tbllook: 1184; mso-padding-alt: 0in 5.4pt 0in 5.4pt;" border="1" cellspacing="0" cellpadding="0">
<tbody>
<tr style="mso-yfti-irow: 0; mso-yfti-firstrow: yes; height: 16.85pt;">
<td style="width: 79.25pt; border: solid windowtext 1.0pt; mso-border-alt: solid windowtext .5pt; background: #9CC2E5; mso-background-themecolor: accent1; mso-background-themetint: 153; padding: 0in 5.4pt 0in 5.4pt; height: 16.85pt;" valign="top" width="106">
<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: center; line-height: normal;" align="center"><strong><span style="font-size: 20.0pt; font-family: \'Arabic Typesetting\';">Email Topic</span></strong></p>
</td>
<td style="width: 331.7pt; border: solid windowtext 1.0pt; border-left: none; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; background: #9CC2E5; mso-background-themecolor: accent1; mso-background-themetint: 153; padding: 0in 5.4pt 0in 5.4pt; height: 16.85pt;" valign="top" width="442">
<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\'; color: black; mso-color-alt: windowtext; mso-bidi-language: AR-EG;">عملية الدفع قيد الانتظار في خدمة أندلسية</span><span dir="LTR" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\'; color: black; mso-color-alt: windowtext; mso-bidi-language: AR-EG;"> DotCare</span></p>
</td>
</tr>
<tr style="mso-yfti-irow: 1; mso-yfti-lastrow: yes; height: 16.85pt;">
<td style="width: 79.25pt; border: solid windowtext 1.0pt; border-top: none; mso-border-top-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; background: #9CC2E5; mso-background-themecolor: accent1; mso-background-themetint: 153; padding: 0in 5.4pt 0in 5.4pt; height: 16.85pt;" valign="top" width="106">
<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: center; line-height: normal;" align="center"><span style="font-size: 20.0pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: center; line-height: normal;" align="center"><span style="font-size: 20.0pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: center; line-height: normal;" align="center"><span style="font-size: 20.0pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: center; line-height: normal;" align="center"><span style="font-size: 20.0pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: center; line-height: normal;" align="center"><strong><span style="font-size: 20.0pt; font-family: \'Arabic Typesetting\'; color: black; mso-color-alt: windowtext;">Pending Payment </span></strong></p>
</td>
<td style="width: 331.7pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .5pt; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; background: white; mso-background-themecolor: background1; padding: 0in 5.4pt 0in 5.4pt; height: 16.85pt;" valign="top" width="442">
<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: right; line-height: normal;" align="right"><span dir="RTL" lang="AR-SA" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\'; color: black; mso-color-alt: windowtext;">عزيزي سيد\ [[user_name]]</span></p>
<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: right; line-height: normal;" align="right"><span dir="RTL" lang="AR-SA" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><strong><span lang="AR-SA" style="font-size: 26.0pt; font-family: \'Arabic Typesetting\'; color: #7030a0;">عملية الدفع قيد الانتظار في خدمة الــ</span></strong><strong><span dir="LTR" style="font-size: 26.0pt; font-family: \'Arabic Typesetting\'; color: #7030a0;">DotCare</span></strong><strong><span lang="AR-EG" style="font-size: 26.0pt; font-family: \'Arabic Typesetting\'; color: #7030a0; mso-bidi-language: AR-EG;"> بنجاح</span></strong></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span lang="AR-SA" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\'; color: red;">&nbsp;</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\'; color: black; mso-color-alt: windowtext; mso-bidi-language: AR-EG;">رقم العملية: [[order_id]]</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><strong><span lang="AR-SA" style="font-size: 26.0pt; font-family: \'Arabic Typesetting\'; color: #7030a0;">لحجز أول موعد أونلاين</span></strong></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span lang="AR-SA" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\'; color: black; mso-color-alt: windowtext;">اضغط على الرابط التالي:</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><a href="https://www.andalusia.care/user/person/online-consultation"><span dir="LTR">https://www.andalusia.care/user/person/online-consultation</span></a></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span lang="AR-SA" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\'; color: red;">&nbsp;</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span lang="AR-SA" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\'; color: red;">ويمكنك حجز استشارة منزلية من خلال الرابط التالي:</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span style="color: black; mso-color-alt: windowtext;"><a href="https://page.andalusiahjh.com/home-care-go"><span dir="LTR">https://page.andalusiahjh.com/home-care-go</span></a></span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span lang="AR-SA" style="font-family: \'Arial\',sans-serif; mso-ascii-font-family: Calibri; mso-ascii-theme-font: minor-latin; mso-hansi-font-family: Calibri; mso-hansi-theme-font: minor-latin; mso-bidi-theme-font: minor-bidi;">&nbsp;</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span lang="AR-SA" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\'; color: red;"><span style="mso-spacerun: yes;">&nbsp;</span></span><span lang="AR-SA" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\'; color: black; mso-color-alt: windowtext;">شكراً لثقتك بمجموعة أندلسية الطبية</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span dir="LTR" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
</td>
</tr>
</tbody>
</table>
<p class="MsoNormal"><span style="font-size: 20.0pt; line-height: 107%; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal"><span style="mso-tab-count: 1;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></p>
<p class="MsoNormal">&nbsp;</p>',
            'details'=>NULL,
            'type'=>'rich_text_box',
            'order'=>39,
            'group'=>'Notification'
        ] );

        Setting::create( [
            'id'=>67,
            'key'=>'sms.payment_pending',
            'display_name'=>'payment pending',
            'value'=>'قيد الانتظار عملية الدفع رقم: [[order_id]]',
            'details' => null,
            'type'=>'text_area',
            'order'=>42,
            'group'=>'sms'
        ] );

        Setting::create( [
            'id'=>68,
            'key'=>'appointment.time_plus',
            'display_name'=>'Appointment booking (X hour/s before the appointment)',
            'value'=>1,
            'details' => null,
            'type'=>'text',
            'order'=>60,
            'group'=>'appointment'
        ] );

        Setting::create( [
            'id'=>69,
            'key'=>'notification.reminder',
            'display_name'=>'reminder',
            'value'=>'<p>&nbsp;</p>
<table class="MsoTableGrid" style="margin-left: 28.5pt; border-collapse: collapse; border: none;" border="1" cellspacing="0" cellpadding="0">
<tbody>
<tr style="height: 16.85pt;">
<td style="width: 79.25pt; border: 1pt solid windowtext; background: #9cc2e5; padding: 0in 5.4pt; height: 16.85pt;" valign="top" width="106">
<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;" align="center"><strong><span style="font-size: 20pt; font-family: \'Arabic Typesetting\';">Email Topic</span></strong></p>
</td>
<td style="width: 331.7pt; border-top: 1pt solid windowtext; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-image: initial; border-left: none; background: #9cc2e5; padding: 0in 5.4pt; height: 16.85pt;" valign="top" width="442">
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span lang="AR-EG" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;">موعدك في خدمة أندلسية</span><span dir="LTR" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;">&nbsp;DotCare</span></p>
</td>
</tr>
<tr style="height: 16.85pt;">
<td style="width: 79.25pt; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-image: initial; border-top: none; background: #9cc2e5; padding: 0in 5.4pt; height: 16.85pt;" valign="top" width="106">
<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;" align="center"><span style="font-size: 20pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;" align="center"><span style="font-size: 20pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;" align="center"><span style="font-size: 20pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;" align="center"><span style="font-size: 20pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;" align="center"><strong><span style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;">Reminder</span></strong></p>
</td>
<td style="width: 331.7pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; padding: 0in 5.4pt; height: 16.85pt;" valign="top" width="442">
<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: right; line-height: normal;" align="right"><span dir="RTL" lang="AR-SA" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;">عزيزي سيد\[[user_name]]</span></p>
<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: right; line-height: normal;" align="right"><span dir="RTL" lang="AR-SA" style="font-size: 20pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal" dir="RTL" style="text-align: center; direction: rtl; unicode-bidi: embed;" align="center"><strong><span lang="AR-SA" style="font-size: 26.0pt; line-height: 107%; font-family: \'Arabic Typesetting\'; color: #7030a0;">هذا تذكير بموعد الحجز الخاص بك </span></strong><strong><span lang="AR-EG" style="font-size: 26.0pt; line-height: 107%; font-family: \'Arabic Typesetting\'; color: #7030a0; mso-bidi-language: AR-EG;">بنجاح</span></strong></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-size: 20pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;">الأسم:[[user_name]]</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;"><span style="font-size: 26.6667px;">رقم الهاتف:[[user_phone]]</span></span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;">البريد الألكتروني: [[user_email]]</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;">أسم الطبيب: [[doctor_name]]</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;">&nbsp;وقت الحجز: [[Appointment_start]]</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;">مدة الحجز: [[Appointment_duration]]</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span lang="AR-SA" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: red;">&nbsp;</span></p>
<p class="MsoNormal" dir="RTL" style="text-align: center; direction: rtl; unicode-bidi: embed;" align="center"><strong><span lang="AR-SA" style="font-size: 20.0pt; line-height: 107%; font-family: \'Arabic Typesetting\'; color: #7030a0;">ليس لديك مواعيد في خدمة الــ</span></strong><strong><span dir="LTR" style="font-size: 20.0pt; line-height: 107%; font-family: \'Arabic Typesetting\'; color: #7030a0;">DotCare</span></strong></p>
<p class="MsoNormal" dir="RTL" style="text-align: center; direction: rtl; unicode-bidi: embed;" align="center"><span dir="LTR" style="font-size: 20.0pt; line-height: 107%; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal" dir="RTL" style="text-align: center; direction: rtl; unicode-bidi: embed;" align="center"><span lang="AR-EG" style="font-size: 20.0pt; line-height: 107%; font-family: \'Arabic Typesetting\'; mso-bidi-language: AR-EG;">للتواصل مع طبيب مختص أوحجز استشارة منزلية</span></p>
<p class="MsoNormal" dir="RTL" style="text-align: center; direction: rtl; unicode-bidi: embed;" align="center"><strong><span lang="AR-EG" style="font-size: 20.0pt; line-height: 107%; font-family: \'Arabic Typesetting\'; color: #7030a0; mso-bidi-language: AR-EG;">أضغط هنا</span></strong></p>
<p class="MsoNormal" dir="RTL" style="text-align: center; direction: rtl; unicode-bidi: embed;" align="center"><a href="https://page.andalusiahjh.com/home-care-go"><span dir="LTR">https://page.andalusiahjh.com/home-care-go</span></a></p>
<p class="MsoNormal" dir="RTL" style="text-align: center; direction: rtl; unicode-bidi: embed;" align="center"><span lang="AR-SA" style="font-size: 20.0pt; line-height: 107%; font-family: \'Arabic Typesetting\'; color: red;">&nbsp;</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center">&nbsp;</p>
<p class="MsoNormal" dir="RTL" style="text-align: center; direction: rtl; unicode-bidi: embed;" align="center"><span lang="AR-SA" style="font-size: 20.0pt; line-height: 107%; font-family: \'Arabic Typesetting\'; color: red;">&nbsp;</span><span lang="AR-SA" style="font-size: 20.0pt; line-height: 107%; font-family: \'Arabic Typesetting\';">شكراً لثقتك بمستشفيات أندلسية</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span dir="LTR" style="font-size: 20pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
</td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>',
            'details'=>NULL,
            'type'=>'rich_text_box',
            'order'=>40,
            'group'=>'Notification'
        ] );

        Setting::create( [
            'id'=>70,
            'key'=>'sms.reminder',
            'display_name'=>'reminder',
            'value'=>'هذا تذكير بموعد حجزك',
            'details' => null,
            'type'=>'text_area',
            'order'=>43,
            'group'=>'sms'
        ] );

        Setting::create( [
            'id'=>71,
            'key'=>'sms.appointment_survey',
            'display_name'=>'survey (appointment)',
            'value'=>'من فضلك قم بإنهاء الدراسة الاستقصائية التالية
            http://andalusia.care/
            ',
            'details' => null,
            'type'=>'text_area',
            'order'=>44,
            'group'=>'sms'
        ] );


        Setting::create( [
            'id'=>72,
            'key'=>'site.refund_cancellation_policy',
            'display_name'=>'refund and cancellation policy',
            'value'=>'',
            'details'=>NULL,
            'type'=>'rich_text_box',
            'order'=>60,
            'group'=>'Site'
        ] );

        Setting::create( [
            'id'=>73,
            'key'=>'site.refund_cancellation_policy_ar',
            'display_name'=>'refund and cancellation policy (AR)',
            'value'=>'',
            'details'=>NULL,
            'type'=>'rich_text_box',
            'order'=>61,
            'group'=>'Site'
        ] );


        Setting::create( [
            'id'=>74,
            'key'=>'site.delivery_shipment_policy',
            'display_name'=>'delivery and shipment policy',
            'value'=>'',
            'details'=>NULL,
            'type'=>'rich_text_box',
            'order'=>62,
            'group'=>'Site'
        ] );

        Setting::create( [
            'id'=>75,
            'key'=>'site.delivery_shipment_policy_ar',
            'display_name'=>'delivery and shipment policy (AR)',
            'value'=>'',
            'details'=>NULL,
            'type'=>'rich_text_box',
            'order'=>63,
            'group'=>'Site'
        ] );

        Setting::create( [
            'id'=>76,
            'key'=>'site.privacy_policy',
            'display_name'=>'privacy policy',
            'value'=>'',
            'details'=>NULL,
            'type'=>'rich_text_box',
            'order'=>64,
            'group'=>'Site'
        ] );

        Setting::create( [
            'id'=>77,
            'key'=>'site.privacy_policy_ar',
            'display_name'=>'privacy policy (AR)',
            'value'=>'',
            'details'=>NULL,
            'type'=>'rich_text_box',
            'order'=>65,
            'group'=>'Site'
        ] );

        
        Setting::create( [
            'key'=>'site.twitter',
            'display_name'=>'Twitter',
            'value'=>'twitter.com',
            'details'=>NULL,
            'type'=>'text',
            'order'=>11,
            'group'=>'Site'
        ] );
        Setting::create( [
            'key'=>'site.youtube',
            'display_name'=>'Youtube',
            'value'=>'youtube.com',
            'details'=>NULL,
            'type'=>'text',
            'order'=>12,
            'group'=>'Site'
        ] );
        Setting::create( [
            'key'=>'site.whatsapp',
            'display_name'=>'Whatsapp',
            'value'=>'whatsapp.com',
            'details'=>NULL,
            'type'=>'text',
            'order'=>13,
            'group'=>'Site'
        ] );
             
        Setting::create( [
            'key'=>'site.instagram',
            'display_name'=>'Instagram',
            'value'=>'instagram.com',
            'details'=>NULL,
            'type'=>'text',
            'order'=>14,
            'group'=>'Site'
        ] );
             
        Setting::create( [
            'key'=>'site.about_us_en',
            'display_name'=>'About us en',
            'value'=>'about us',
            'details'=>NULL,
            'type'=>'text_area',
            'order'=>14,
            'group'=>'Site'
        ] );
        Setting::create( [
            'key'=>'site.about_us_small_en',
            'display_name'=>'About us small description en',
            'value'=>'about us small description en',
            'details'=>NULL,
            'type'=>'text_area',
            'order'=>14,
            'group'=>'Site'
        ] );
        Setting::create( [
            'key'=>'site.about_us_ar',
            'display_name'=>'About us ar',
            'value'=>'about us',
            'details'=>NULL,
            'type'=>'text_area',
            'order'=>15,
            'group'=>'Site'
        ] );
        Setting::create( [
            'key'=>'site.about_us_small_ar',
            'display_name'=>'About us small description ar',
            'value'=>'about us',
            'details'=>NULL,
            'type'=>'text_area',
            'order'=>15,
            'group'=>'Site'
        ] );

        Setting::create( [
            'key'=>'site.about_us_image',
            'display_name'=>'About us image',
            'value'=>'settings\\January2020\\v9ZiHGxNC4XZumvUqkU8.jpg',
            'details'=>NULL,
            'type'=>'image',
            'order'=>16,
            'group'=>'Site'
        ] );
        Setting::create( [
            'key'=>'site.about_us_image_title',
            'display_name'=>'about us image title',
            'value'=>'image title',
            'details'=>NULL,
            'type'=>'text',
            'order'=>17,
            'group'=>'Site'
        ] );

        Setting::create( [
            'key'=>'site.about_us_image_alt',
            'display_name'=>'about us image alt',
            'value'=>'image alt',
            'details'=>NULL,
            'type'=>'text',
            'order'=>18,
            'group'=>'Site'
        ] );
        Setting::create( [
            'key'=>'site.email',
            'display_name'=>'Email',
            'value'=>'',
            'details'=>NULL,
            'type'=>'text',
            'order'=>19,
            'group'=>'Site'
        ] );
        Setting::create( [
            'key'=>'site.appointments',
            'display_name'=>'Appointments',
            'value'=>'',
            'details'=>NULL,
            'type'=>'text',
            'order'=>20,
            'group'=>'Site'
        ] );
        Setting::create( [
            'key'=>'site.contact_us_email',
            'display_name'=>'Contact us email',
            'value'=>'',
            'details'=>NULL,
            'type'=>'text',
            'order'=>21,
            'group'=>'Site'
        ] );
        Setting::create( [
            'key'=>'site.blog_video',
            'display_name'=>'Blog video',
            'value'=>'',
            'details'=>NULL,
            'type'=>'text_area',
            'order'=>22,
            'group'=>'Site'
        ] );
        Setting::create( [
            'key'=>'site.journey_subtitle_ar',
            'display_name'=>'Journey subtitle arabic',
            'value'=>'',
            'details'=>NULL,
            'type'=>'text_area',
            'order'=>23,
            'group'=>'Site'
        ] );
        Setting::create( [
            'key'=>'site.journey_subtitle_en',
            'display_name'=>'Journey subtitle english',
            'value'=>'',
            'details'=>NULL,
            'type'=>'text_area',
            'order'=>24,
            'group'=>'Site'
        ] );
        Setting::create( [
            'key'=>'site.services_subtitle_ar',
            'display_name'=>'Services subtitle arabic',
            'value'=>'',
            'details'=>NULL,
            'type'=>'text_area',
            'order'=>25,
            'group'=>'Site'
        ] );
        Setting::create( [
            'key'=>'site.services_subtitle_en',
            'display_name'=>'Services subtitle english',
            'value'=>'',
            'details'=>NULL,
            'type'=>'text_area',
            'order'=>26,
            'group'=>'Site'
        ] );
        Setting::create( [
            'key'=>'site.doctors_subtitle_ar',
            'display_name'=>'Doctors subtitle arabic',
            'value'=>'',
            'details'=>NULL,
            'type'=>'text_area',
            'order'=>27,
            'group'=>'Site'
        ] );
        Setting::create( [
            'key'=>'site.doctors_subtitle_en',
            'display_name'=>'Doctors subtitle english',
            'value'=>'',
            'details'=>NULL,
            'type'=>'text_area',
            'order'=>28,
            'group'=>'Site'
        ] );
       
        Setting::create( [
            'key'=>'site.testimonials_subtitle_ar',
            'display_name'=>'Testimonials subtitle arabic',
            'value'=>'',
            'details'=>NULL,
            'type'=>'text_area',
            'order'=>29,
            'group'=>'Site'
        ] );
       
        Setting::create( [
            'key'=>'site.testimonials_subtitle_en',
            'display_name'=>'Testimonials subtitle english',
            'value'=>'',
            'details'=>NULL,
            'type'=>'text_area',
            'order'=>30,
            'group'=>'Site'
        ] );
       

        Setting::create( [
            'key'=>'site.events_subtitle_ar',
            'display_name'=>'Events subtitle arabic',
            'value'=>'',
            'details'=>NULL,
            'type'=>'text_area',
            'order'=>31,
            'group'=>'Site'
        ] );
       
        Setting::create( [
            'key'=>'site.events_subtitle_en',
            'display_name'=>'Events subtitle english',
            'value'=>'',
            'details'=>NULL,
            'type'=>'text_area',
            'order'=>32,
            'group'=>'Site'
        ] );
        

        Setting::create( [
            'key'=>'site.selling_points_subtitle_ar',
            'display_name'=>'Selling points subtitle arabic',
            'value'=>'',
            'details'=>NULL,
            'type'=>'text_area',
            'order'=>33,
            'group'=>'Site'
        ] );
       
        Setting::create( [
            'key'=>'site.selling_points_subtitle_en',
            'display_name'=>'Selling points subtitle english',
            'value'=>'',
            'details'=>NULL,
            'type'=>'text_area',
            'order'=>34,
            'group'=>'Site'
        ] );

        //        _________________________End________Seed Settings Table___________________________________________________________________________

        //        _________________________Start________Seed slider Table___________________________________________________________________________

        Slider::create( [
            'id'=>1,
            'photo_ar'=>'sliders\\January2020\\uZbTrqEKaRibB8S0LBjS.jpg',
            'photo_en'=>'sliders\\January2020\\70Ow45LmLS8haYyyjKh9.jpg',
            'link'=>'http://tawfek.tk/ar',
            'status'=>1,
            'created_at'=>'2020-01-29 06:28:47',
            'updated_at'=>'2020-01-29 06:30:18'
        ] );



        Slider::create( [
            'id'=>2,
            'photo_ar'=>'sliders\\January2020\\wtbx6osMEoLdtAYwj3f0.jpg',
            'photo_en'=>'sliders\\January2020\\McXT73mj1asWVcINDlcF.jpg',
            'link'=>'http://tawfek.tk/arabic',
            'status'=>1,
            'created_at'=>'2020-01-29 06:29:34',
            'updated_at'=>'2020-02-24 07:18:51'
        ] );



        Slider::create( [
            'id'=>3,
            'photo_ar'=>'sliders\\January2020\\IacT4Ln8tMPI0d581OAF.jpg',
            'photo_en'=>'sliders\\January2020\\4kBBO0BLTEVNf6RKopds.jpg',
            'link'=>'http://tawfek.tk/test/ar',
            'status'=>1,
            'created_at'=>'2020-01-29 06:30:12',
            'updated_at'=>'2020-02-24 07:18:50'
        ] );



        //        _________________________End________Seed slider Table___________________________________________________________________________

        //        _________________________Start________Seed specialities Table___________________________________________________________________________
        Speciality::create( [
            'id'=>1,
            'name'=>'أخصائي طب الأسنان',
            'created_at'=>'2020-04-07 21:10:28',
            'updated_at'=>'2020-04-07 21:10:28'
        ] );



        Speciality::create( [
            'id'=>2,
            'name'=>'أخصائي امراض القلب والاوعية الدموية',
            'created_at'=>'2020-04-07 21:10:28',
            'updated_at'=>'2020-04-07 21:10:28'
        ] );



        Speciality::create( [
            'id'=>3,
            'name'=>'استشاري الجراحة العامة',
            'created_at'=>'2020-04-07 21:10:28',
            'updated_at'=>'2020-04-07 21:10:28'
        ] );



        Speciality::create( [
            'id'=>4,
            'name'=>'أخصائي الأمراض الجلدية',
            'created_at'=>'2020-04-07 21:10:28',
            'updated_at'=>'2020-04-07 21:10:28'
        ] );



        Speciality::create( [
            'id'=>5,
            'name'=>'أخصائى أنف وأذن وحنجرة',
            'created_at'=>'2020-04-07 21:10:28',
            'updated_at'=>'2020-04-07 21:10:28'
        ] );



        Speciality::create( [
            'id'=>6,
            'name'=>'أخصائي أمراض الباطنة وأمراض الكلى',
            'created_at'=>'2020-04-07 21:10:28',
            'updated_at'=>'2020-04-07 21:10:28'
        ] );



        Speciality::create( [
            'id'=>7,
            'name'=>'أخصائي أمراض الجهاز الهضمي والكلى',
            'created_at'=>'2020-04-07 21:10:28',
            'updated_at'=>'2020-04-07 21:10:28'
        ] );



        Speciality::create( [
            'id'=>8,
            'name'=>'أخصائي الامراض الباطنية',
            'created_at'=>'2020-04-07 21:10:28',
            'updated_at'=>'2020-04-07 21:10:28'
        ] );



        Speciality::create( [
            'id'=>9,
            'name'=>'استشارى أمراض المخ و الأعصاب',
            'created_at'=>'2020-04-07 21:10:28',
            'updated_at'=>'2020-04-07 21:10:28'
        ] );



        Speciality::create( [
            'id'=>10,
            'name'=>'أخصائي أمراض النساء و الولادة',
            'created_at'=>'2020-04-07 21:10:28',
            'updated_at'=>'2020-04-07 21:10:28'
        ] );



        Speciality::create( [
            'id'=>11,
            'name'=>'أخصائى أول نساء وولادة',
            'created_at'=>'2020-04-07 21:10:28',
            'updated_at'=>'2020-04-07 21:10:28'
        ] );



        Speciality::create( [
            'id'=>12,
            'name'=>'استشارى طب و جراحة العيون',
            'created_at'=>'2020-04-07 21:10:28',
            'updated_at'=>'2020-04-07 21:10:28'
        ] );



        Speciality::create( [
            'id'=>13,
            'name'=>'أخصائي أمراض العظام والمفاصل',
            'created_at'=>'2020-04-07 21:10:28',
            'updated_at'=>'2020-04-07 21:10:28'
        ] );



        Speciality::create( [
            'id'=>14,
            'name'=>'أخصائى طب الأطفال',
            'created_at'=>'2020-04-07 21:10:28',
            'updated_at'=>'2020-04-07 21:10:28'
        ] );



        Speciality::create( [
            'id'=>15,
            'name'=>'استشاري المسالك البولية',
            'created_at'=>'2020-04-07 21:10:28',
            'updated_at'=>'2020-04-07 21:10:28'
        ] );



        Speciality::create( [
            'id'=>16,
            'name'=>'استشارى أمراض النفسية',
            'created_at'=>'2020-04-07 21:10:28',
            'updated_at'=>'2020-04-07 21:10:28'
        ] );



        Speciality::create( [
            'id'=>17,
            'name'=>'استشارى الأمراض الصدرية',
            'created_at'=>'2020-04-07 21:10:28',
            'updated_at'=>'2020-04-07 21:10:28'
        ] );

        //        _________________________End________Seed specialities Table___________________________________________________________________________

        //        _________________________Start________Seed Tag Table___________________________________________________________________________

        Tag::create( [
            'id'=>1,
            'name'=>'أسباب التشوهات الخلقية عند الجنين',
            'slug'=>'أسباب-التشوهات-الخلقية-عند-الجنين',
            'description'=>'',
            'created_at'=>'2020-01-29 07:10:07',
            'updated_at'=>'2020-01-29 07:10:07'
        ] );



        Tag::create( [
            'id'=>2,
            'name'=>'أعراض سرطان الثدى',
            'slug'=>'أعراض-سرطان-الثدى',
            'description'=>'',
            'created_at'=>'2020-01-29 07:10:00',
            'updated_at'=>'2020-01-29 09:06:14'
        ] );
        //        _________________________End________Seed Tag Table___________________________________________________________________________

        //        _________________________Start________Seed Translation Table___________________________________________________________________________

        Translation::create( [
            'id'=>1,
            'table_name'=>'data_types',
            'column_name'=>'display_name_singular',
            'foreign_key'=>5,
            'locale'=>'pt',
            'value'=>'Post',
            'created_at'=>'2020-04-01 06:26:55',
            'updated_at'=>'2020-04-01 06:26:55'
        ] );



        Translation::create( [
            'id'=>2,
            'table_name'=>'data_types',
            'column_name'=>'display_name_singular',
            'foreign_key'=>6,
            'locale'=>'pt',
            'value'=>'Página',
            'created_at'=>'2020-04-01 06:26:55',
            'updated_at'=>'2020-04-01 06:26:55'
        ] );



        Translation::create( [
            'id'=>3,
            'table_name'=>'data_types',
            'column_name'=>'display_name_singular',
            'foreign_key'=>1,
            'locale'=>'pt',
            'value'=>'Utilizador',
            'created_at'=>'2020-04-01 06:26:55',
            'updated_at'=>'2020-04-01 06:26:55'
        ] );



        Translation::create( [
            'id'=>4,
            'table_name'=>'data_types',
            'column_name'=>'display_name_singular',
            'foreign_key'=>4,
            'locale'=>'pt',
            'value'=>'Categoria',
            'created_at'=>'2020-04-01 06:26:55',
            'updated_at'=>'2020-04-01 06:26:55'
        ] );



        Translation::create( [
            'id'=>5,
            'table_name'=>'data_types',
            'column_name'=>'display_name_singular',
            'foreign_key'=>2,
            'locale'=>'pt',
            'value'=>'Menu',
            'created_at'=>'2020-04-01 06:26:55',
            'updated_at'=>'2020-04-01 06:26:55'
        ] );



        Translation::create( [
            'id'=>6,
            'table_name'=>'data_types',
            'column_name'=>'display_name_singular',
            'foreign_key'=>3,
            'locale'=>'pt',
            'value'=>'Função',
            'created_at'=>'2020-04-01 06:26:55',
            'updated_at'=>'2020-04-01 06:26:55'
        ] );



        Translation::create( [
            'id'=>7,
            'table_name'=>'data_types',
            'column_name'=>'display_name_plural',
            'foreign_key'=>5,
            'locale'=>'pt',
            'value'=>'Posts',
            'created_at'=>'2020-04-01 06:26:55',
            'updated_at'=>'2020-04-01 06:26:55'
        ] );



        Translation::create( [
            'id'=>8,
            'table_name'=>'data_types',
            'column_name'=>'display_name_plural',
            'foreign_key'=>6,
            'locale'=>'pt',
            'value'=>'Páginas',
            'created_at'=>'2020-04-01 06:26:55',
            'updated_at'=>'2020-04-01 06:26:55'
        ] );



        Translation::create( [
            'id'=>9,
            'table_name'=>'data_types',
            'column_name'=>'display_name_plural',
            'foreign_key'=>1,
            'locale'=>'pt',
            'value'=>'Utilizadores',
            'created_at'=>'2020-04-01 06:26:55',
            'updated_at'=>'2020-04-01 06:26:55'
        ] );



        Translation::create( [
            'id'=>10,
            'table_name'=>'data_types',
            'column_name'=>'display_name_plural',
            'foreign_key'=>4,
            'locale'=>'pt',
            'value'=>'Categorias',
            'created_at'=>'2020-04-01 06:26:55',
            'updated_at'=>'2020-04-01 06:26:55'
        ] );



        Translation::create( [
            'id'=>11,
            'table_name'=>'data_types',
            'column_name'=>'display_name_plural',
            'foreign_key'=>2,
            'locale'=>'pt',
            'value'=>'Menus',
            'created_at'=>'2020-04-01 06:26:55',
            'updated_at'=>'2020-04-01 06:26:55'
        ] );



        Translation::create( [
            'id'=>12,
            'table_name'=>'data_types',
            'column_name'=>'display_name_plural',
            'foreign_key'=>3,
            'locale'=>'pt',
            'value'=>'Funções',
            'created_at'=>'2020-04-01 06:26:55',
            'updated_at'=>'2020-04-01 06:26:55'
        ] );



        Translation::create( [
            'id'=>13,
            'table_name'=>'categories',
            'column_name'=>'slug',
            'foreign_key'=>1,
            'locale'=>'pt',
            'value'=>'categoria-1',
            'created_at'=>'2020-04-01 06:26:55',
            'updated_at'=>'2020-04-01 06:26:55'
        ] );



        Translation::create( [
            'id'=>14,
            'table_name'=>'categories',
            'column_name'=>'name',
            'foreign_key'=>1,
            'locale'=>'pt',
            'value'=>'Categoria 1',
            'created_at'=>'2020-04-01 06:26:55',
            'updated_at'=>'2020-04-01 06:26:55'
        ] );



        Translation::create( [
            'id'=>15,
            'table_name'=>'categories',
            'column_name'=>'slug',
            'foreign_key'=>2,
            'locale'=>'pt',
            'value'=>'categoria-2',
            'created_at'=>'2020-04-01 06:26:55',
            'updated_at'=>'2020-04-01 06:26:55'
        ] );



        Translation::create( [
            'id'=>16,
            'table_name'=>'categories',
            'column_name'=>'name',
            'foreign_key'=>2,
            'locale'=>'pt',
            'value'=>'Categoria 2',
            'created_at'=>'2020-04-01 06:26:55',
            'updated_at'=>'2020-04-01 06:26:55'
        ] );



        Translation::create( [
            'id'=>17,
            'table_name'=>'pages',
            'column_name'=>'title',
            'foreign_key'=>1,
            'locale'=>'pt',
            'value'=>'Olá Mundo',
            'created_at'=>'2020-04-01 06:26:55',
            'updated_at'=>'2020-04-01 06:26:55'
        ] );



        Translation::create( [
            'id'=>18,
            'table_name'=>'pages',
            'column_name'=>'slug',
            'foreign_key'=>1,
            'locale'=>'pt',
            'value'=>'ola-mundo',
            'created_at'=>'2020-04-01 06:26:55',
            'updated_at'=>'2020-04-01 06:26:55'
        ] );



        Translation::create( [
            'id'=>19,
            'table_name'=>'pages',
            'column_name'=>'body',
            'foreign_key'=>1,
            'locale'=>'pt',
            'value'=>'

Olá Mundo. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.

\r\n
Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.

',
            'created_at'=>'2020-04-01 06:26:55',
            'updated_at'=>'2020-04-01 06:26:55'
        ] );


        Translation::create( [
            'id'=>20,
            'table_name'=>'menu_items',
            'column_name'=>'title',
            'foreign_key'=>1,
            'locale'=>'pt',
            'value'=>'Painel de Controle',
            'created_at'=>'2020-04-01 06:26:55',
            'updated_at'=>'2020-04-01 06:26:55'
        ] );



        Translation::create( [
            'id'=>21,
            'table_name'=>'menu_items',
            'column_name'=>'title',
            'foreign_key'=>2,
            'locale'=>'pt',
            'value'=>'Media',
            'created_at'=>'2020-04-01 06:26:55',
            'updated_at'=>'2020-04-01 06:26:55'
        ] );



        Translation::create( [
            'id'=>22,
            'table_name'=>'menu_items',
            'column_name'=>'title',
            'foreign_key'=>12,
            'locale'=>'pt',
            'value'=>'Publicações',
            'created_at'=>'2020-04-01 06:26:55',
            'updated_at'=>'2020-04-01 06:26:55'
        ] );



        Translation::create( [
            'id'=>23,
            'table_name'=>'menu_items',
            'column_name'=>'title',
            'foreign_key'=>3,
            'locale'=>'pt',
            'value'=>'Utilizadores',
            'created_at'=>'2020-04-01 06:26:55',
            'updated_at'=>'2020-04-01 06:26:55'
        ] );



        Translation::create( [
            'id'=>24,
            'table_name'=>'menu_items',
            'column_name'=>'title',
            'foreign_key'=>11,
            'locale'=>'pt',
            'value'=>'Categorias',
            'created_at'=>'2020-04-01 06:26:55',
            'updated_at'=>'2020-04-01 06:26:55'
        ] );



        Translation::create( [
            'id'=>25,
            'table_name'=>'menu_items',
            'column_name'=>'title',
            'foreign_key'=>13,
            'locale'=>'pt',
            'value'=>'Páginas',
            'created_at'=>'2020-04-01 06:26:55',
            'updated_at'=>'2020-04-01 06:26:55'
        ] );



        Translation::create( [
            'id'=>26,
            'table_name'=>'menu_items',
            'column_name'=>'title',
            'foreign_key'=>4,
            'locale'=>'pt',
            'value'=>'Funções',
            'created_at'=>'2020-04-01 06:26:55',
            'updated_at'=>'2020-04-01 06:26:55'
        ] );



        Translation::create( [
            'id'=>27,
            'table_name'=>'menu_items',
            'column_name'=>'title',
            'foreign_key'=>5,
            'locale'=>'pt',
            'value'=>'Ferramentas',
            'created_at'=>'2020-04-01 06:26:55',
            'updated_at'=>'2020-04-01 06:26:55'
        ] );



        Translation::create( [
            'id'=>28,
            'table_name'=>'menu_items',
            'column_name'=>'title',
            'foreign_key'=>6,
            'locale'=>'pt',
            'value'=>'Menus',
            'created_at'=>'2020-04-01 06:26:55',
            'updated_at'=>'2020-04-01 06:26:55'
        ] );



        Translation::create( [
            'id'=>29,
            'table_name'=>'menu_items',
            'column_name'=>'title',
            'foreign_key'=>7,
            'locale'=>'pt',
            'value'=>'Base de dados',
            'created_at'=>'2020-04-01 06:26:55',
            'updated_at'=>'2020-04-01 06:26:55'
        ] );



        Translation::create( [
            'id'=>30,
            'table_name'=>'menu_items',
            'column_name'=>'title',
            'foreign_key'=>10,
            'locale'=>'pt',
            'value'=>'Configurações',
            'created_at'=>'2020-04-01 06:26:55',
            'updated_at'=>'2020-04-01 06:26:55'
        ] );



        Translation::create( [
            'id'=>34,
            'table_name'=>'data_rows',
            'column_name'=>'display_name',
            'foreign_key'=>229,
            'locale'=>'en',
            'value'=>'ID',
            'created_at'=>'2020-04-01 08:10:56',
            'updated_at'=>'2020-04-01 08:10:56'
        ] );



        Translation::create( [
            'id'=>35,
            'table_name'=>'data_rows',
            'column_name'=>'display_name',
            'foreign_key'=>234,
            'locale'=>'en',
            'value'=>'Title',
            'created_at'=>'2020-04-01 08:10:56',
            'updated_at'=>'2020-04-01 08:10:56'
        ] );



        Translation::create( [
            'id'=>36,
            'table_name'=>'data_rows',
            'column_name'=>'display_name',
            'foreign_key'=>235,
            'locale'=>'en',
            'value'=>'Title En',
            'created_at'=>'2020-04-01 08:10:56',
            'updated_at'=>'2020-04-01 08:10:56'
        ] );



        Translation::create( [
            'id'=>37,
            'table_name'=>'data_rows',
            'column_name'=>'display_name',
            'foreign_key'=>236,
            'locale'=>'en',
            'value'=>'Description',
            'created_at'=>'2020-04-01 08:10:56',
            'updated_at'=>'2020-04-01 08:10:56'
        ] );



        Translation::create( [
            'id'=>38,
            'table_name'=>'data_rows',
            'column_name'=>'display_name',
            'foreign_key'=>237,
            'locale'=>'en',
            'value'=>'Position',
            'created_at'=>'2020-04-01 08:10:56',
            'updated_at'=>'2020-04-01 08:10:56'
        ] );



        Translation::create( [
            'id'=>39,
            'table_name'=>'data_rows',
            'column_name'=>'display_name',
            'foreign_key'=>238,
            'locale'=>'en',
            'value'=>'Speciality',
            'created_at'=>'2020-04-01 08:10:56',
            'updated_at'=>'2020-04-01 08:10:56'
        ] );



        Translation::create( [
            'id'=>40,
            'table_name'=>'data_rows',
            'column_name'=>'display_name',
            'foreign_key'=>239,
            'locale'=>'en',
            'value'=>'Photo',
            'created_at'=>'2020-04-01 08:10:56',
            'updated_at'=>'2020-04-01 08:10:56'
        ] );



        Translation::create( [
            'id'=>41,
            'table_name'=>'data_rows',
            'column_name'=>'display_name',
            'foreign_key'=>240,
            'locale'=>'en',
            'value'=>'Meta Keywords',
            'created_at'=>'2020-04-01 08:10:56',
            'updated_at'=>'2020-04-01 08:10:56'
        ] );



        Translation::create( [
            'id'=>42,
            'table_name'=>'data_rows',
            'column_name'=>'display_name',
            'foreign_key'=>241,
            'locale'=>'en',
            'value'=>'Meta Description',
            'created_at'=>'2020-04-01 08:10:56',
            'updated_at'=>'2020-04-01 08:10:56'
        ] );



        Translation::create( [
            'id'=>43,
            'table_name'=>'data_rows',
            'column_name'=>'display_name',
            'foreign_key'=>242,
            'locale'=>'en',
            'value'=>'Status',
            'created_at'=>'2020-04-01 08:10:56',
            'updated_at'=>'2020-04-01 08:10:56'
        ] );



        Translation::create( [
            'id'=>44,
            'table_name'=>'data_rows',
            'column_name'=>'display_name',
            'foreign_key'=>243,
            'locale'=>'en',
            'value'=>'Created At',
            'created_at'=>'2020-04-01 08:10:56',
            'updated_at'=>'2020-04-01 08:10:56'
        ] );



        Translation::create( [
            'id'=>45,
            'table_name'=>'data_rows',
            'column_name'=>'display_name',
            'foreign_key'=>244,
            'locale'=>'en',
            'value'=>'Updated At',
            'created_at'=>'2020-04-01 08:10:56',
            'updated_at'=>'2020-04-01 08:10:56'
        ] );



        Translation::create( [
            'id'=>46,
            'table_name'=>'data_rows',
            'column_name'=>'display_name',
            'foreign_key'=>232,
            'locale'=>'en',
            'value'=>'Clinic Id',
            'created_at'=>'2020-04-01 08:10:56',
            'updated_at'=>'2020-04-01 08:10:56'
        ] );



        Translation::create( [
            'id'=>47,
            'table_name'=>'data_rows',
            'column_name'=>'display_name',
            'foreign_key'=>230,
            'locale'=>'en',
            'value'=>'Speciality Id',
            'created_at'=>'2020-04-01 08:10:56',
            'updated_at'=>'2020-04-01 08:10:56'
        ] );



        Translation::create( [
            'id'=>48,
            'table_name'=>'data_types',
            'column_name'=>'display_name_singular',
            'foreign_key'=>29,
            'locale'=>'en',
            'value'=>'Doctor',
            'created_at'=>'2020-04-01 08:10:56',
            'updated_at'=>'2020-04-01 08:10:56'
        ] );



        Translation::create( [
            'id'=>49,
            'table_name'=>'data_types',
            'column_name'=>'display_name_plural',
            'foreign_key'=>29,
            'locale'=>'en',
            'value'=>'Doctors',
            'created_at'=>'2020-04-01 08:10:56',
            'updated_at'=>'2020-04-01 08:10:56'
        ] );



        Translation::create( [
            'id'=>50,
            'table_name'=>'data_rows',
            'column_name'=>'display_name',
            'foreign_key'=>270,
            'locale'=>'en',
            'value'=>'Slug',
            'created_at'=>'2020-04-01 08:20:43',
            'updated_at'=>'2020-04-01 08:20:43'
        ] );



        Translation::create( [
            'id'=>51,
            'table_name'=>'data_rows',
            'column_name'=>'display_name',
            'foreign_key'=>271,
            'locale'=>'en',
            'value'=>'Slug En',
            'created_at'=>'2020-04-01 08:20:43',
            'updated_at'=>'2020-04-01 08:20:43'
        ] );



        Translation::create( [
            'id'=>52,
            'table_name'=>'data_rows',
            'column_name'=>'display_name',
            'foreign_key'=>272,
            'locale'=>'en',
            'value'=>'Email',
            'created_at'=>'2020-04-01 08:20:43',
            'updated_at'=>'2020-04-01 08:20:43'
        ] );



        Translation::create( [
            'id'=>53,
            'table_name'=>'data_rows',
            'column_name'=>'display_name',
            'foreign_key'=>273,
            'locale'=>'en',
            'value'=>'Phone',
            'created_at'=>'2020-04-01 08:20:43',
            'updated_at'=>'2020-04-01 08:20:43'
        ] );



        Translation::create( [
            'id'=>54,
            'table_name'=>'data_rows',
            'column_name'=>'display_name',
            'foreign_key'=>274,
            'locale'=>'en',
            'value'=>'Price',
            'created_at'=>'2020-04-01 08:20:43',
            'updated_at'=>'2020-04-01 08:20:43'
        ] );



        Translation::create( [
            'id'=>55,
            'table_name'=>'data_rows',
            'column_name'=>'display_name',
            'foreign_key'=>275,
            'locale'=>'en',
            'value'=>'Duration By Min',
            'created_at'=>'2020-04-01 08:20:43',
            'updated_at'=>'2020-04-01 08:20:43'
        ] );



        Translation::create( [
            'id'=>56,
            'table_name'=>'data_rows',
            'column_name'=>'display_name',
            'foreign_key'=>276,
            'locale'=>'en',
            'value'=>'Gender',
            'created_at'=>'2020-04-01 08:20:43',
            'updated_at'=>'2020-04-01 08:20:43'
        ] );
        Translation::create( [
            'id'=>127,
            'table_name'=>'data_rows',
            'column_name'=>'display_name',
            'foreign_key'=>254,
            'locale'=>'en',
            'value'=>'ID',
            'created_at'=>'2020-04-04 19:11:42',
            'updated_at'=>'2020-04-04 19:11:42'
        ] );



        Translation::create( [
            'id'=>128,
            'table_name'=>'data_rows',
            'column_name'=>'display_name',
            'foreign_key'=>255,
            'locale'=>'en',
            'value'=>'Doctor Id',
            'created_at'=>'2020-04-04 19:11:42',
            'updated_at'=>'2020-04-04 19:11:42'
        ] );



        Translation::create( [
            'id'=>129,
            'table_name'=>'data_rows',
            'column_name'=>'display_name',
            'foreign_key'=>257,
            'locale'=>'en',
            'value'=>'User Id',
            'created_at'=>'2020-04-04 19:11:42',
            'updated_at'=>'2020-04-04 19:11:42'
        ] );



        Translation::create( [
            'id'=>130,
            'table_name'=>'data_rows',
            'column_name'=>'display_name',
            'foreign_key'=>259,
            'locale'=>'en',
            'value'=>'Start',
            'created_at'=>'2020-04-04 19:11:42',
            'updated_at'=>'2020-04-04 19:11:42'
        ] );



        Translation::create( [
            'id'=>131,
            'table_name'=>'data_rows',
            'column_name'=>'display_name',
            'foreign_key'=>260,
            'locale'=>'en',
            'value'=>'Duration',
            'created_at'=>'2020-04-04 19:11:42',
            'updated_at'=>'2020-04-04 19:11:42'
        ] );



        Translation::create( [
            'id'=>132,
            'table_name'=>'data_rows',
            'column_name'=>'display_name',
            'foreign_key'=>261,
            'locale'=>'en',
            'value'=>'Comments',
            'created_at'=>'2020-04-04 19:11:42',
            'updated_at'=>'2020-04-04 19:11:42'
        ] );



        Translation::create( [
            'id'=>133,
            'table_name'=>'data_rows',
            'column_name'=>'display_name',
            'foreign_key'=>262,
            'locale'=>'en',
            'value'=>'Confirmed',
            'created_at'=>'2020-04-04 19:11:42',
            'updated_at'=>'2020-04-04 19:11:42'
        ] );



        Translation::create( [
            'id'=>134,
            'table_name'=>'data_rows',
            'column_name'=>'display_name',
            'foreign_key'=>263,
            'locale'=>'en',
            'value'=>'Payment Confirmed',
            'created_at'=>'2020-04-04 19:11:42',
            'updated_at'=>'2020-04-04 19:11:42'
        ] );



        Translation::create( [
            'id'=>135,
            'table_name'=>'data_rows',
            'column_name'=>'display_name',
            'foreign_key'=>264,
            'locale'=>'en',
            'value'=>'Created At',
            'created_at'=>'2020-04-04 19:11:42',
            'updated_at'=>'2020-04-04 19:11:42'
        ] );



        Translation::create( [
            'id'=>136,
            'table_name'=>'data_rows',
            'column_name'=>'display_name',
            'foreign_key'=>265,
            'locale'=>'en',
            'value'=>'Updated At',
            'created_at'=>'2020-04-04 19:11:42',
            'updated_at'=>'2020-04-04 19:11:42'
        ] );



        Translation::create( [
            'id'=>137,
            'table_name'=>'data_types',
            'column_name'=>'display_name_singular',
            'foreign_key'=>31,
            'locale'=>'en',
            'value'=>'Appointment',
            'created_at'=>'2020-04-04 19:11:42',
            'updated_at'=>'2020-04-04 19:11:42'
        ] );



        Translation::create( [
            'id'=>138,
            'table_name'=>'data_types',
            'column_name'=>'display_name_plural',
            'foreign_key'=>31,
            'locale'=>'en',
            'value'=>'Appointments',
            'created_at'=>'2020-04-04 19:11:42',
            'updated_at'=>'2020-04-04 19:11:42'
        ] );

        Translation::create( [
            'id'=>194,
            'table_name'=>'doctors',
            'column_name'=>'description',
            'foreign_key'=>33,
            'locale'=>'en',
            'value'=>'

Description en

',
            'created_at'=>'2020-04-06 13:48:29',
            'updated_at'=>'2020-04-06 13:48:29'
        ] );


        Translation::create( [
            'id'=>195,
            'table_name'=>'posts',
            'column_name'=>'title',
            'foreign_key'=>1,
            'locale'=>'en',
            'value'=>'عملية تغيير مفصل الركبة',
            'created_at'=>'2020-04-06 14:01:20',
            'updated_at'=>'2020-04-06 14:01:20'
        ] );



        Translation::create( [
            'id'=>196,
            'table_name'=>'posts',
            'column_name'=>'excerpt',
            'foreign_key'=>1,
            'locale'=>'en',
            'value'=>'تعتبر من أدق عمليات العظام التي تحتاج للخبرة والمهارة في إجراءها لتجنب حدوث أي مضاعفات، ويتم إجراء هذة العملية نتيجة تعرض المفصل للضرر الشديد',
            'created_at'=>'2020-04-06 14:01:20',
            'updated_at'=>'2020-04-06 14:01:20'
        ] );



        Translation::create( [
            'id'=>197,
            'table_name'=>'posts',
            'column_name'=>'body',
            'foreign_key'=>1,
            'locale'=>'en',
            'value'=>'

عملية تغيير مفصل الركبة

\n
عملية تغيير مفصل الركبة
\n
تعتبر من أدق عمليات العظام التي تحتاج للخبرة والمهارة في إجراءها لتجنب حدوث أي مضاعفات، ويتم إجراء هذة العملية نتيجة تعرض المفصل للضرر الشديد أو للتآكل مما يسبب آلام قوية يصعب تحملها وتؤدي لصعوبة في الحركة، وهنا العملية هي الحل الأمثل للتخلص من هذه الآلام المزعجة وامتلاك القدرة على ممارسة الأنشطة اليومية بسهولة.

\n
تحتاج هذة العملية لإجراء الكثير من الفحوصات والتحاليل قبل العملية للتأكد من أنها الحل المناسب والأخير للقضاء على آلام الركبة والقدرة على الحركة بشكل سليم.

\n
وفي العملية يتم استبدال المفصل الطبيعي بآخر صناعي مصنوع من التيتانيوم أو البلاستيك القوي، ويتم إجراءها تحت تأثير التخدير الموضعي أو الكلي حسب ما يحدده الطبيب.

\n
تنقسم عملية تغيير المفصل إلى نوعين وهما :-
\n
- تغيير كلي لمفصل الركبة.

\n
حيث يتم تغيير المفصل بالكامل نتيجة حدوث تضرر أو تآكل المفصل بالكامل.

\n
- تغيير جزئي لمفصل الركبة.

\n
حيث يتم تغيير الجزء المتضرر فقط من المفصل، وذلك ضمن شروط معينة وهي:-

\n
- أن يكون الرباط الصليبي الأمامي سليمًا.

\n
- وأن يكون النصف الخارجي من المفصل سليمًا.

\n
- أن يكون مقدار الاعوجاج أقل من 15 درجة.

\n
6 أسباب لإجراء عملية مفصل الركبة :
\n
يلجأ الطبيب لإجراء تغيير المفصل الركبة للحالات التي لا تتحمل الآلام والضغط على الركبة ومن هذه الحالات:-

\n
1- هشاشة العظام:

\n
وتعتبر هشاشة العظام من الأسباب الرئيسية لإجراء العملية حيث يصبح المفصل ضعيف وهش غير قادر على تحمل المزيد من الضغط عليه.

\n
2- خشونة الركبة:

\n
الخشونة هي تآكل لغضروف الركبة ومن ثم تآكل المفصل نفسه وفي الحالات المتقدمة يصبح المفصل غير قادر على امتصاص الصدمات مما يعوق الحركة بشكل كبير أو يمنعها نسبياً.

\n
3- زيادة الوزن:

\n
تشكل السمنة خطراً  كبيراً على مفصل الركبة لأن الوزن الزائد يؤدي إلى زيادة الضغط على المفصل و

\n
تآكل الغضروف.

\n
4- الإصابات الخارجية:

\n
كالإصابات التي تحدث في الملاعب أو إصابات الحوادث والكسور.

\n
5- الاستئصال الجزئي للغضروف المفصلي للركبة:

\n
بعد هذا الاستئصال يفقد المفصل قدرته على امتصاص الصدمات فقد تحتاج بعض الحالات حينها لاستبدال المفصل.

\n
6- التهاب المفاصل الروماتويدي:

\n
تسبب الالتهابات الروماتويدية آلام شديدة لا تُحتمل في المفاصل وقد تؤدي في النهاية إلى تشوه كامل في المفصل فيضطر الطبيب لإجراء عملية تبديل مفصل الركبة.

\n
علامات تستدعي إجراء عملية تغيير مفصل الركبة :-
\n
- حدوث تآكل في مفصل أو غضروف الركبة.

\n
- آلام شديدة في الركبة وتظهر خاصة في أوقات الراحة وأثناء النوم ليلاً.

\n
- التيبس والتصلب في مفصل الركبة لأنه يسبب صعوبة في ممارسة الأنشطة اليومية كصعوبة في ارتداء الملابس أو الأحذية وغيرها من الأنشطة اليومية المعتادة.

\n
- صعوبة في المشي.

\n
- محدودية الحركة وعدم قيام المفصل بأداء وظيفته كاملة. "عملية

\n
4 خطوات هامة قبل عـملية تغيير مـفصل الركبة:-
\n
قبل إجراء عملية تبديل مفصل الركبة يقوم الطبيب بتحديد الفحوصات والتحاليل التي يحتاجها المريض وهي:-

\n
- إجراء أشعة رنين مغناطيسي أو أشعة سينية على الركبة.

\n
- إجراء تحاليل للدم كصورة دم كاملة، وتخثر الدم، وكيمياء الدم، ووظائف الكلى والكبد.

\n
- إجراء فحص البول.

\n
- إجراء تخطيط كهربية القلب (رسم القلب).

\n
وإذا كان المريض يتناول أدوية معينة يحدد الطبيب الأدوية التي يجب التوقف عن تناولها قبل العملية.

\n
هل تظهر مضاعفات بعد عملية تغيير مفصل الركبة
\n
في بعض الحالات قد تظهر بعض المضاعفات مثل:

\n
- حدوث تورم والتهابات وآلام في المفصل.

\n
- التعرض لكسور في عظام الركبة.

\n
- حدوث تصلب في مفصل الركبة.

\n
- حدوث ضرر في العصب أو العضلات.

\n
ولكن هناك بعض الشروط التي قد تحميك من هذه المضاعفات وتساعد في نجاح عملية تبديل مفصل الركبة وهي..

\n
- إجراء العملية تحت إشراف طبيب عظام ماهر ومتخصص وله خبرة في إجراء عملية تبديل مفصل الركبة لمرات عديدة.

\n
- التأكد من جودة نوع المفصل المستخدم.

\n
- التخلص من الوزن الزائد قبل إجراء الجراحة.

\n
- عمل جلسات علاج طبيعي بعد إجراء الجراحة.

\n
-اتباع تعليمات الطبيب للحفاظ على المفصل لأطول فترة ممكنة.

\n
أهمية العلاج الطبيعي بعد عملية تغيير مفصل الركبة :-
\n
- يعد العلاج الطبيعي من أهم خطوات التعافي بعد عملية تبديل مفصل الركبة، وللحفاظ على مفصل الركبة الذي تم استبداله.

\n
- يعمل العلاج الطبيعي على تقوية عضلات الساق الضعيفة، لأن قوة العضلات تساعد في تخفيف ضغط وزن الجسم على مفاصل الركبة.

\n
بعد عملية تبديل مفصل الركبة تعرف على أنواع تمارين العلاج الطبيعي
\n
تتنوع تمارين العلاج الطبيعي لتناسب تفاصيل كل حالة ومن هذه التمارين..

\n
- العلاج المائي، لعلاج آلام العضلات الناتجة عن إجراء الجراحة، والشعور بالراحة والاسترخاء.

\n
- تمارين التوازن والإطالة والتقوية.

\n
- استخدام النبضات الكهربائية لتنشيط وتقوية العضلات.

\n
- استخدام الأشعة تحت الحمراء لتخفيف الألم والالتهابات، حيث أن حرارتها تساعد على توسيع الأوعية الدموية التي تخفف من الشعور بالألم بشكل كبير.

\n
- تدليك الأنسجة العميقة للتخفيف من تشنجات العضلات وتقليل الالتهابات.

\n
- العلاج بالترددات الاهتزازية لتقوية العضلات وزيادة نشاط الأعصاب.

\n
نصائح هامة بعد العملية :-
\n
- الراحة التامة في الفراش ووضع الساق في خط مستقيم لتسهيل تدفق الدم والتخفيف من الألم.

\n
- الانتظام في تناول الأدوية كما يصفها الطبيب لتمام التعافي من آثار العملية.

\n
- استخدام كمادات الثلج على مفصل الركبة في البداية بعد إجراء عملية تبديل مفصل الركبة، فالثلج يساعد على تخدير منطقة المفصل وبالتالي تقليل الشعور بالألم والتخفيف من الالتهابات.

\n
- بعد التئام الجرح يمكن استخدام كمادات المياه الساخنة للتخفيف من الألم وزيادة الشعور بالراحة والاسترخاء.

\n
- يمكن استخدام العكاز أو الكرسي المتحرك مؤقتاً خلال الأيام الأولى من إجراء الجراحة عند القيام بأي نشاط معين، وذلك لتجنب زيادة الضغط على المفصل أثناء المشي أو الجلوس.

\n
- الانتظام في عمل جلسات العلاج الطبيعي.

\n
- الالتزام بممارسة التمارين المنزلية التي يحددها الطبيب بانتظام للحفاظ على سلامة مفصل الركبة لأطول فترة ممكنة.

\n
- تجنب ثني الركبة أثناء الجلوس أو القفز خلال الأسابيع الأولى من إجراء عملية تبديل مفصل الركبة.

\n
- تجنب استخدام السلم لعدم الضغط علي الركبة التي تم إجراء العملية بها.

\n
- تجنب قيادة السيارة نهائياً حتى تمام التعافي من العملية والقدرة على تحريك المفصل بشكل سليم.

\n
- الالتزام بعمل الفحص الدوري لمفصل الركبة من خلال الأشعة للتأكد من أن المفصل يعمل بكفاءة وعدم وجود أي خلل في المفصل أو عظام الركبة.

\n
- النوم على سرير مرتفع للقيام من عليه بسهولة وعدم الشعور بألم.

\n
- الحفاظ على وزن الجسم لتجنب زيادة الضغط على مفصل الركبة.

\n
ومع الإلتزام بهذه النصائح وتعليمات الطبيب، يستعيد المفصل قوته وأداء وظيفته كاملة حيث يمكنك العودة لممارسة أنشطتك اليومية بسهولة ودون عناء.

\n
تعرف ايضاً علي :
\n
علاج ارتفاع الكوليسترول

\n
جلطة القلب و طرق التعامل معها.

\n
علاج اضطرابات النوم

\n
"سجل

',
            'created_at'=>'2020-04-06 14:01:20',
            'updated_at'=>'2020-04-06 14:01:20'
        ] );


        Translation::create( [
            'id'=>198,
            'table_name'=>'posts',
            'column_name'=>'slug',
            'foreign_key'=>1,
            'locale'=>'en',
            'value'=>'عملية-تغيير-مفصل-الركبة',
            'created_at'=>'2020-04-06 14:01:20',
            'updated_at'=>'2020-04-06 14:01:20'
        ] );



        Translation::create( [
            'id'=>199,
            'table_name'=>'posts',
            'column_name'=>'meta_description',
            'foreign_key'=>1,
            'locale'=>'en',
            'value'=>'تعرف الان على عملية تغيير مفصل الركبة فى السعودية وعملية تغيير مفصل الفخذ وماهي النصائح وافضل طرق للوقاية من مضاعفاتها..',
            'created_at'=>'2020-04-06 14:01:20',
            'updated_at'=>'2020-04-06 14:01:20'
        ] );



        Translation::create( [
            'id'=>200,
            'table_name'=>'posts',
            'column_name'=>'meta_keywords',
            'foreign_key'=>1,
            'locale'=>'en',
            'value'=>'عملية تغيير مفصل الركبة',
            'created_at'=>'2020-04-06 14:01:20',
            'updated_at'=>'2020-04-06 14:01:20'
        ] );



        Translation::create( [
            'id'=>201,
            'table_name'=>'posts',
            'column_name'=>'seo_title',
            'foreign_key'=>1,
            'locale'=>'en',
            'value'=>'عملية تغيير مفصل الركبة',
            'created_at'=>'2020-04-06 14:01:20',
            'updated_at'=>'2020-04-06 14:01:20'
        ] );



        Translation::create( [
            'id'=>202,
            'table_name'=>'doctors',
            'column_name'=>'description',
            'foreign_key'=>34,
            'locale'=>'en',
            'value'=>'

وصف

',
            'created_at'=>'2020-04-06 16:01:40',
            'updated_at'=>'2020-04-06 16:01:40'
        ] );


        Translation::create( [
            'id'=>203,
            'table_name'=>'doctors',
            'column_name'=>'position',
            'foreign_key'=>34,
            'locale'=>'en',
            'value'=>'جدة',
            'created_at'=>'2020-04-06 16:01:40',
            'updated_at'=>'2020-04-06 16:01:40'
        ] );



        Translation::create( [
            'id'=>204,
            'table_name'=>'doctors',
            'column_name'=>'speciality',
            'foreign_key'=>34,
            'locale'=>'en',
            'value'=>'اطفال',
            'created_at'=>'2020-04-06 16:01:40',
            'updated_at'=>'2020-04-06 16:01:40'
        ] );



        Translation::create( [
            'id'=>205,
            'table_name'=>'doctors',
            'column_name'=>'meta_keywords',
            'foreign_key'=>34,
            'locale'=>'en',
            'value'=>'تجربة 2',
            'created_at'=>'2020-04-06 16:01:40',
            'updated_at'=>'2020-04-06 16:01:40'
        ] );



        Translation::create( [
            'id'=>206,
            'table_name'=>'doctors',
            'column_name'=>'meta_description',
            'foreign_key'=>34,
            'locale'=>'en',
            'value'=>'وصف لتجربة الدكتور الجديد',
            'created_at'=>'2020-04-06 16:01:40',
            'updated_at'=>'2020-04-06 16:01:40'
        ] );

        Translation::create( [
            'id'=>211,
            'table_name'=>'doctors',
            'column_name'=>'description',
            'foreign_key'=>1,
            'locale'=>'en',
            'value'=>'Masters in oral and maxillofacial surgery - Dental checkup- Root canal treatment- Dental crowns- Bleaching- Panoramic X-ray- X-ray at Hai ElJamea Hospital',
            'created_at'=>'2020-04-07 21:10:27',
            'updated_at'=>'2020-04-07 21:10:27'
        ] );



        Translation::create( [
            'id'=>212,
            'table_name'=>'doctors',
            'column_name'=>'description',
            'foreign_key'=>2,
            'locale'=>'en',
            'value'=>'',
            'created_at'=>'2020-04-07 21:10:27',
            'updated_at'=>'2020-04-07 21:10:27'
        ] );



        Translation::create( [
            'id'=>213,
            'table_name'=>'doctors',
            'column_name'=>'description',
            'foreign_key'=>3,
            'locale'=>'en',
            'value'=>'',
            'created_at'=>'2020-04-07 21:10:27',
            'updated_at'=>'2020-04-07 21:10:27'
        ] );



        Translation::create( [
            'id'=>214,
            'table_name'=>'doctors',
            'column_name'=>'description',
            'foreign_key'=>4,
            'locale'=>'en',
            'value'=>'Masters in dermatology and venereal diseases - Skin inflammation and allergies-Acne-Skin and nails fungus-Hair related problems-Hairsutism-Skin ulcers-Urinary tract inflammation-Methotherapy treatment-PRP at Hai ElJamea Hospital',
            'created_at'=>'2020-04-07 21:10:27',
            'updated_at'=>'2020-04-07 21:10:27'
        ] );



        Translation::create( [
            'id'=>215,
            'table_name'=>'doctors',
            'column_name'=>'description',
            'foreign_key'=>5,
            'locale'=>'en',
            'value'=>'a Bachelor of Medicine from Alexandria University in 2005 and a Master in Dermatology and Venereal Diseases, as well as a Diploma in Aesthetic Medicine and Laser. at Hai ElJamea Hospital',
            'created_at'=>'2020-04-07 21:10:27',
            'updated_at'=>'2020-04-07 21:10:27'
        ] );



        Translation::create( [
            'id'=>216,
            'table_name'=>'doctors',
            'column_name'=>'description',
            'foreign_key'=>6,
            'locale'=>'en',
            'value'=>'Master degree in ENT - Treatment of Tonsillitis- Nose bleeding- Breath difficulties Sinusitis- Nose breaking- Vocal cords infection-Otis media- Hearing difficulties- Tympanic membrane rupture at Hai ElJamea Hospital',
            'created_at'=>'2020-04-07 21:10:27',
            'updated_at'=>'2020-04-07 21:10:27'
        ] );



        Translation::create( [
            'id'=>217,
            'table_name'=>'doctors',
            'column_name'=>'description',
            'foreign_key'=>7,
            'locale'=>'en',
            'value'=>'Masters of gastroenterology - Digestive system diseases - Esophageal varices treatment.- Digestive system endoscopy.- Diagnosis and treatment of inflammatory bowel diseases- Gallbladder and bile duct diseases- Fatty liver and liver hypertrophy.- Stomach and duodenal ulcers.- Early detection of digestive system tumors- Typhoid fever- Diabetes- Kidney diseases',
            'created_at'=>'2020-04-07 21:10:27',
            'updated_at'=>'2020-04-07 21:10:27'
        ] );



        Translation::create( [
            'id'=>218,
            'table_name'=>'doctors',
            'column_name'=>'description',
            'foreign_key'=>8,
            'locale'=>'en',
            'value'=>'Masters of gastroenterology - Digestive system diseases - Esophageal varies treatment.- Digestive system endoscopy.- Diagnosis and treatment of inflammatory bowel diseases- Gallbladder and bile duct diseases- Fatty liver and liver hypertrophy.- Stomach and duodenal ulcers.- Early detection of digestive system tumors- Typhoid fever- Diabetes- Kidney diseases at Hai ElJamea Hospital',
            'created_at'=>'2020-04-07 21:10:27',
            'updated_at'=>'2020-04-07 21:10:27'
        ] );



        Translation::create( [
            'id'=>219,
            'table_name'=>'doctors',
            'column_name'=>'description',
            'foreign_key'=>9,
            'locale'=>'en',
            'value'=>'Master of Internal Medicine - Digestive system diseases.- Mal-absorption and Maldigestion diseas, - Digestive system endoscopy.- Diagnosis and treatment of inflammatory bowel diseases.- Fatty liver and liver hypertrophy.- Stomach and duodenal ulcers. - Early detection of digestive system tumors.- Typhoid fever- Diabetes,Kidney diseases,Rheumatoid, immunological diseases- Colic and renal infections- Renal failure and its causes- Gastroscopy- Colonoscopy- Installation of stomach balloon- Connect and inject varicose veins and stomach- Expansion of the esophagus and colon- Laparoscopic cholecystectomy at Hai ElJamea Hospital',
            'created_at'=>'2020-04-07 21:10:27',
            'updated_at'=>'2020-04-07 21:10:27'
        ] );



        Translation::create( [
            'id'=>220,
            'table_name'=>'doctors',
            'column_name'=>'description',
            'foreign_key'=>10,
            'locale'=>'en',
            'value'=>'Ph.D in Neurology - Vertebral column surgeries.- Brain and spinal cord tumors.- Strokes and brain hemorrhage.- Vertebral column fractures.- Peripheral nerves pain.- Headache- Dimensia at Hai ElJamea Hospital',
            'created_at'=>'2020-04-07 21:10:27',
            'updated_at'=>'2020-04-07 21:10:27'
        ] );



        Translation::create( [
            'id'=>221,
            'table_name'=>'doctors',
            'column_name'=>'description',
            'foreign_key'=>11,
            'locale'=>'en',
            'value'=>'Master in Gynecology - Pregnancy and Delivery:- Critical pregnancy- Fertility clinic- Natural birth- Pregnancy poisoning (toxemia)- Repeated miscarriage- Ectopic pregnancy- Sterility (males and females)- Family planning- Complementary services:- 4D Ultrasound.- Menopause care and follow-up- Menstruation problems- Reproductive system problems- Uterine prolapse- Early detection of gynecologic cancers.- Cervical and ovarian cancer endoscopy',
            'created_at'=>'2020-04-07 21:10:27',
            'updated_at'=>'2020-04-07 21:10:27'
        ] );



        Translation::create( [
            'id'=>222,
            'table_name'=>'doctors',
            'column_name'=>'description',
            'foreign_key'=>12,
            'locale'=>'en',
            'value'=>'Masters in Gynecology - Pregnancy and Delivery:- Critical pregnancy- Fertility clinic- Natural birth- Pregnancy poisoning (toxemia)- Repeated miscarriage- Ectopic pregnancy- Sterility (males and females)- Family planning- Complementary services:- 4D Ultrasound.- Menopause care and follow-up- Menstruation problems- Reproductive system problems- Uterine prolapse- Early detection of gynecologic cancers.- Cervical and ovarian cancer endoscopy',
            'created_at'=>'2020-04-07 21:10:27',
            'updated_at'=>'2020-04-07 21:10:27'
        ] );



        Translation::create( [
            'id'=>223,
            'table_name'=>'doctors',
            'column_name'=>'description',
            'foreign_key'=>13,
            'locale'=>'en',
            'value'=>'5 years of experience in Obstetrics and Gynecology at Hai ElJamea Hospital',
            'created_at'=>'2020-04-07 21:10:27',
            'updated_at'=>'2020-04-07 21:10:27'
        ] );



        Translation::create( [
            'id'=>224,
            'table_name'=>'doctors',
            'column_name'=>'description',
            'foreign_key'=>14,
            'locale'=>'en',
            'value'=>'',
            'created_at'=>'2020-04-07 21:10:27',
            'updated_at'=>'2020-04-07 21:10:27'
        ] );



        Translation::create( [
            'id'=>225,
            'table_name'=>'doctors',
            'column_name'=>'description',
            'foreign_key'=>15,
            'locale'=>'en',
            'value'=>'Masters in orthopedic Surgery -Surgeries and Endoscopy:-Knee Arthroscopy.-Ligament tear and tendons inflammation.- Cruciform ligaments.-Joints replacement (primary and advanced).- Complicated fractures.-Bone cancer surgeries.-Hand surgeries.- Specialized Clinics:-Knee surgeries-Vertebral column surgeries-Shoulder  surgeries-Pediatric surgeries - Sports Clinic:- Knee, shoulder and ankle joints injuries.-Tendons and ligaments conservative treatment.-Recurrent shoulder dislocation - Diagnosis and Treatment for-Osteoporosis - All bones pain conditions -Fracture reduction and fixation without surgery.',
            'created_at'=>'2020-04-07 21:10:27',
            'updated_at'=>'2020-04-07 21:10:27'
        ] );



        Translation::create( [
            'id'=>226,
            'table_name'=>'doctors',
            'column_name'=>'description',
            'foreign_key'=>16,
            'locale'=>'en',
            'value'=>'14 years of experience in orthopedics, master\'s and doctorate in orthopedics, fractures and injuries, and German Orthopedic Fellowship at Hai ElJamea Hospital',
            'created_at'=>'2020-04-07 21:10:27',
            'updated_at'=>'2020-04-07 21:10:27'
        ] );



        Translation::create( [
            'id'=>227,
            'table_name'=>'doctors',
            'column_name'=>'description',
            'foreign_key'=>17,
            'locale'=>'en',
            'value'=>'Masters in pediatric medicine -New born Full checkup- Neonatal Jaundice- Respiratory and digestive diseases in newborn- Bronchoinflammation-Asthma-Chronic cough-Diarrhea or conistipation and vomiting-Hepatitis-Nephritis-Vaccination',
            'created_at'=>'2020-04-07 21:10:27',
            'updated_at'=>'2020-04-07 21:10:27'
        ] );



        Translation::create( [
            'id'=>228,
            'table_name'=>'doctors',
            'column_name'=>'description',
            'foreign_key'=>18,
            'locale'=>'en',
            'value'=>'Masters in pediatric medicine -New born Full checkup- Neonatal Jaundice- Respiratory and digestive diseases in newborn- Bronchoinflammation-Asthma-Chronic cough-Diarrhea or conistipation and vomiting-Hepatitis-Nephritis--Vaccination',
            'created_at'=>'2020-04-07 21:10:27',
            'updated_at'=>'2020-04-07 21:10:27'
        ] );



        Translation::create( [
            'id'=>229,
            'table_name'=>'doctors',
            'column_name'=>'description',
            'foreign_key'=>19,
            'locale'=>'en',
            'value'=>'Urology Specialist -Masters degree in urological -Kidney stones and urinary tract stones -Endoscopy of the urinary system (kidneys - ureter - bladder) -Congenital defects in the kidneys -ureters and bladder Tightness and obstruction of the urethra -Frequent renal colic Tumors of the genitourinary system Urinary -incontinence and bloody urine Menopause -infertility and disability of men -Treatment of prostate diseases and periodic detection-Crushing the stones through the collision-wave device-Laser kidney stones are dissected by renal endoscopy-Bladder stones dissection using the air diffuser and laser-Dissect the ureteral stones using the air splitter-Treatment of causes of renal failure-A diet for patients with renal failure-Repair of the urethra-Repair of penis warp-Narrow pelvic tubular repair-Repair of urinary bladder recovery of the ureter surgically and without surgery.at Hai ElJamea Hospital',
            'created_at'=>'2020-04-07 21:10:27',
            'updated_at'=>'2020-04-07 21:10:27'
        ] );



        Translation::create( [
            'id'=>230,
            'table_name'=>'doctors',
            'column_name'=>'description',
            'foreign_key'=>20,
            'locale'=>'en',
            'value'=>'Psychoneurosis Consultant -Psychiatry consultation -follow up patients of Depression -mood swings -Al zhahmir -Pregnancy and after delivery depression -Behavioral enhancement -social communication. at Hai ElJamea Hospital',
            'created_at'=>'2020-04-07 21:10:27',
            'updated_at'=>'2020-04-07 21:10:27'
        ] );



        Translation::create( [
            'id'=>231,
            'table_name'=>'doctors',
            'column_name'=>'description',
            'foreign_key'=>21,
            'locale'=>'en',
            'value'=>'',
            'created_at'=>'2020-04-07 21:10:27',
            'updated_at'=>'2020-04-07 21:10:27'
        ] );



        Translation::create( [
            'id'=>232,
            'table_name'=>'doctors',
            'column_name'=>'description',
            'foreign_key'=>22,
            'locale'=>'en',
            'value'=>'',
            'created_at'=>'2020-04-07 21:10:27',
            'updated_at'=>'2020-04-07 21:10:27'
        ] );



        Translation::create( [
            'id'=>233,
            'table_name'=>'specialities',
            'column_name'=>'name',
            'foreign_key'=>1,
            'locale'=>'en',
            'value'=>'Dental specialist',
            'created_at'=>'2020-04-07 21:10:28',
            'updated_at'=>'2020-04-07 21:10:28'
        ] );



        Translation::create( [
            'id'=>234,
            'table_name'=>'specialities',
            'column_name'=>'name',
            'foreign_key'=>2,
            'locale'=>'en',
            'value'=>'Specialist cardiovascular diseases',
            'created_at'=>'2020-04-07 21:10:28',
            'updated_at'=>'2020-04-07 21:10:28'
        ] );



        Translation::create( [
            'id'=>235,
            'table_name'=>'specialities',
            'column_name'=>'name',
            'foreign_key'=>3,
            'locale'=>'en',
            'value'=>'General Surgery Consultant',
            'created_at'=>'2020-04-07 21:10:28',
            'updated_at'=>'2020-04-07 21:10:28'
        ] );



        Translation::create( [
            'id'=>236,
            'table_name'=>'specialities',
            'column_name'=>'name',
            'foreign_key'=>4,
            'locale'=>'en',
            'value'=>'Dermatologist',
            'created_at'=>'2020-04-07 21:10:28',
            'updated_at'=>'2020-04-07 21:10:28'
        ] );



        Translation::create( [
            'id'=>237,
            'table_name'=>'specialities',
            'column_name'=>'name',
            'foreign_key'=>5,
            'locale'=>'en',
            'value'=>'Ear, Nose and Throat Specialist ',
            'created_at'=>'2020-04-07 21:10:28',
            'updated_at'=>'2020-04-07 21:10:28'
        ] );



        Translation::create( [
            'id'=>238,
            'table_name'=>'specialities',
            'column_name'=>'name',
            'foreign_key'=>6,
            'locale'=>'en',
            'value'=>'Internal medicine and kidney disease specialist',
            'created_at'=>'2020-04-07 21:10:28',
            'updated_at'=>'2020-04-07 21:10:28'
        ] );



        Translation::create( [
            'id'=>239,
            'table_name'=>'specialities',
            'column_name'=>'name',
            'foreign_key'=>7,
            'locale'=>'en',
            'value'=>'Gastroenterologist and kidney specialist',
            'created_at'=>'2020-04-07 21:10:28',
            'updated_at'=>'2020-04-07 21:10:28'
        ] );



        Translation::create( [
            'id'=>240,
            'table_name'=>'specialities',
            'column_name'=>'name',
            'foreign_key'=>8,
            'locale'=>'en',
            'value'=>'Internal medicine specialist',
            'created_at'=>'2020-04-07 21:10:28',
            'updated_at'=>'2020-04-07 21:10:28'
        ] );



        Translation::create( [
            'id'=>241,
            'table_name'=>'specialities',
            'column_name'=>'name',
            'foreign_key'=>9,
            'locale'=>'en',
            'value'=>'Consultant of brain and nerve diseases',
            'created_at'=>'2020-04-07 21:10:28',
            'updated_at'=>'2020-04-07 21:10:28'
        ] );



        Translation::create( [
            'id'=>242,
            'table_name'=>'specialities',
            'column_name'=>'name',
            'foreign_key'=>10,
            'locale'=>'en',
            'value'=>'Obstetrician and Gynecologist',
            'created_at'=>'2020-04-07 21:10:28',
            'updated_at'=>'2020-04-07 21:10:28'
        ] );



        Translation::create( [
            'id'=>243,
            'table_name'=>'specialities',
            'column_name'=>'name',
            'foreign_key'=>11,
            'locale'=>'en',
            'value'=>'The first obstetrician and gynecologist',
            'created_at'=>'2020-04-07 21:10:28',
            'updated_at'=>'2020-04-07 21:10:28'
        ] );



        Translation::create( [
            'id'=>244,
            'table_name'=>'specialities',
            'column_name'=>'name',
            'foreign_key'=>12,
            'locale'=>'en',
            'value'=>'Consultant ophthalmology',
            'created_at'=>'2020-04-07 21:10:28',
            'updated_at'=>'2020-04-07 21:10:28'
        ] );



        Translation::create( [
            'id'=>245,
            'table_name'=>'specialities',
            'column_name'=>'name',
            'foreign_key'=>13,
            'locale'=>'en',
            'value'=>'Bone and joint pathologist',
            'created_at'=>'2020-04-07 21:10:28',
            'updated_at'=>'2020-04-07 21:10:28'
        ] );



        Translation::create( [
            'id'=>246,
            'table_name'=>'specialities',
            'column_name'=>'name',
            'foreign_key'=>14,
            'locale'=>'en',
            'value'=>'Pediatrician',
            'created_at'=>'2020-04-07 21:10:28',
            'updated_at'=>'2020-04-07 21:10:28'
        ] );



        Translation::create( [
            'id'=>247,
            'table_name'=>'specialities',
            'column_name'=>'name',
            'foreign_key'=>15,
            'locale'=>'en',
            'value'=>'Urology consultant',
            'created_at'=>'2020-04-07 21:10:28',
            'updated_at'=>'2020-04-07 21:10:28'
        ] );



        Translation::create( [
            'id'=>248,
            'table_name'=>'specialities',
            'column_name'=>'name',
            'foreign_key'=>16,
            'locale'=>'en',
            'value'=>'Consultant of mental illness',
            'created_at'=>'2020-04-07 21:10:28',
            'updated_at'=>'2020-04-07 21:10:28'
        ] );



        Translation::create( [
            'id'=>249,
            'table_name'=>'specialities',
            'column_name'=>'name',
            'foreign_key'=>17,
            'locale'=>'en',
            'value'=>'Consultant of chest diseases',
            'created_at'=>'2020-04-07 21:10:28',
            'updated_at'=>'2020-04-07 21:10:28'
        ] );


        //        _________________________End________Seed Translation Table___________________________________________________________________________

        //        _________________________Start________Seed workinghours Table___________________________________________________________________________
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
            [
                'doctor_id' => 6,
                'day'       => 'Saturday',
                'start'     => '08:00',
                'end'       => '11:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 6,
                'day'       => 'Sunday',
                'start'     => '11:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 6,
                'day'       => 'Monday',
                'start'     => '08:00',
                'end'       => '11:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 6,
                'day'       => 'Tuesday',
                'start'     => '08:00',
                'end'       => '11:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 6,
                'day'       => 'Wednesday',
                'start'     => '08:00',
                'end'       => '11:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 6,
                'day'       => 'Thursday',
                'start'     => '11:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 7,
                'day'       => 'Saturday',
                'start'     => '08:00',
                'end'       => '11:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 7,
                'day'       => 'Sunday',
                'start'     => '08:00',
                'end'       => '11:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 7,
                'day'       => 'Monday',
                'start'     => '08:00',
                'end'       => '11:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 7,
                'day'       => 'Tuesday',
                'start'     => '08:00',
                'end'       => '11:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 7,
                'day'       => 'Wednesday',
                'start'     => '14:00',
                'end'       => '20:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 7,
                'day'       => 'Thursday',
                'start'     => '08:00',
                'end'       => '11:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 8,
                'day'       => 'Saturday',
                'start'     => '11:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 8,
                'day'       => 'Sunday',
                'start'     => '14:00',
                'end'       => '20:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 8,
                'day'       => 'Monday',
                'start'     => '11:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 8,
                'day'       => 'Tuesday',
                'start'     => '11:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 8,
                'day'       => 'Wednesday',
                'start'     => '11:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 8,
                'day'       => 'Thursday',
                'start'     => '11:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 9,
                'day'       => 'Saturday',
                'start'     => '11:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 9,
                'day'       => 'Sunday',
                'start'     => '11:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 9,
                'day'       => 'Monday',
                'start'     => '14:00',
                'end'       => '20:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 9,
                'day'       => 'Tuesday',
                'start'     => '11:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 9,
                'day'       => 'Wednesday',
                'start'     => '11:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 9,
                'day'       => 'Thursday',
                'start'     => '11:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 10,
                'day'       => 'Saturday',
                'start'     => '10:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 10,
                'day'       => 'Sunday',
                'start'     => '10:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 10,
                'day'       => 'Monday',
                'start'     => '10:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 10,
                'day'       => 'Tuesday',
                'start'     => '10:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 10,
                'day'       => 'Wednesday',
                'start'     => '10:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 10,
                'day'       => 'Thursday',
                'start'     => '10:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 11,
                'day'       => 'Saturday',
                'start'     => '08:00',
                'end'       => '11:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 11,
                'day'       => 'Sunday',
                'start'     => '08:00',
                'end'       => '11:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 11,
                'day'       => 'Monday',
                'start'     => '08:00',
                'end'       => '11:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 11,
                'day'       => 'Tuesday',
                'start'     => '08:00',
                'end'       => '11:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 11,
                'day'       => 'Wednesday',
                'start'     => '08:00',
                'end'       => '11:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 11,
                'day'       => 'Thursday',
                'start'     => '08:00',
                'end'       => '11:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 12,
                'day'       => 'Saturday',
                'start'     => '11:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 12,
                'day'       => 'Sunday',
                'start'     => '11:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 12,
                'day'       => 'Monday',
                'start'     => '11:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 12,
                'day'       => 'Tuesday',
                'start'     => '11:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 12,
                'day'       => 'Wednesday',
                'start'     => '11:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 12,
                'day'       => 'Thursday',
                'start'     => '11:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 13,
                'day'       => 'Saturday',
                'start'     => '11:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 13,
                'day'       => 'Sunday',
                'start'     => '11:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 13,
                'day'       => 'Monday',
                'start'     => '11:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 13,
                'day'       => 'Tuesday',
                'start'     => '11:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 13,
                'day'       => 'Wednesday',
                'start'     => '11:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 13,
                'day'       => 'Thursday',
                'start'     => '11:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 14,
                'day'       => 'Saturday',
                'start'     => '08:00',
                'end'       => '11:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 14,
                'day'       => 'Sunday',
                'start'     => '08:00',
                'end'       => '11:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 14,
                'day'       => 'Monday',
                'start'     => '08:00',
                'end'       => '11:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 14,
                'day'       => 'Tuesday',
                'start'     => '11:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 14,
                'day'       => 'Wednesday',
                'start'     => '11:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 14,
                'day'       => 'Thursday',
                'start'     => '11:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 15,
                'day'       => 'Saturday',
                'start'     => '08:00',
                'end'       => '11:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 15,
                'day'       => 'Sunday',
                'start'     => '08:00',
                'end'       => '11:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 15,
                'day'       => 'Tuesday',
                'start'     => '11:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 15,
                'day'       => 'Wednesday',
                'start'     => '14:00',
                'end'       => '20:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 15,
                'day'       => 'Thursday',
                'start'     => '11:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 16,
                'day'       => 'Saturday',
                'start'     => '08:00',
                'end'       => '11:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 16,
                'day'       => 'Sunday',
                'start'     => '11:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 16,
                'day'       => 'Monday',
                'start'     => '08:00',
                'end'       => '11:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 16,
                'day'       => 'Tuesday',
                'start'     => '11:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 16,
                'day'       => 'Wednesday',
                'start'     => '11:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 16,
                'day'       => 'Thursday',
                'start'     => '08:00',
                'end'       => '11:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 17,
                'day'       => 'Saturday',
                'start'     => '14:00',
                'end'       => '20:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 17,
                'day'       => 'Sunday',
                'start'     => '14:00',
                'end'       => '20:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 17,
                'day'       => 'Monday',
                'start'     => '14:00',
                'end'       => '20:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 17,
                'day'       => 'Tuesday',
                'start'     => '14:00',
                'end'       => '20:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 17,
                'day'       => 'Wednesday',
                'start'     => '14:00',
                'end'       => '20:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 17,
                'day'       => 'Thursday',
                'start'     => '14:00',
                'end'       => '20:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 18,
                'day'       => 'Saturday',
                'start'     => '08:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 18,
                'day'       => 'Sunday',
                'start'     => '08:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 18,
                'day'       => 'Monday',
                'start'     => '08:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 18,
                'day'       => 'Tuesday',
                'start'     => '08:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 18,
                'day'       => 'Wednesday',
                'start'     => '08:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 18,
                'day'       => 'Thursday',
                'start'     => '08:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 19,
                'day'       => 'Saturday',
                'start'     => '08:00',
                'end'       => '12:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 19,
                'day'       => 'Monday',
                'start'     => '10:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 19,
                'day'       => 'Tuesday',
                'start'     => '10:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 19,
                'day'       => 'Wednesday',
                'start'     => '10:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 19,
                'day'       => 'Thursday',
                'start'     => '10:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 20,
                'day'       => 'Saturday',
                'start'     => '09:00',
                'end'       => '12:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 20,
                'day'       => 'Sunday',
                'start'     => '09:00',
                'end'       => '12:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 20,
                'day'       => 'Monday',
                'start'     => '09:00',
                'end'       => '12:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 20,
                'day'       => 'Tuesday',
                'start'     => '09:00',
                'end'       => '12:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 20,
                'day'       => 'Wednesday',
                'start'     => '09:00',
                'end'       => '12:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 20,
                'day'       => 'Thursday',
                'start'     => '09:00',
                'end'       => '12:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 21,
                'day'       => 'Saturday',
                'start'     => '08:00',
                'end'       => '12:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 21,
                'day'       => 'Sunday',
                'start'     => '08:00',
                'end'       => '12:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 21,
                'day'       => 'Monday',
                'start'     => '08:00',
                'end'       => '12:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 21,
                'day'       => 'Tuesday',
                'start'     => '08:00',
                'end'       => '12:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 21,
                'day'       => 'Wednesday',
                'start'     => '08:00',
                'end'       => '12:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 21,
                'day'       => 'Thursday',
                'start'     => '08:00',
                'end'       => '12:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 22,
                'day'       => 'Saturday',
                'start'     => '10:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 22,
                'day'       => 'Sunday',
                'start'     => '10:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 22,
                'day'       => 'Monday',
                'start'     => '10:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 22,
                'day'       => 'Tuesday',
                'start'     => '10:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 22,
                'day'       => 'Wednesday',
                'start'     => '10:00',
                'end'       => '14:00',
                'type'      => 'Working'
            ],
            [
                'doctor_id' => 22,
                'day'       => 'Thursday',
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
        //        _________________________End________Seed workinghours Table___________________________________________________________________________

    }

}

<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataType;

class DataTypesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        Datatype::create( [
            'id'=>1,
            'name'=>'users',
            'slug'=>'users',
            'display_name_singular'=>'User',
            'display_name_plural'=>'Users',
            'icon'=>'voyager-person',
            'model_name'=>'App\\User',
            'policy_name'=>'TCG\\Voyager\\Policies\\UserPolicy',
            'controller'=>'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController',
            'description'=>NULL,
            'generate_permissions'=>1,
            'server_side'=>0,
            'details'=>'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}',
            'created_at'=>'2019-11-10 09:05:36',
            'updated_at'=>'2020-02-04 07:27:43'
        ] );

        Datatype::create( [
            'id'=>2,
            'name'=>'menus',
            'slug'=>'menus',
            'display_name_singular'=>'Menu',
            'display_name_plural'=>'Menus',
            'icon'=>'voyager-list',
            'model_name'=>'TCG\\Voyager\\Models\\Menu',
            'policy_name'=>NULL,
            'controller'=>'',
            'description'=>'',
            'generate_permissions'=>1,
            'server_side'=>0,
            'details'=>NULL,
            'created_at'=>'2019-11-10 09:05:36',
            'updated_at'=>'2019-11-10 09:05:36'
        ] );

        Datatype::create( [
            'id'=>3,
            'name'=>'roles',
            'slug'=>'roles',
            'display_name_singular'=>'Role',
            'display_name_plural'=>'Roles',
            'icon'=>'voyager-lock',
            'model_name'=>'TCG\\Voyager\\Models\\Role',
            'policy_name'=>NULL,
            'controller'=>'',
            'description'=>'',
            'generate_permissions'=>1,
            'server_side'=>0,
            'details'=>NULL,
            'created_at'=>'2019-11-10 09:05:36',
            'updated_at'=>'2019-11-10 09:05:36'
        ] );

        Datatype::create( [
            'id'=>4,
            'name'=>'categories',
            'slug'=>'categories',
            'display_name_singular'=>'Category',
            'display_name_plural'=>'Categories',
            'icon'=>'voyager-categories',
            'model_name'=>'TCG\\Voyager\\Models\\Category',
            'policy_name'=>NULL,
            'controller'=>'',
            'description'=>'',
            'generate_permissions'=>1,
            'server_side'=>0,
            'details'=>NULL,
            'created_at'=>'2019-11-10 09:05:43',
            'updated_at'=>'2019-11-10 09:05:43'
        ] );

        Datatype::create( [
            'id'=>5,
            'name'=>'posts',
            'slug'=>'posts',
            'display_name_singular'=>'Post',
            'display_name_plural'=>'Posts',
            'icon'=>'voyager-news',
            'model_name'=>'TCG\\Voyager\\Models\\Post',
            'policy_name'=>'TCG\\Voyager\\Policies\\PostPolicy',
            'controller'=>NULL,
            'description'=>NULL,
            'generate_permissions'=>1,
            'server_side'=>0,
            'details'=>'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}',
            'created_at'=>'2019-11-10 09:05:44',
            'updated_at'=>'2020-02-05 13:52:38'
        ] );

        Datatype::create( [
            'id'=>6,
            'name'=>'pages',
            'slug'=>'pages',
            'display_name_singular'=>'Page',
            'display_name_plural'=>'Pages',
            'icon'=>'voyager-file-text',
            'model_name'=>'TCG\\Voyager\\Models\\Page',
            'policy_name'=>NULL,
            'controller'=>'',
            'description'=>'',
            'generate_permissions'=>1,
            'server_side'=>0,
            'details'=>NULL,
            'created_at'=>'2019-11-10 09:05:45',
            'updated_at'=>'2019-11-10 09:05:45'
        ] );

        Datatype::create( [
            'id'=>9,
            'name'=>'admins',
            'slug'=>'admins',
            'display_name_singular'=>'Admin',
            'display_name_plural'=>'Admins',
            'icon'=>'voyager-person',
            'model_name'=>'App\\Admin',
            'policy_name'=>'TCG\\Voyager\\Policies\\UserPolicy',
            'controller'=>'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController',
            'description'=>NULL,
            'generate_permissions'=>1,
            'server_side'=>0,
            'details'=>'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}',
            'created_at'=>'2019-11-11 05:35:32',
            'updated_at'=>'2019-11-11 06:36:14'
        ] );

        Datatype::create( [
            'id'=>16,
            'name'=>'sliders',
            'slug'=>'sliders',
            'display_name_singular'=>'Slider',
            'display_name_plural'=>'Sliders',
            'icon'=>'voyager-code',
            'model_name'=>'App\\Slider',
            'policy_name'=>NULL,
            'controller'=>'App\\Http\\Controllers\\SliderController',
            'description'=>NULL,
            'generate_permissions'=>1,
            'server_side'=>0,
            'details'=>'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}',
            'created_at'=>'2020-01-26 11:49:00',
            'updated_at'=>'2020-01-27 08:57:08'
        ] );

        Datatype::create( [
            'id'=>18,
            'name'=>'clinics',
            'slug'=>'clinics',
            'display_name_singular'=>'Clinic',
            'display_name_plural'=>'Clinics',
            'icon'=>NULL,
            'model_name'=>'App\\Clinic',
            'policy_name'=>NULL,
            'controller'=>NULL,
            'description'=>NULL,
            'generate_permissions'=>1,
            'server_side'=>0,
            'details'=>'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}',
            'created_at'=>'2020-01-27 13:07:26',
            'updated_at'=>'2020-02-26 13:48:15'
        ] );

        Datatype::create( [
            'id'=>19,
            'name'=>'services',
            'slug'=>'services',
            'display_name_singular'=>'Service',
            'display_name_plural'=>'Services',
            'icon'=>NULL,
            'model_name'=>'App\\Service',
            'policy_name'=>NULL,
            'controller'=>NULL,
            'description'=>NULL,
            'generate_permissions'=>1,
            'server_side'=>0,
            'details'=>'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}',
            'created_at'=>'2020-01-28 06:29:40',
            'updated_at'=>'2020-02-26 14:00:03'
        ] );

//        Datatype::create( [
//            'id'=>20,
//            'name'=>'doctors',
//            'slug'=>'doctors',
//            'display_name_singular'=>'Doctor',
//            'display_name_plural'=>'Doctors',
//            'icon'=>NULL,
//            'model_name'=>'App\\Doctor',
//            'policy_name'=>NULL,
//            'controller'=>NULL,
//            'description'=>NULL,
//            'generate_permissions'=>1,
//            'server_side'=>0,
//            'details'=>'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}',
//            'created_at'=>'2020-01-28 09:52:58',
//            'updated_at'=>'2020-02-26 13:48:52'
//        ] );

        Datatype::create( [
            'id'=>21,
            'name'=>'tags',
            'slug'=>'tags',
            'display_name_singular'=>'Tag',
            'display_name_plural'=>'Tags',
            'icon'=>NULL,
            'model_name'=>'App\\Tag',
            'policy_name'=>NULL,
            'controller'=>NULL,
            'description'=>NULL,
            'generate_permissions'=>1,
            'server_side'=>0,
            'details'=>'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}',
            'created_at'=>'2020-01-29 05:58:30',
            'updated_at'=>'2020-02-26 14:00:40'
        ] );

        Datatype::create( [
            'id'=>22,
            'name'=>'events',
            'slug'=>'events',
            'display_name_singular'=>'Event',
            'display_name_plural'=>'Events',
            'icon'=>NULL,
            'model_name'=>'App\\Event',
            'policy_name'=>NULL,
            'controller'=>'App\\Http\\Controllers\\EventController',
            'description'=>NULL,
            'generate_permissions'=>1,
            'server_side'=>0,
            'details'=>'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}',
            'created_at'=>'2020-02-02 07:38:18',
            'updated_at'=>'2020-02-26 13:39:36'
        ] );

        Datatype::create( [
            'id'=>26,
            'name'=>'clinic_requests',
            'slug'=>'clinic-requests',
            'display_name_singular'=>'Clinic Request',
            'display_name_plural'=>'Clinic Requests',
            'icon'=>NULL,
            'model_name'=>'App\\ClinicRequest',
            'policy_name'=>NULL,
            'controller'=>NULL,
            'description'=>NULL,
            'generate_permissions'=>1,
            'server_side'=>0,
            'details'=>'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}',
            'created_at'=>'2020-02-09 08:45:13',
            'updated_at'=>'2020-02-09 14:16:55'
        ] );

        Datatype::create( [
            'id'=>28,
            'name'=>'andalusia_groups',
            'slug'=>'andalusia-groups',
            'display_name_singular'=>'Andalusia Group',
            'display_name_plural'=>'Andalusia Groups',
            'icon'=>NULL,
            'model_name'=>'App\\AndalusiaGroup',
            'policy_name'=>NULL,
            'controller'=>NULL,
            'description'=>NULL,
            'generate_permissions'=>1,
            'server_side'=>0,
            'details'=>'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}',
            'created_at'=>'2020-02-09 12:51:57',
            'updated_at'=>'2020-03-01 15:22:52'
        ] );
        Datatype::create( [
            'name'=>'partners',
            'slug'=>'partners',
            'display_name_singular'=>'Partner',
            'display_name_plural'=>'Partners',
            'icon'=>NULL,
            'model_name'=>'App\\Partner',
            'policy_name'=>NULL,
            'controller'=>NULL,
            'description'=>NULL,
            'generate_permissions'=>1,
            'server_side'=>0,
            'details'=>'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}',
            'created_at'=>'2020-02-09 12:51:57',
            'updated_at'=>'2020-03-01 15:22:52'
        ] );
        Datatype::create( [
            'name'=>'testimonials',
            'slug'=>'testimonials',
            'display_name_singular'=>'Testimonial',
            'display_name_plural'=>'Testimonials',
            'icon'=>NULL,
            'model_name'=>'App\\Testimonial',
            'policy_name'=>NULL,
            'controller'=>NULL,
            'description'=>NULL,
            'generate_permissions'=>1,
            'server_side'=>0,
            'details'=>'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}',
            'created_at'=>'2020-02-09 12:51:57',
            'updated_at'=>'2020-03-01 15:22:52'
        ] );
        Datatype::create( [
            'name'=>'Selling Point',
            'slug'=>'selling-points',
            'display_name_singular'=>'Selling Point',
            'display_name_plural'=>'Selling Points',
            'icon'=>NULL,
            'model_name'=>'App\\SellingPoint',
            'policy_name'=>NULL,
            'controller'=>NULL,
            'description'=>NULL,
            'generate_permissions'=>1,
            'server_side'=>0,
            'details'=>'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}',
            'created_at'=>'2020-02-09 12:51:57',
            'updated_at'=>'2020-03-01 15:22:52'
        ] );
    }

}

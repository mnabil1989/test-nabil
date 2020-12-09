<?php

use Illuminate\Database\Seeder;
use App\DataRaw as Datarow;
use TCG\Voyager\Models\DataType;

class DataRowsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        Datarow::create( [
            'id'=>1,
            'data_type_id'=>1,
            'field'=>'id',
            'type'=>'number',
            'display_name'=>'ID',
            'required'=>1,
            'browse'=>0,
            'read'=>0,
            'edit'=>0,
            'add'=>0,
            'delete'=>0,
            'details'=>'{}',
            'order'=>1
        ] );



        Datarow::create( [
            'id'=>2,
            'data_type_id'=>1,
            'field'=>'name',
            'type'=>'text',
            'display_name'=>'First Name',
            'required'=>1,
            'browse'=>1,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>'{}',
            'order'=>2
        ] );



        Datarow::create( [
            'id'=>3,
            'data_type_id'=>1,
            'field'=>'email',
            'type'=>'text',
            'display_name'=>'Email',
            'required'=>1,
            'browse'=>1,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>'{}',
            'order'=>4
        ] );



        Datarow::create( [
            'id'=>4,
            'data_type_id'=>1,
            'field'=>'password',
            'type'=>'password',
            'display_name'=>'Password',
            'required'=>1,
            'browse'=>0,
            'read'=>0,
            'edit'=>1,
            'add'=>1,
            'delete'=>0,
            'details'=>'{}',
            'order'=>5
        ] );



        Datarow::create( [
            'id'=>5,
            'data_type_id'=>1,
            'field'=>'remember_token',
            'type'=>'text',
            'display_name'=>'Remember Token',
            'required'=>0,
            'browse'=>0,
            'read'=>0,
            'edit'=>0,
            'add'=>0,
            'delete'=>0,
            'details'=>'{}',
            'order'=>6
        ] );



        Datarow::create( [
            'id'=>6,
            'data_type_id'=>1,
            'field'=>'created_at',
            'type'=>'timestamp',
            'display_name'=>'Created At',
            'required'=>0,
            'browse'=>1,
            'read'=>1,
            'edit'=>0,
            'add'=>0,
            'delete'=>0,
            'details'=>'{}',
            'order'=>7
        ] );



        Datarow::create( [
            'id'=>7,
            'data_type_id'=>1,
            'field'=>'updated_at',
            'type'=>'timestamp',
            'display_name'=>'Updated At',
            'required'=>0,
            'browse'=>0,
            'read'=>0,
            'edit'=>0,
            'add'=>0,
            'delete'=>0,
            'details'=>'{}',
            'order'=>9
        ] );



        Datarow::create( [
            'id'=>8,
            'data_type_id'=>1,
            'field'=>'avatar',
            'type'=>'image',
            'display_name'=>'Avatar',
            'required'=>0,
            'browse'=>1,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>'{}',
            'order'=>10
        ] );



        Datarow::create( [
            'id'=>11,
            'data_type_id'=>1,
            'field'=>'settings',
            'type'=>'hidden',
            'display_name'=>'Settings',
            'required'=>0,
            'browse'=>0,
            'read'=>0,
            'edit'=>0,
            'add'=>0,
            'delete'=>0,
            'details'=>'{}',
            'order'=>12
        ] );



        Datarow::create( [
            'id'=>12,
            'data_type_id'=>2,
            'field'=>'id',
            'type'=>'number',
            'display_name'=>'ID',
            'required'=>1,
            'browse'=>0,
            'read'=>0,
            'edit'=>0,
            'add'=>0,
            'delete'=>0,
            'details'=>NULL,
            'order'=>1
        ] );



        Datarow::create( [
            'id'=>13,
            'data_type_id'=>2,
            'field'=>'name',
            'type'=>'text',
            'display_name'=>'Name',
            'required'=>1,
            'browse'=>1,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>NULL,
            'order'=>2
        ] );



        Datarow::create( [
            'id'=>14,
            'data_type_id'=>2,
            'field'=>'created_at',
            'type'=>'timestamp',
            'display_name'=>'Created At',
            'required'=>0,
            'browse'=>0,
            'read'=>0,
            'edit'=>0,
            'add'=>0,
            'delete'=>0,
            'details'=>NULL,
            'order'=>3
        ] );



        Datarow::create( [
            'id'=>15,
            'data_type_id'=>2,
            'field'=>'updated_at',
            'type'=>'timestamp',
            'display_name'=>'Updated At',
            'required'=>0,
            'browse'=>0,
            'read'=>0,
            'edit'=>0,
            'add'=>0,
            'delete'=>0,
            'details'=>NULL,
            'order'=>4
        ] );



        Datarow::create( [
            'id'=>16,
            'data_type_id'=>3,
            'field'=>'id',
            'type'=>'number',
            'display_name'=>'ID',
            'required'=>1,
            'browse'=>0,
            'read'=>0,
            'edit'=>0,
            'add'=>0,
            'delete'=>0,
            'details'=>NULL,
            'order'=>1
        ] );



        Datarow::create( [
            'id'=>17,
            'data_type_id'=>3,
            'field'=>'name',
            'type'=>'text',
            'display_name'=>'Name',
            'required'=>1,
            'browse'=>1,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>NULL,
            'order'=>2
        ] );



        Datarow::create( [
            'id'=>18,
            'data_type_id'=>3,
            'field'=>'created_at',
            'type'=>'timestamp',
            'display_name'=>'Created At',
            'required'=>0,
            'browse'=>0,
            'read'=>0,
            'edit'=>0,
            'add'=>0,
            'delete'=>0,
            'details'=>NULL,
            'order'=>3
        ] );



        Datarow::create( [
            'id'=>19,
            'data_type_id'=>3,
            'field'=>'updated_at',
            'type'=>'timestamp',
            'display_name'=>'Updated At',
            'required'=>0,
            'browse'=>0,
            'read'=>0,
            'edit'=>0,
            'add'=>0,
            'delete'=>0,
            'details'=>NULL,
            'order'=>4
        ] );



        Datarow::create( [
            'id'=>20,
            'data_type_id'=>3,
            'field'=>'display_name',
            'type'=>'text',
            'display_name'=>'Display Name',
            'required'=>1,
            'browse'=>1,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>NULL,
            'order'=>5
        ] );



        Datarow::create( [
            'id'=>21,
            'data_type_id'=>1,
            'field'=>'role_id',
            'type'=>'text',
            'display_name'=>'Role',
            'required'=>0,
            'browse'=>0,
            'read'=>0,
            'edit'=>0,
            'add'=>0,
            'delete'=>0,
            'details'=>'{}',
            'order'=>11
        ] );



        Datarow::create( [
            'id'=>22,
            'data_type_id'=>4,
            'field'=>'id',
            'type'=>'number',
            'display_name'=>'ID',
            'required'=>1,
            'browse'=>0,
            'read'=>0,
            'edit'=>0,
            'add'=>0,
            'delete'=>0,
            'details'=>NULL,
            'order'=>1
        ] );



        Datarow::create( [
            'id'=>23,
            'data_type_id'=>4,
            'field'=>'parent_id',
            'type'=>'select_dropdown',
            'display_name'=>'Parent',
            'required'=>0,
            'browse'=>0,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>"{\"default\":\"\",\"null\":\"\",\"options\":{\"\":\"-- None --\"},\"relationship\":{\"key\":\"id\",\"label\":\"name\"}}",
            'order'=>2
        ] );



        Datarow::create( [
            'id'=>24,
            'data_type_id'=>4,
            'field'=>'order',
            'type'=>'text',
            'display_name'=>'Order',
            'required'=>1,
            'browse'=>1,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>"{\"default\":1}",
            'order'=>3
        ] );



        Datarow::create( [
            'id'=>25,
            'data_type_id'=>4,
            'field'=>'name',
            'type'=>'text',
            'display_name'=>'Name',
            'required'=>1,
            'browse'=>1,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>NULL,
            'order'=>4
        ] );



        Datarow::create( [
            'id'=>26,
            'data_type_id'=>4,
            'field'=>'slug',
            'type'=>'text',
            'display_name'=>'Slug',
            'required'=>1,
            'browse'=>1,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>"{\"slugify\":{\"origin\":\"name\"}}",
            'order'=>5
        ] );



        Datarow::create( [
            'id'=>27,
            'data_type_id'=>4,
            'field'=>'created_at',
            'type'=>'timestamp',
            'display_name'=>'Created At',
            'required'=>0,
            'browse'=>0,
            'read'=>1,
            'edit'=>0,
            'add'=>0,
            'delete'=>0,
            'details'=>NULL,
            'order'=>6
        ] );



        Datarow::create( [
            'id'=>28,
            'data_type_id'=>4,
            'field'=>'updated_at',
            'type'=>'timestamp',
            'display_name'=>'Updated At',
            'required'=>0,
            'browse'=>0,
            'read'=>0,
            'edit'=>0,
            'add'=>0,
            'delete'=>0,
            'details'=>NULL,
            'order'=>7
        ] );



        Datarow::create( [
            'id'=>29,
            'data_type_id'=>5,
            'field'=>'id',
            'type'=>'number',
            'display_name'=>'ID',
            'required'=>1,
            'browse'=>0,
            'read'=>0,
            'edit'=>0,
            'add'=>0,
            'delete'=>0,
            'details'=>'{}',
            'order'=>1
        ] );



        Datarow::create( [
            'id'=>30,
            'data_type_id'=>5,
            'field'=>'author_id',
            'type'=>'text',
            'display_name'=>'Author',
            'required'=>1,
            'browse'=>0,
            'read'=>1,
            'edit'=>1,
            'add'=>0,
            'delete'=>1,
            'details'=>'{}',
            'order'=>2
        ] );



        Datarow::create( [
            'id'=>31,
            'data_type_id'=>5,
            'field'=>'category_id',
            'type'=>'text',
            'display_name'=>'Category',
            'required'=>0,
            'browse'=>0,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>0,
            'details'=>'{}',
            'order'=>3
        ] );



        Datarow::create( [
            'id'=>32,
            'data_type_id'=>5,
            'field'=>'title',
            'type'=>'text',
            'display_name'=>'Title',
            'required'=>1,
            'browse'=>1,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>'{}',
            'order'=>4
        ] );



        Datarow::create( [
            'id'=>33,
            'data_type_id'=>5,
            'field'=>'excerpt',
            'type'=>'text_area',
            'display_name'=>'Excerpt',
            'required'=>0,
            'browse'=>0,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>'{}',
            'order'=>5
        ] );



        Datarow::create( [
            'id'=>34,
            'data_type_id'=>5,
            'field'=>'body',
            'type'=>'rich_text_box',
            'display_name'=>'Body',
            'required'=>1,
            'browse'=>0,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>'{}',
            'order'=>6
        ] );



        Datarow::create( [
            'id'=>35,
            'data_type_id'=>5,
            'field'=>'image',
            'type'=>'image',
            'display_name'=>'Post Image',
            'required'=>0,
            'browse'=>1,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>"{\"resize\":{\"width\":\"1000\",\"height\":\"null\"},\"quality\":\"70%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"medium\",\"scale\":\"50%\"},{\"name\":\"small\",\"scale\":\"25%\"},{\"name\":\"cropped\",\"crop\":{\"width\":\"300\",\"height\":\"250\"}}]}",
            'order'=>7
        ] );



        Datarow::create( [
            'id'=>36,
            'data_type_id'=>5,
            'field'=>'slug',
            'type'=>'text',
            'display_name'=>'Slug',
            'required'=>1,
            'browse'=>0,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>"{\"slugify\":{\"origin\":\"title\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:posts,slug\"}}",
            'order'=>8
        ] );



        Datarow::create( [
            'id'=>37,
            'data_type_id'=>5,
            'field'=>'meta_description',
            'type'=>'text_area',
            'display_name'=>'Meta Description',
            'required'=>0,
            'browse'=>0,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>'{}',
            'order'=>9
        ] );



        Datarow::create( [
            'id'=>38,
            'data_type_id'=>5,
            'field'=>'meta_keywords',
            'type'=>'text_area',
            'display_name'=>'Meta Keywords',
            'required'=>0,
            'browse'=>0,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>'{}',
            'order'=>10
        ] );



        Datarow::create( [
            'id'=>39,
            'data_type_id'=>5,
            'field'=>'status',
            'type'=>'select_dropdown',
            'display_name'=>'Status',
            'required'=>1,
            'browse'=>1,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>"{\"default\":\"DRAFT\",\"options\":{\"PUBLISHED\":\"published\",\"DRAFT\":\"draft\",\"PENDING\":\"pending\"}}",
            'order'=>11
        ] );



        Datarow::create( [
            'id'=>40,
            'data_type_id'=>5,
            'field'=>'created_at',
            'type'=>'timestamp',
            'display_name'=>'Created At',
            'required'=>0,
            'browse'=>1,
            'read'=>1,
            'edit'=>0,
            'add'=>0,
            'delete'=>0,
            'details'=>'{}',
            'order'=>12
        ] );



        Datarow::create( [
            'id'=>41,
            'data_type_id'=>5,
            'field'=>'updated_at',
            'type'=>'timestamp',
            'display_name'=>'Updated At',
            'required'=>0,
            'browse'=>0,
            'read'=>0,
            'edit'=>0,
            'add'=>0,
            'delete'=>0,
            'details'=>'{}',
            'order'=>13
        ] );



        Datarow::create( [
            'id'=>42,
            'data_type_id'=>5,
            'field'=>'seo_title',
            'type'=>'text',
            'display_name'=>'SEO Title',
            'required'=>0,
            'browse'=>1,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>'{}',
            'order'=>14
        ] );



        Datarow::create( [
            'id'=>43,
            'data_type_id'=>5,
            'field'=>'featured',
            'type'=>'checkbox',
            'display_name'=>'Featured',
            'required'=>1,
            'browse'=>1,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>'{}',
            'order'=>15
        ] );



        Datarow::create( [
            'id'=>44,
            'data_type_id'=>6,
            'field'=>'id',
            'type'=>'number',
            'display_name'=>'ID',
            'required'=>1,
            'browse'=>0,
            'read'=>0,
            'edit'=>0,
            'add'=>0,
            'delete'=>0,
            'details'=>NULL,
            'order'=>1
        ] );



        Datarow::create( [
            'id'=>45,
            'data_type_id'=>6,
            'field'=>'author_id',
            'type'=>'text',
            'display_name'=>'Author',
            'required'=>1,
            'browse'=>0,
            'read'=>0,
            'edit'=>0,
            'add'=>0,
            'delete'=>0,
            'details'=>NULL,
            'order'=>2
        ] );



        Datarow::create( [
            'id'=>46,
            'data_type_id'=>6,
            'field'=>'title',
            'type'=>'text',
            'display_name'=>'Title',
            'required'=>1,
            'browse'=>1,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>NULL,
            'order'=>3
        ] );



        Datarow::create( [
            'id'=>47,
            'data_type_id'=>6,
            'field'=>'excerpt',
            'type'=>'text_area',
            'display_name'=>'Excerpt',
            'required'=>1,
            'browse'=>0,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>NULL,
            'order'=>4
        ] );



        Datarow::create( [
            'id'=>48,
            'data_type_id'=>6,
            'field'=>'body',
            'type'=>'rich_text_box',
            'display_name'=>'Body',
            'required'=>1,
            'browse'=>0,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>NULL,
            'order'=>5
        ] );



        Datarow::create( [
            'id'=>49,
            'data_type_id'=>6,
            'field'=>'slug',
            'type'=>'text',
            'display_name'=>'Slug',
            'required'=>1,
            'browse'=>0,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>"{\"slugify\":{\"origin\":\"title\"},\"validation\":{\"rule\":\"unique:pages,slug\"}}",
            'order'=>6
        ] );



        Datarow::create( [
            'id'=>50,
            'data_type_id'=>6,
            'field'=>'meta_description',
            'type'=>'text',
            'display_name'=>'Meta Description',
            'required'=>1,
            'browse'=>0,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>NULL,
            'order'=>7
        ] );



        Datarow::create( [
            'id'=>51,
            'data_type_id'=>6,
            'field'=>'meta_keywords',
            'type'=>'text',
            'display_name'=>'Meta Keywords',
            'required'=>1,
            'browse'=>0,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>NULL,
            'order'=>8
        ] );



        Datarow::create( [
            'id'=>52,
            'data_type_id'=>6,
            'field'=>'status',
            'type'=>'select_dropdown',
            'display_name'=>'Status',
            'required'=>1,
            'browse'=>1,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>"{\"default\":\"INACTIVE\",\"options\":{\"INACTIVE\":\"INACTIVE\",\"ACTIVE\":\"ACTIVE\"}}",
            'order'=>9
        ] );



        Datarow::create( [
            'id'=>53,
            'data_type_id'=>6,
            'field'=>'created_at',
            'type'=>'timestamp',
            'display_name'=>'Created At',
            'required'=>1,
            'browse'=>1,
            'read'=>1,
            'edit'=>0,
            'add'=>0,
            'delete'=>0,
            'details'=>NULL,
            'order'=>10
        ] );



        Datarow::create( [
            'id'=>54,
            'data_type_id'=>6,
            'field'=>'updated_at',
            'type'=>'timestamp',
            'display_name'=>'Updated At',
            'required'=>1,
            'browse'=>0,
            'read'=>0,
            'edit'=>0,
            'add'=>0,
            'delete'=>0,
            'details'=>NULL,
            'order'=>11
        ] );



        Datarow::create( [
            'id'=>55,
            'data_type_id'=>6,
            'field'=>'image',
            'type'=>'image',
            'display_name'=>'Page Image',
            'required'=>0,
            'browse'=>1,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>NULL,
            'order'=>12
        ] );



        Datarow::create( [
            'id'=>56,
            'data_type_id'=>1,
            'field'=>'email_verified_at',
            'type'=>'timestamp',
            'display_name'=>'',
            'required'=>0,
            'browse'=>0,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>'{}',
            'order'=>8
        ] );



        Datarow::create( [
            'id'=>57,
            'data_type_id'=>9,
            'field'=>'id',
            'type'=>'number',
            'display_name'=>'Id',
            'required'=>1,
            'browse'=>0,
            'read'=>0,
            'edit'=>0,
            'add'=>0,
            'delete'=>0,
            'details'=>'{}',
            'order'=>1
        ] );



        Datarow::create( [
            'id'=>58,
            'data_type_id'=>9,
            'field'=>'role_id',
            'type'=>'text',
            'display_name'=>'Role Id',
            'required'=>0,
            'browse'=>1,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>'{}',
            'order'=>10
        ] );



        Datarow::create( [
            'id'=>59,
            'data_type_id'=>9,
            'field'=>'name',
            'type'=>'text',
            'display_name'=>'Name',
            'required'=>1,
            'browse'=>1,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>'{}',
            'order'=>2
        ] );



        Datarow::create( [
            'id'=>60,
            'data_type_id'=>9,
            'field'=>'email',
            'type'=>'text',
            'display_name'=>'Email',
            'required'=>1,
            'browse'=>1,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>'{}',
            'order'=>3
        ] );



        Datarow::create( [
            'id'=>61,
            'data_type_id'=>9,
            'field'=>'avatar',
            'type'=>'image',
            'display_name'=>'Avatar',
            'required'=>0,
            'browse'=>1,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>'{}',
            'order'=>9
        ] );



        Datarow::create( [
            'id'=>62,
            'data_type_id'=>9,
            'field'=>'email_verified_at',
            'type'=>'timestamp',
            'display_name'=>'Email Verified At',
            'required'=>0,
            'browse'=>0,
            'read'=>0,
            'edit'=>0,
            'add'=>0,
            'delete'=>0,
            'details'=>'{}',
            'order'=>7
        ] );



        Datarow::create( [
            'id'=>63,
            'data_type_id'=>9,
            'field'=>'password',
            'type'=>'password',
            'display_name'=>'Password',
            'required'=>1,
            'browse'=>0,
            'read'=>0,
            'edit'=>1,
            'add'=>1,
            'delete'=>0,
            'details'=>'{}',
            'order'=>4
        ] );



        Datarow::create( [
            'id'=>64,
            'data_type_id'=>9,
            'field'=>'remember_token',
            'type'=>'text',
            'display_name'=>'Remember Token',
            'required'=>0,
            'browse'=>0,
            'read'=>0,
            'edit'=>0,
            'add'=>0,
            'delete'=>0,
            'details'=>'{}',
            'order'=>5
        ] );



        Datarow::create( [
            'id'=>65,
            'data_type_id'=>9,
            'field'=>'settings',
            'type'=>'hidden',
            'display_name'=>'Settings',
            'required'=>0,
            'browse'=>0,
            'read'=>0,
            'edit'=>0,
            'add'=>0,
            'delete'=>0,
            'details'=>'{}',
            'order'=>11
        ] );



        Datarow::create( [
            'id'=>66,
            'data_type_id'=>9,
            'field'=>'created_at',
            'type'=>'timestamp',
            'display_name'=>'Created At',
            'required'=>0,
            'browse'=>1,
            'read'=>1,
            'edit'=>0,
            'add'=>0,
            'delete'=>0,
            'details'=>'{}',
            'order'=>6
        ] );



        Datarow::create( [
            'id'=>67,
            'data_type_id'=>9,
            'field'=>'updated_at',
            'type'=>'timestamp',
            'display_name'=>'Updated At',
            'required'=>0,
            'browse'=>0,
            'read'=>0,
            'edit'=>0,
            'add'=>0,
            'delete'=>0,
            'details'=>'{}',
            'order'=>8
        ] );



        Datarow::create( [
            'id'=>68,
            'data_type_id'=>9,
            'field'=>'admin_belongsto_role_relationship',
            'type'=>'relationship',
            'display_name'=>'roles',
            'required'=>0,
            'browse'=>1,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>"{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"admins\",\"pivot\":\"0\",\"taggable\":\"0\"}",
            'order'=>12
        ] );
        Datarow::create( [
            'id'=>125,
            'data_type_id'=>18,
            'field'=>'id',
            'type'=>'text',
            'display_name'=>'Id',
            'required'=>1,
            'browse'=>0,
            'read'=>0,
            'edit'=>0,
            'add'=>0,
            'delete'=>0,
            'details'=>'{}',
            'order'=>1
        ] );



        Datarow::create( [
            'id'=>126,
            'data_type_id'=>18,
            'field'=>'name',
            'type'=>'text',
            'display_name'=>'Name',
            'required'=>0,
            'browse'=>1,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>"{\"validation\":{\"rule\":\"required\"}}",
            'order'=>2
        ] );

        Datarow::create( [
            'id'=>128,
            'data_type_id'=>18,
            'field'=>'small_description',
            'type'=>'text_area',
            'display_name'=>'Small Description',
            'required'=>0,
            'browse'=>0,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>"{\"validation\":{\"rule\":\"required\"}}",
            'order'=>6
        ] );



        Datarow::create( [
            'id'=>129,
            'data_type_id'=>18,
            'field'=>'description',
            'type'=>'rich_text_box',
            'display_name'=>'Description',
            'required'=>0,
            'browse'=>0,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>"{\"validation\":{\"rule\":\"required\"}}",
            'order'=>7
        ] );



        Datarow::create( [
            'id'=>130,
            'data_type_id'=>18,
            'field'=>'address',
            'type'=>'text',
            'display_name'=>'Address',
            'required'=>0,
            'browse'=>0,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>"{\"validation\":{\"rule\":\"required\"}}",
            'order'=>8
        ] );



        Datarow::create( [
            'id'=>131,
            'data_type_id'=>18,
            'field'=>'phone',
            'type'=>'text',
            'display_name'=>'Phone',
            'required'=>0,
            'browse'=>0,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>"{\"validation\":{\"rule\":\"required\"}}",
            'order'=>9
        ] );



        Datarow::create( [
            'id'=>132,
            'data_type_id'=>18,
            'field'=>'email',
            'type'=>'text',
            'display_name'=>'Email',
            'required'=>0,
            'browse'=>0,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>"{\"validation\":{\"rule\":\"required\"}}",
            'order'=>10
        ] );



        Datarow::create( [
            'id'=>133,
            'data_type_id'=>18,
            'field'=>'map_x',
            'type'=>'text',
            'display_name'=>'Map X',
            'required'=>0,
            'browse'=>0,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>'{}',
            'order'=>11
        ] );



        Datarow::create( [
            'id'=>134,
            'data_type_id'=>18,
            'field'=>'map_y',
            'type'=>'text',
            'display_name'=>'Map Y',
            'required'=>0,
            'browse'=>0,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>'{}',
            'order'=>12
        ] );



        Datarow::create( [
            'id'=>135,
            'data_type_id'=>18,
            'field'=>'photo',
            'type'=>'image',
            'display_name'=>'Photo',
            'required'=>0,
            'browse'=>1,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>"{\"validation\":{\"rule\":\"required\"}}",
            'order'=>13
        ] );



        Datarow::create( [
            'id'=>136,
            'data_type_id'=>18,
            'field'=>'meta_keywords',
            'type'=>'text',
            'display_name'=>'Meta Keywords',
            'required'=>0,
            'browse'=>0,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>"{\"validation\":{\"rule\":\"required\"}}",
            'order'=>14
        ] );



        Datarow::create( [
            'id'=>137,
            'data_type_id'=>18,
            'field'=>'meta_description',
            'type'=>'text_area',
            'display_name'=>'Meta Description',
            'required'=>0,
            'browse'=>0,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>"{\"validation\":{\"rule\":\"required\"}}",
            'order'=>15
        ] );



        Datarow::create( [
            'id'=>138,
            'data_type_id'=>18,
            'field'=>'created_at',
            'type'=>'timestamp',
            'display_name'=>'Created At',
            'required'=>0,
            'browse'=>0,
            'read'=>1,
            'edit'=>1,
            'add'=>0,
            'delete'=>1,
            'details'=>'{}',
            'order'=>16
        ] );



        Datarow::create( [
            'id'=>139,
            'data_type_id'=>18,
            'field'=>'updated_at',
            'type'=>'timestamp',
            'display_name'=>'Updated At',
            'required'=>0,
            'browse'=>0,
            'read'=>0,
            'edit'=>0,
            'add'=>0,
            'delete'=>0,
            'details'=>'{}',
            'order'=>17
        ] );



        Datarow::create( [
            'id'=>140,
            'data_type_id'=>18,
            'field'=>'status',
            'type'=>'text',
            'display_name'=>'',
            'required'=>0,
            'browse'=>0,
            'read'=>0,
            'edit'=>0,
            'add'=>0,
            'delete'=>0,
            'details'=>'{}',
            'order'=>18
        ] );



        Datarow::create( [
            'id'=>141,
            'data_type_id'=>19,
            'field'=>'id',
            'type'=>'text',
            'display_name'=>'Id',
            'required'=>1,
            'browse'=>0,
            'read'=>0,
            'edit'=>0,
            'add'=>0,
            'delete'=>0,
            'details'=>'{}',
            'order'=>1
        ] );



        Datarow::create( [
            'id'=>142,
            'data_type_id'=>19,
            'field'=>'title',
            'type'=>'text',
            'display_name'=>'Title',
            'required'=>0,
            'browse'=>1,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>"{\"validation\":{\"rule\":\"required\"}}",
            'order'=>2
        ] );



       



        Datarow::create( [
            'id'=>144,
            'data_type_id'=>19,
            'field'=>'small_description',
            'type'=>'text_area',
            'display_name'=>'Small Description',
            'required'=>0,
            'browse'=>0,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>"{\"validation\":{\"rule\":\"required\"}}",
            'order'=>6
        ] );



        Datarow::create( [
            'id'=>145,
            'data_type_id'=>19,
            'field'=>'description',
            'type'=>'rich_text_box',
            'display_name'=>'Description',
            'required'=>0,
            'browse'=>0,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>"{\"validation\":{\"rule\":\"required\"}}",
            'order'=>7
        ] );



        Datarow::create( [
            'id'=>146,
            'data_type_id'=>19,
            'field'=>'photo',
            'type'=>'image',
            'display_name'=>'Photo',
            'required'=>0,
            'browse'=>1,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>"",
            'order'=>8
        ] );



        Datarow::create( [
            'id'=>147,
            'data_type_id'=>19,
            'field'=>'meta_keywords',
            'type'=>'text',
            'display_name'=>'Meta Keywords',
            'required'=>0,
            'browse'=>0,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>"{\"validation\":{\"rule\":\"required\"}}",
            'order'=>9
        ] );



        Datarow::create( [
            'id'=>148,
            'data_type_id'=>19,
            'field'=>'meta_description',
            'type'=>'text_area',
            'display_name'=>'Meta Description',
            'required'=>0,
            'browse'=>0,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>"{\"validation\":{\"rule\":\"required\"}}",
            'order'=>10
        ] );



        Datarow::create( [
            'id'=>149,
            'data_type_id'=>19,
            'field'=>'status',
            'type'=>'text',
            'display_name'=>'Status',
            'required'=>0,
            'browse'=>0,
            'read'=>0,
            'edit'=>0,
            'add'=>0,
            'delete'=>0,
            'details'=>'{}',
            'order'=>11
        ] );



        Datarow::create( [
            'id'=>150,
            'data_type_id'=>19,
            'field'=>'created_at',
            'type'=>'timestamp',
            'display_name'=>'Created At',
            'required'=>0,
            'browse'=>0,
            'read'=>1,
            'edit'=>1,
            'add'=>0,
            'delete'=>1,
            'details'=>'{}',
            'order'=>12
        ] );



        Datarow::create( [
            'id'=>151,
            'data_type_id'=>19,
            'field'=>'updated_at',
            'type'=>'timestamp',
            'display_name'=>'Updated At',
            'required'=>0,
            'browse'=>0,
            'read'=>0,
            'edit'=>0,
            'add'=>0,
            'delete'=>0,
            'details'=>'{}',
            'order'=>13
        ] );

        Datarow::create( [
            'id'=>164,
            'data_type_id'=>21,
            'field'=>'id',
            'type'=>'text',
            'display_name'=>'Id',
            'required'=>1,
            'browse'=>0,
            'read'=>0,
            'edit'=>0,
            'add'=>0,
            'delete'=>0,
            'details'=>'{}',
            'order'=>1
        ] );



        Datarow::create( [
            'id'=>167,
            'data_type_id'=>21,
            'field'=>'created_at',
            'type'=>'timestamp',
            'display_name'=>'Created At',
            'required'=>0,
            'browse'=>1,
            'read'=>1,
            'edit'=>1,
            'add'=>0,
            'delete'=>1,
            'details'=>'{}',
            'order'=>4
        ] );



        Datarow::create( [
            'id'=>168,
            'data_type_id'=>21,
            'field'=>'updated_at',
            'type'=>'timestamp',
            'display_name'=>'Updated At',
            'required'=>0,
            'browse'=>0,
            'read'=>0,
            'edit'=>0,
            'add'=>0,
            'delete'=>0,
            'details'=>'{}',
            'order'=>5
        ] );



        Datarow::create( [
            'id'=>169,
            'data_type_id'=>21,
            'field'=>'name',
            'type'=>'text',
            'display_name'=>'name',
            'required'=>0,
            'browse'=>1,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>"{\"validation\":{\"rule\":\"required\"}}",
            'order'=>2
        ] );



        Datarow::create( [
            'id'=>170,
            'data_type_id'=>21,
            'field'=>'slug',
            'type'=>'text',
            'display_name'=>'slug',
            'required'=>0,
            'browse'=>1,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>"{\"slugify\":{\"origin\":\"name\",\"forceUpdate\":true}}",
            'order'=>3
        ] );



        Datarow::create( [
            'id'=>171,
            'data_type_id'=>21,
            'field'=>'description',
            'type'=>'text_area',
            'display_name'=>'description',
            'required'=>0,
            'browse'=>0,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>"{\"validation\":{\"rule\":\"required\"}}",
            'order'=>4
        ] );



        Datarow::create( [
            'id'=>173,
            'data_type_id'=>5,
            'field'=>'post_belongstomany_tag_relationship',
            'type'=>'relationship',
            'display_name'=>'tags',
            'required'=>0,
            'browse'=>1,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>"{\"model\":\"App\\\\Tag\",\"table\":\"tags\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"post_tag\",\"pivot\":\"1\",\"taggable\":\"on\"}",
            'order'=>16
        ] );



        Datarow::create( [
            'id'=>174,
            'data_type_id'=>22,
            'field'=>'id',
            'type'=>'text',
            'display_name'=>'Id',
            'required'=>1,
            'browse'=>0,
            'read'=>0,
            'edit'=>0,
            'add'=>0,
            'delete'=>0,
            'details'=>'{}',
            'order'=>1
        ] );



        Datarow::create( [
            'id'=>176,
            'data_type_id'=>22,
            'field'=>'description',
            'type'=>'rich_text_box',
            'display_name'=>'Description',
            'required'=>0,
            'browse'=>0,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>"{\"validation\":{\"rule\":\"required\"}}",
            'order'=>6
        ] );



        Datarow::create( [
            'id'=>177,
            'data_type_id'=>22,
            'field'=>'start',
            'type'=>'timestamp',
            'display_name'=>'Start',
            'required'=>0,
            'browse'=>1,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>"{\"validation\":{\"rule\":\"required|date\"}}",
            'order'=>7
        ] );



        Datarow::create( [
            'id'=>178,
            'data_type_id'=>22,
            'field'=>'end',
            'type'=>'timestamp',
            'display_name'=>'End',
            'required'=>0,
            'browse'=>1,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>"{\"validation\":{\"rule\":\"required|date|after_or_equal:start\"}}",
            'order'=>8
        ] );



        Datarow::create( [
            'id'=>179,
            'data_type_id'=>22,
            'field'=>'img',
            'type'=>'image',
            'display_name'=>'Img',
            'required'=>0,
            'browse'=>1,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>"{\"validation\":{\"rule\":\"required\"}}",
            'order'=>9
        ] );



        Datarow::create( [
            'id'=>180,
            'data_type_id'=>22,
            'field'=>'images',
            'type'=>'multiple_images',
            'display_name'=>'Images',
            'required'=>0,
            'browse'=>0,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>'{}',
            'order'=>10
        ] );



        Datarow::create( [
            'id'=>181,
            'data_type_id'=>22,
            'field'=>'map_x',
            'type'=>'text',
            'display_name'=>'Map X',
            'required'=>0,
            'browse'=>0,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>'{}',
            'order'=>11
        ] );



        Datarow::create( [
            'id'=>182,
            'data_type_id'=>22,
            'field'=>'map_y',
            'type'=>'text',
            'display_name'=>'Map Y',
            'required'=>0,
            'browse'=>0,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>'{}',
            'order'=>12
        ] );



        Datarow::create( [
            'id'=>183,
            'data_type_id'=>22,
            'field'=>'stock',
            'type'=>'number',
            'display_name'=>'Stock',
            'required'=>0,
            'browse'=>0,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>'{}',
            'order'=>13
        ] );



        Datarow::create( [
            'id'=>184,
            'data_type_id'=>22,
            'field'=>'status',
            'type'=>'number',
            'display_name'=>'Status',
            'required'=>0,
            'browse'=>0,
            'read'=>0,
            'edit'=>0,
            'add'=>0,
            'delete'=>0,
            'details'=>'{}',
            'order'=>14
        ] );



        Datarow::create( [
            'id'=>185,
            'data_type_id'=>22,
            'field'=>'created_at',
            'type'=>'timestamp',
            'display_name'=>'Created At',
            'required'=>0,
            'browse'=>0,
            'read'=>1,
            'edit'=>1,
            'add'=>0,
            'delete'=>1,
            'details'=>'{}',
            'order'=>17
        ] );



        Datarow::create( [
            'id'=>186,
            'data_type_id'=>22,
            'field'=>'updated_at',
            'type'=>'timestamp',
            'display_name'=>'Updated At',
            'required'=>0,
            'browse'=>0,
            'read'=>0,
            'edit'=>0,
            'add'=>0,
            'delete'=>0,
            'details'=>'{}',
            'order'=>18
        ] );



        Datarow::create( [
            'id'=>187,
            'data_type_id'=>22,
            'field'=>'title',
            'type'=>'text',
            'display_name'=>'Title',
            'required'=>0,
            'browse'=>1,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>"{\"validation\":{\"rule\":\"required\"}}",
            'order'=>2
        ] );

        Datarow::create( [
            'id'=>189,
            'data_type_id'=>22,
            'field'=>'meta_keywords',
            'type'=>'text',
            'display_name'=>'meta Keywords',
            'required'=>0,
            'browse'=>0,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>"{\"validation\":{\"rule\":\"required\"}}",
            'order'=>15
        ] );



        Datarow::create( [
            'id'=>190,
            'data_type_id'=>22,
            'field'=>'meta_description',
            'type'=>'text_area',
            'display_name'=>'meta Description',
            'required'=>0,
            'browse'=>0,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>"{\"validation\":{\"rule\":\"required\"}}",
            'order'=>16
        ] );



        Datarow::create( [
            'id'=>191,
            'data_type_id'=>1,
            'field'=>'last_name',
            'type'=>'text',
            'display_name'=>'Last Name',
            'required'=>0,
            'browse'=>1,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>'{}',
            'order'=>3
        ] );



        Datarow::create( [
            'id'=>192,
            'data_type_id'=>1,
            'field'=>'phone',
            'type'=>'text',
            'display_name'=>'Phone',
            'required'=>1,
            'browse'=>1,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>'{}',
            'order'=>13
        ] );



        Datarow::create( [
            'id'=>193,
            'data_type_id'=>1,
            'field'=>'gender',
            'type'=>'text',
            'display_name'=>'Gender',
            'required'=>1,
            'browse'=>1,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>'{}',
            'order'=>14
        ] );



        Datarow::create( [
            'id'=>194,
            'data_type_id'=>1,
            'field'=>'address',
            'type'=>'text_area',
            'display_name'=>'',
            'required'=>0,
            'browse'=>0,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>'{}',
            'order'=>15
        ] );



        Datarow::create( [
            'id'=>195,
            'data_type_id'=>5,
            'field'=>'post_belongstomany_user_relationship',
            'type'=>'relationship',
            'display_name'=>'users',
            'required'=>0,
            'browse'=>0,
            'read'=>0,
            'edit'=>0,
            'add'=>0,
            'delete'=>0,
            'details'=>"{\"model\":\"App\\\\User\",\"table\":\"users\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"post_user\",\"pivot\":\"1\",\"taggable\":\"0\"}",
            'order'=>17
        ] );





        Datarow::create( [
            'id'=>204,
            'data_type_id'=>19,
            'field'=>'slug',
            'type'=>'text',
            'display_name'=>'Slug',
            'required'=>0,
            'browse'=>1,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>"{\"slugify\":{\"origin\":\"name\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:services,slug\"}}",
            'order'=>3
        ] );



        Datarow::create( [
            'id'=>206,
            'data_type_id'=>18,
            'field'=>'slug',
            'type'=>'text',
            'display_name'=>'Slug',
            'required'=>0,
            'browse'=>1,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>"{\"slugify\":{\"origin\":\"name\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:clinics,slug\"}}",
            'order'=>3
        ] );





        Datarow::create( [
            'id'=>208,
            'data_type_id'=>22,
            'field'=>'slug',
            'type'=>'text',
            'display_name'=>'Slug',
            'required'=>0,
            'browse'=>1,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>"{\"slugify\":{\"origin\":\"title\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:events,slug\"}}",
            'order'=>3
        ] );



       

        Datarow::create( [
            'id'=>210,
            'data_type_id'=>26,
            'field'=>'id',
            'type'=>'text',
            'display_name'=>'Id',
            'required'=>1,
            'browse'=>0,
            'read'=>0,
            'edit'=>0,
            'add'=>0,
            'delete'=>0,
            'details'=>'{}',
            'order'=>1
        ] );



        Datarow::create( [
            'id'=>211,
            'data_type_id'=>26,
            'field'=>'first_name',
            'type'=>'text',
            'display_name'=>'First Name',
            'required'=>0,
            'browse'=>1,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>'{}',
            'order'=>2
        ] );



        Datarow::create( [
            'id'=>212,
            'data_type_id'=>26,
            'field'=>'last_name',
            'type'=>'text',
            'display_name'=>'Last Name',
            'required'=>0,
            'browse'=>1,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>'{}',
            'order'=>3
        ] );



        Datarow::create( [
            'id'=>213,
            'data_type_id'=>26,
            'field'=>'email',
            'type'=>'text',
            'display_name'=>'Email',
            'required'=>0,
            'browse'=>1,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>'{}',
            'order'=>4
        ] );



        Datarow::create( [
            'id'=>214,
            'data_type_id'=>26,
            'field'=>'phone',
            'type'=>'text',
            'display_name'=>'Phone',
            'required'=>0,
            'browse'=>1,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>'{}',
            'order'=>5
        ] );



        Datarow::create( [
            'id'=>215,
            'data_type_id'=>26,
            'field'=>'gender',
            'type'=>'select_dropdown',
            'display_name'=>'Gender',
            'required'=>0,
            'browse'=>1,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>"{\"default\":\"Male\",\"options\":{\"1\":\"Male\",\"2\":\"Female\"}}",
            'order'=>6
        ] );



        Datarow::create( [
            'id'=>216,
            'data_type_id'=>26,
            'field'=>'clinic_id',
            'type'=>'text',
            'display_name'=>'Clinic Id',
            'required'=>0,
            'browse'=>0,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>'{}',
            'order'=>7
        ] );



        Datarow::create( [
            'id'=>217,
            'data_type_id'=>26,
            'field'=>'type',
            'type'=>'select_dropdown',
            'display_name'=>'Type',
            'required'=>0,
            'browse'=>1,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>"{\"default\":\"clinic\",\"options\":{\"1\":\"clinic\",\"2\":\"doctor\",\"3\":\"service\",\"4\":\"post\"}}",
            'order'=>8
        ] );



        Datarow::create( [
            'id'=>218,
            'data_type_id'=>26,
            'field'=>'url',
            'type'=>'text',
            'display_name'=>'Url',
            'required'=>0,
            'browse'=>0,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>'{}',
            'order'=>9
        ] );



        Datarow::create( [
            'id'=>219,
            'data_type_id'=>26,
            'field'=>'further_requirements',
            'type'=>'text_area',
            'display_name'=>'Further Requirements',
            'required'=>0,
            'browse'=>1,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>'{}',
            'order'=>10
        ] );



        Datarow::create( [
            'id'=>220,
            'data_type_id'=>26,
            'field'=>'created_at',
            'type'=>'timestamp',
            'display_name'=>'Created At',
            'required'=>0,
            'browse'=>1,
            'read'=>1,
            'edit'=>1,
            'add'=>0,
            'delete'=>1,
            'details'=>'{}',
            'order'=>11
        ] );



        Datarow::create( [
            'id'=>221,
            'data_type_id'=>26,
            'field'=>'updated_at',
            'type'=>'timestamp',
            'display_name'=>'Updated At',
            'required'=>0,
            'browse'=>0,
            'read'=>0,
            'edit'=>0,
            'add'=>0,
            'delete'=>0,
            'details'=>'{}',
            'order'=>12
        ] );



        Datarow::create( [
            'id'=>222,
            'data_type_id'=>26,
            'field'=>'clinic_request_belongsto_clinic_relationship',
            'type'=>'relationship',
            'display_name'=>'clinics',
            'required'=>0,
            'browse'=>1,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>"{\"model\":\"App\\\\Clinic\",\"table\":\"clinics\",\"type\":\"belongsTo\",\"column\":\"clinic_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"admins\",\"pivot\":\"0\",\"taggable\":\"0\"}",
            'order'=>13
        ] );



        Datarow::create( [
            'id'=>223,
            'data_type_id'=>28,
            'field'=>'id',
            'type'=>'text',
            'display_name'=>'Id',
            'required'=>1,
            'browse'=>0,
            'read'=>0,
            'edit'=>0,
            'add'=>0,
            'delete'=>0,
            'details'=>'{}',
            'order'=>1
        ] );



        Datarow::create( [
            'id'=>224,
            'data_type_id'=>28,
            'field'=>'title',
            'type'=>'text',
            'display_name'=>'Title',
            'required'=>0,
            'browse'=>1,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>"{\"validation\":{\"rule\":\"required\"}}",
            'order'=>2
        ] );



        Datarow::create( [
            'id'=>225,
            'data_type_id'=>28,
            'field'=>'url',
            'type'=>'text',
            'display_name'=>'Url',
            'required'=>0,
            'browse'=>1,
            'read'=>1,
            'edit'=>1,
            'add'=>1,
            'delete'=>1,
            'details'=>"{\"validation\":{\"rule\":\"required\"}}",
            'order'=>3
        ] );



        Datarow::create( [
            'id'=>226,
            'data_type_id'=>28,
            'field'=>'status',
            'type'=>'text',
            'display_name'=>'Status',
            'required'=>0,
            'browse'=>0,
            'read'=>0,
            'edit'=>0,
            'add'=>0,
            'delete'=>0,
            'details'=>'{}',
            'order'=>4
        ] );



        Datarow::create( [
            'id'=>227,
            'data_type_id'=>28,
            'field'=>'created_at',
            'type'=>'timestamp',
            'display_name'=>'Created At',
            'required'=>0,
            'browse'=>1,
            'read'=>1,
            'edit'=>1,
            'add'=>0,
            'delete'=>1,
            'details'=>'{}',
            'order'=>5
        ] );



        Datarow::create( [
            'id'=>228,
            'data_type_id'=>28,
            'field'=>'updated_at',
            'type'=>'timestamp',
            'display_name'=>'Updated At',
            'required'=>0,
            'browse'=>0,
            'read'=>0,
            'edit'=>0,
            'add'=>0,
            'delete'=>0,
            'details'=>'{}',
            'order'=>6
        ] );



/*start partners*/

$itemDataType_partners = DataType::where('slug', 'partners')->firstOrFail();
$partner_id=$itemDataType_partners->id;
Datarow::create( [
    'data_type_id'=>$partner_id,
    'field'=>'id',
    'type'=>'text',
    'display_name'=>'Id',
    'required'=>1,
    'browse'=>0,
    'read'=>0,
    'edit'=>0,
    'add'=>0,
    'delete'=>0,
    'details'=>'{}',
    'order'=>1
] );
Datarow::create( [
    'data_type_id'=>$partner_id,
    'field'=>'logo',
    'type'=>'image',
    'display_name'=>'Logo',
    'required'=>1,
    'browse'=>1,
    'read'=>1,
    'edit'=>1,
    'add'=>1,
    'delete'=>1,
    'details'=>'{\"validation\":{\"rule\":\"required\"}}',
    'order'=>2
] );
Datarow::create( [
    'data_type_id'=>$partner_id,
    'field'=>'link',
    'type'=>'text',
    'display_name'=>'Link',
    'required'=>1,
    'browse'=>1,
    'read'=>1,
    'edit'=>1,
    'add'=>1,
    'delete'=>1,
    'details'=>'{\"validation\":{\"rule\":\"required\"}}',
    'order'=>3
] );

Datarow::create( [
    'data_type_id'=>$partner_id,
    'field'=>'image_title',
    'type'=>'text',
    'display_name'=>'Image title',
    'required'=>1,
    'browse'=>1,
    'read'=>1,
    'edit'=>1,
    'add'=>1,
    'delete'=>1,
    'details'=>'{\"validation\":{\"rule\":\"required\"}}',
    'order'=>4
] );

Datarow::create( [
    'data_type_id'=>$partner_id,
    'field'=>'image_alt',
    'type'=>'text',
    'display_name'=>'Image alt',
    'required'=>1,
    'browse'=>1,
    'read'=>1,
    'edit'=>1,
    'add'=>1,
    'delete'=>1,
    'details'=>'{\"validation\":{\"rule\":\"required\"}}',
    'order'=>5
] );

Datarow::create( [
    'data_type_id'=>$partner_id,
    'field'=>'created_at',
    'type'=>'timestamp',
    'display_name'=>'Created At',
    'required'=>0,
    'browse'=>1,
    'read'=>1,
    'edit'=>1,
    'add'=>0,
    'delete'=>1,
    'details'=>'{}',
    'order'=>6
] );



Datarow::create( [
    'data_type_id'=>$partner_id,
    'field'=>'updated_at',
    'type'=>'timestamp',
    'display_name'=>'Updated At',
    'required'=>0,
    'browse'=>0,
    'read'=>0,
    'edit'=>0,
    'add'=>0,
    'delete'=>0,
    'details'=>'{}',
    'order'=>7
] );
Datarow::create( [
    'data_type_id'=>$partner_id,
    'field'=>'order',
    'type'=>'number',
    'display_name'=>'Order',
    'required'=>1,
    'browse'=>1,
    'read'=>1,
    'edit'=>1,
    'add'=>1,
    'delete'=>1,
    'details'=>'{}',
    'order'=>8
] );
/*end partners*/ 

/*start testimonalis*/
$itemDataType_testimonials = DataType::where('slug', 'testimonials')->firstOrFail();
$testimonials_id=$itemDataType_testimonials->id;
Datarow::create( [
    'data_type_id'=>$testimonials_id,
    'field'=>'id',
    'type'=>'text',
    'display_name'=>'Id',
    'required'=>1,
    'browse'=>0,
    'read'=>0,
    'edit'=>0,
    'add'=>0,
    'delete'=>0,
    'details'=>'{}',
    'order'=>1
] );

Datarow::create( [
    'data_type_id'=>$testimonials_id,
    'field'=>'username',
    'type'=>'text',
    'display_name'=>'Username',
    'required'=>1,
    'browse'=>1,
    'read'=>1,
    'edit'=>1,
    'add'=>1,
    'delete'=>1,
    'details'=>'{\"validation\":{\"rule\":\"required\"}}',
    'order'=>2
] );

Datarow::create( [
    'data_type_id'=>$testimonials_id,
    'field'=>'images',
    'type'=>'image',
    'display_name'=>'Images',
    'required'=>1,
    'browse'=>1,
    'read'=>1,
    'edit'=>1,
    'add'=>1,
    'delete'=>1,
    'details'=>'{\"validation\":{\"rule\":\"required\"}}',
    'order'=>3
] );


Datarow::create( [
    'data_type_id'=>$testimonials_id,
    'field'=>'description',
    'type'=>'text_area',
    'display_name'=>'Description',
    'required'=>1,
    'browse'=>1,
    'read'=>1,
    'edit'=>1,
    'add'=>1,
    'delete'=>1,
    'details'=>'{\"validation\":{\"rule\":\"required\"}}',
    'order'=>4
] );

Datarow::create( [
    'data_type_id'=>$testimonials_id,
    'field'=>'created_at',
    'type'=>'timestamp',
    'display_name'=>'Created At',
    'required'=>0,
    'browse'=>1,
    'read'=>1,
    'edit'=>1,
    'add'=>0,
    'delete'=>1,
    'details'=>'{}',
    'order'=>5
] );





Datarow::create( [
    'data_type_id'=>$testimonials_id,
    'field'=>'updated_at',
    'type'=>'timestamp',
    'display_name'=>'Updated At',
    'required'=>0,
    'browse'=>0,
    'read'=>0,
    'edit'=>0,
    'add'=>0,
    'delete'=>0,
    'details'=>'{}',
    'order'=>6
] );
Datarow::create( [
    'data_type_id'=>$testimonials_id,
    'field'=>'order',
    'type'=>'number',
    'display_name'=>'Order',
    'required'=>1,
    'browse'=>1,
    'read'=>1,
    'edit'=>1,
    'add'=>1,
    'delete'=>1,
    'details'=>'{}',
    'order'=>7
] );
/*end testimonials*/

/*start selling points*/
$itemDataType_selling_points = DataType::where('slug', 'selling-points')->firstOrFail();
$selling_points_id=$itemDataType_selling_points->id;

Datarow::create( [
    'data_type_id'=>$selling_points_id,
    'field'=>'id',
    'type'=>'text',
    'display_name'=>'id',
    'required'=>1,
    'browse'=>1,
    'read'=>1,
    'edit'=>1,
    'add'=>1,
    'delete'=>1,
    'details'=>'{}',
    'order'=>4
] );

Datarow::create( [
    'data_type_id'=>$selling_points_id,
    'field'=>'logo',
    'type'=>'image',
    'display_name'=>'Logo',
    'required'=>1,
    'browse'=>1,
    'read'=>1,
    'edit'=>1,
    'add'=>1,
    'delete'=>1,
    'details'=>'{}',
    'order'=>2
] );


Datarow::create( [
    'data_type_id'=>$selling_points_id,
    'field'=>'title',
    'type'=>'text',
    'display_name'=>'Title',
    'required'=>1,
    'browse'=>1,
    'read'=>1,
    'edit'=>1,
    'add'=>1,
    'delete'=>1,
    'details'=>'{\"validation\":{\"rule\":\"required\"}}',
    'order'=>3
] );


Datarow::create( [
    'data_type_id'=>$selling_points_id,
    'field'=>'description',
    'type'=>'text_area',
    'display_name'=>'Description',
    'required'=>1,
    'browse'=>1,
    'read'=>1,
    'edit'=>1,
    'add'=>1,
    'delete'=>1,
    'details'=>'{\"validation\":{\"rule\":\"required\"}}',
    'order'=>4
] );


Datarow::create( [
    'data_type_id'=>$selling_points_id,
    'field'=>'created_at',
    'type'=>'timestamp',
    'display_name'=>'Created At',
    'required'=>0,
    'browse'=>1,
    'read'=>1,
    'edit'=>1,
    'add'=>0,
    'delete'=>1,
    'details'=>'{}',
    'order'=>5
] );

Datarow::create( [
    'data_type_id'=>$selling_points_id,
    'field'=>'updated_at',
    'type'=>'timestamp',
    'display_name'=>'Updated At',
    'required'=>0,
    'browse'=>0,
    'read'=>0,
    'edit'=>0,
    'add'=>0,
    'delete'=>0,
    'details'=>'{}',
    'order'=>6
] );
Datarow::create( [
    'data_type_id'=>$selling_points_id,
    'field'=>'order',
    'type'=>'number',
    'display_name'=>'Order',
    'required'=>1,
    'browse'=>1,
    'read'=>1,
    'edit'=>1,
    'add'=>1,
    'delete'=>1,
    'details'=>'{}',
    'order'=>7
] );
/*end selling points*/
}
}

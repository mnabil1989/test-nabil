<?php

use Illuminate\Database\Seeder;
use App\Setting;
use App\SiteSetting as Seosetting;

class SettingsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        Seosetting::create([
            'id' => 3,
            'key' => 'title-meta.Title_Separator',
            'display_name' => 'Title Separator',
            'value' => '|',
            'details' => "
            {
    \"default\" : \"|\",
    \"options\" : {
        \"-\": \"-\",
        \"_\": \"_\",
        \"__\": \"__\",
        \".\": \".\",
        \"*\": \"*\",
        \"|\": \"|\",
        \"~\": \"~\",
        \"<\": \"<\",
        \">\": \">\",
        \"«\": \"«\",
        \"»\": \"»\"
    }
    }
            ",



            'type' => 'select_dropdown',
            'order' => 2,
            'group' => 'Title & Meta'
        ]);


        Seosetting::create([
            'id' => 4,
            'key' => 'title-meta.Title_template',
            'display_name' => 'Title template',
            'value' => '',
            'details' => NULL,
            'type' => 'text',
            'order' => 1,
            'group' => 'Title & Meta'
        ]);


        Seosetting::create([
            'id' => 5,
            'key' => 'title-meta.meta_description_template',
            'display_name' => 'Meta description template',
            'value' => NULL,
            'details' => NULL,
            'type' => 'text_area',
            'order' => 3,
            'group' => 'Title & Meta'
        ]);


        Seosetting::create([
            'id' => 9,
            'key' => 'social.Facebook_page_uRL',
            'display_name' => 'Facebook Page URL',
            'value' => NULL,
            'details' => NULL,
            'type' => 'text',
            'order' => 5,
            'group' => 'Social'
        ]);


        Seosetting::create([
            'id' => 10,
            'key' => 'social.Twitter_username',
            'display_name' => 'Twitter Username',
            'value' => NULL,
            'details' => NULL,
            'type' => 'text',
            'order' => 6,
            'group' => 'Social'
        ]);


        Seosetting::create([
            'id' => 11,
            'key' => 'social.Instagram_uRL',
            'display_name' => 'Instagram URL',
            'value' => NULL,
            'details' => NULL,
            'type' => 'text',
            'order' => 7,
            'group' => 'Social'
        ]);


        Seosetting::create([
            'id' => 12,
            'key' => 'social.LinkedIn_uRL',
            'display_name' => 'LinkedIn URL',
            'value' => NULL,
            'details' => NULL,
            'type' => 'text',
            'order' => 8,
            'group' => 'Social'
        ]);


        Seosetting::create([
            'id' => 13,
            'key' => 'social.YouTube_uRL',
            'display_name' => 'YouTube URL',
            'value' => NULL,
            'details' => NULL,
            'type' => 'text',
            'order' => 9,
            'group' => 'Social'
        ]);


        Seosetting::create([
            'id' => 14,
            'key' => 'open-graph.title',
            'display_name' => 'title',
            'value' => NULL,
            'details' => NULL,
            'type' => 'text',
            'order' => 10,
            'group' => 'Open Graph'
        ]);


        Seosetting::create([
            'id' => 15,
            'key' => 'open-graph.description',
            'display_name' => 'description',
            'value' => NULL,
            'details' => NULL,
            'type' => 'text',
            'order' => 11,
            'group' => 'Open Graph'
        ]);


        Seosetting::create([
            'id' => 16,
            'key' => 'open-graph.url',
            'display_name' => 'url',
            'value' => NULL,
            'details' => NULL,
            'type' => 'text',
            'order' => 12,
            'group' => 'Open Graph'
        ]);


        Seosetting::create([
            'id' => 17,
            'key' => 'open-graph.image',
            'display_name' => 'image',
            'value' => 'settings\\February2020\\7GifG2E3SPoOjatdYazK.jpg',
            'details' => NULL,
            'type' => 'image',
            'order' => 13,
            'group' => 'Open Graph'
        ]);


        Seosetting::create([
            'id' => 19,
            'key' => 'open-graph.image:secure_url',
            'display_name' => 'image:secure_url',
            'value' => 'settings\\February2020\\dfBs9bkLbAyjymF0AZ5J.jpg',
            'details' => NULL,
            'type' => 'image',
            'order' => 14,
            'group' => 'Open Graph'
        ]);


        Seosetting::create([
            'id' => 20,
            'key' => 'twitter.cart',
            'display_name' => 'cart',
            'value' => NULL,
            'details' => NULL,
            'type' => 'text',
            'order' => 15,
            'group' => 'Twitter'
        ]);


        Seosetting::create([
            'id' => 21,
            'key' => 'twitter.title',
            'display_name' => 'title',
            'value' => NULL,
            'details' => NULL,
            'type' => 'text',
            'order' => 16,
            'group' => 'Twitter'
        ]);


        Seosetting::create([
            'id' => 22,
            'key' => 'twitter.description',
            'display_name' => 'description',
            'value' => NULL,
            'details' => NULL,
            'type' => 'text',
            'order' => 17,
            'group' => 'Twitter'
        ]);


        Seosetting::create([
            'id' => 23,
            'key' => 'twitter.site',
            'display_name' => 'site',
            'value' => NULL,
            'details' => NULL,
            'type' => 'text',
            'order' => 18,
            'group' => 'Twitter'
        ]);


        Seosetting::create([
            'id' => 24,
            'key' => 'twitter.image',
            'display_name' => 'image',
            'value' => 'settings\\February2020\\BNMlDDtOFWtAWA76EuZF.jpg',
            'details' => NULL,
            'type' => 'image',
            'order' => 19,
            'group' => 'Twitter'
        ]);

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
            'value'=>'asaswww',
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
            'display_name'=>'title Ar',
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
            'key'=>'site.description Ar',
            'display_name'=>'description Ar',
            'value'=>'',
            'details'=>NULL,
            'type'=>'text_area',
            'order'=>30,
            'group'=>'Site'
        ] );
    }
}

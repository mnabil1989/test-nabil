<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $keys = [
            'browse_admin',
            'browse_bread',
            'browse_database',
            'browse_media',
            'browse_compass',
        ];

        foreach ($keys as $key) {
            Permission::firstOrCreate([
                'key'        => $key,
                'table_name' => null,
            ]);
        }

        Permission::generateFor('menus');
        Permission::generateFor('roles');
        Permission::generateFor('users');
        Permission::generateFor('settings');
        Permission::generateFor('categories');
        Permission::generateFor('posts');
        Permission::generateFor('pages');
        Permission::generateFor('admins');
        Permission::generateFor('sliders');
        Permission::generateFor('clinics');
        Permission::generateFor('services');
        Permission::generateFor('doctors');
        Permission::generateFor('tags');
        Permission::generateFor('sitesettings');
        Permission::generateFor('events');
        Permission::generateFor('clinic_requests');
        Permission::generateFor('andalusia_groups');
        Permission::generateFor('notifications');
        Permission::generateFor('survey_question');
        Permission::generateFor('surveys');
        Permission::generateFor('survey_answer');
        Permission::generateFor('pages');
        Permission::generateFor('workinghours');
        Permission::generateFor('appointments');
        Permission::generateFor('specialities');
        Permission::generateFor('bookings');
        Permission::generateFor('booking_phones');
        Permission::generateFor('journeys');
        Permission::generateFor('offers');

    }
}

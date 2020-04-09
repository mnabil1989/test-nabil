<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        $this->call('MenusTableSeeder');
//        $this->call('MenuItemsTableSeeder');
//        $this->call('DataTypesTableSeeder');
//        $this->call('DataRowsTableSeeder');
        $this->call('RolesTableSeeder');
        $this->call('PermissionsTableSeeder');
//        $this->call('PermissionRoleTableSeeder');
//        $this->call('SettingsTableSeeder');
//        $this->call('CategoriesTableSeeder');
//        $this->call('UsersTableSeeder');
//        $this->call('PostsTableSeeder');
//        $this->call('PagesTableSeeder');
//        $this->call('DoctorsTableSeeder');
//        $this->call('WorkingHoursTableSeeder');
//        $this->call('AppointmentsTableSeeder');
//        $this->call('SpecialitiesTableSeeder');
//        $this->call('TranslationsTableSeeder');
        $this->call('PermissionRoleTableSeeder');
          $this->call('Seed742020TableSeeder');

    }
}

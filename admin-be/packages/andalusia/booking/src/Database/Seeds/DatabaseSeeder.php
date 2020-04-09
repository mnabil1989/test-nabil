<?php

namespace Andalusia\Booking\Database\Seeds;

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
        $this->call(BookingModuleSeeder::class);
        $this->call(AppointmentsTableSeeder::class);
        $this->call(BookingsTableSeeder::class);
        $this->call(BookingPhonesTableSeeder::class);
        $this->call(PermissionRoleTableSeeder::class);
    }
}

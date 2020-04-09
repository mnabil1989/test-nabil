<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use TCG\Voyager\Models\Role;
use TCG\Voyager\Models\User;
use App\Admins;

class UsersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
//        if (User::count() == 0) {
//            $role = Role::where('name', 'admin')->firstOrFail();
//
//            User::create([
//                'name'           => 'Admin',
//                'email'          => 'admin@admin.com',
//                'password'       => bcrypt('password'),
//                'remember_token' => Str::random(60),
//                'role_id'        => $role->id,
//            ]);
//        }
        if (Admins::count() == 0) {
            $role = Role::where('name', 'admin')->firstOrFail();

            Admins::create([
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => bcrypt('123123'),
                'remember_token' => Str::random(60),
                'avatar'         =>'/admins/December2019/gXs9H7sAYpOqDxw8fzRE.png',
                'role_id'        => $role->id,
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'name'            => 'Mr. Admin',
                'email'           => 'admin@admin.com',
                'password'        => bcrypt('123456'),
                'role_id'         => 1,
                'remember_token'  => str_random(10),
                'created_at'      => date("Y-m-d H:i:s")
            ],
            [
                'name'            => 'Mr. User',
                'email'           => 'user@user.com',
                'password'        => bcrypt('123456'),
                'role_id'         => 2,
                'remember_token'  => str_random(10),
                'created_at'      => date("Y-m-d H:i:s")
            ]
        ]);
    }
}

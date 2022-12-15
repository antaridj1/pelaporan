<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $users =  [
            [
                'name' => 'Unit A',
                'email' => 'unit1@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'admin'
            ],
            [
                'name' => 'Super Admin 1',
                'email' => 'superadmin1@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'super_admin'
            ],
            [
                'name' => 'Super Admin 2',
                'email' => 'superadmin2@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'super_admin'
            ],
            [
                'name' => 'Master Admin',
                'email' => 'masteradmin@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'master_admin'
            ],
        ];

        foreach($users as $user){
            User::create($user);
        } 
       
    }
}

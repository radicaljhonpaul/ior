<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        
        User::create([
            'fname' => 'Admin',
            'lname' => 'Admin',
            'email' => 'm.coros@covue.com',
            'contact_number' => '000',
            'user_role_id' => 1,
            'password' => bcrypt('COVUE2021!'),
        ]);
    }
}

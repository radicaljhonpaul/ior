<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();
        // \App\Models\User::factory()->create([
        //     'fname' => 'Admin',
        //     'lname' => 'Admin',
        //     'email' => 'm.coros@covue.com',
        //     'contact_number' => '000',
        //     'user_role_id' => 1,
        //     'password' => bcrypt('COVUE2021!'),
        // ]);


        $this->call([LaratrustSeeder::class,CountrySeeder::class,ProductCategorySeeder::class,ProductRegistrationStatusSeeder::class]);
    }
}

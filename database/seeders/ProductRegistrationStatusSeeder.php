<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductRegistrationStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\ProductRegistrationStatus::create( [
            'id'=>1,
            'label'=>'Approved'
       ] );

       \App\Models\ProductRegistrationStatus::create( [
            'id'=>2,
            'label'=>'Declined'
        ] );

        \App\Models\ProductRegistrationStatus::create( [
            'id'=>3,
            'label'=>'Needs Revision'
       ] );

       \App\Models\ProductRegistrationStatus::create( [
            'id'=>4,
            'label'=>'Pending'
          ] );

      \App\Models\ProductRegistrationStatus::create( [
        'id'=>5,
        'label'=>'Recently Updated'
      ] );

      \App\Models\ProductRegistrationStatus::create( [
        'id'=>6,
        'label'=>'Purchased Product Label'
      ] );

      
    }
}

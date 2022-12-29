<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\ProductCategory::create( [
            'id'=>1,
            'category_group'=>'1',
            'category_name'=>'Non-Regulated',
            'active'=>'1'
       ] );

       \App\Models\ProductCategory::create( [
            'id'=>2,
            'category_group'=>'3',
            'category_name'=>'CBD',
            'active'=>'1'
        ] );

        \App\Models\ProductCategory::create( [
            'id'=>3,
            'category_group'=>'2',
            'category_name'=>'Class 1 Medical Devices',
            'active'=>'1'
       ] );

       \App\Models\ProductCategory::create( [
            'id'=>4,
            'category_group'=>'2',
            'category_name'=>'Cosmetics and Personal Care',
            'active'=>'1'
          ] );

      \App\Models\ProductCategory::create( [
        'id'=>5,
        'category_group'=>'3',
        'category_name'=>'Food Apparatus',
        'active'=>'1'
      ] );

      \App\Models\ProductCategory::create( [
        'id'=>6,
        'category_group'=>'3',
        'category_name'=>'Health Food Supplements',
        'active'=>'1'
      ] );

      \App\Models\ProductCategory::create( [
        'id'=>7,
        'category_group'=>'3',
        'category_name'=>'Shelf Stable Foods',
        'active'=>'1'
      ] );

      \App\Models\ProductCategory::create( [
        'id'=>8,
        'category_group'=>'1',
        'category_name'=>'Electronics - Japan Radio',
        'active'=>'1'
      ] );

      \App\Models\ProductCategory::create( [
        'id'=>9,
        'category_group'=>'4',
        'category_name'=>'Supplemental PSE',
        'active'=>'1'
      ] );

      \App\Models\ProductCategory::create( [
        'id'=>10,
        'category_group'=>'3',
        'category_name'=>'Baby Products and Toys under 6',
        'active'=>'1'
      ] );

      \App\Models\ProductCategory::create( [
        'id'=>11,
        'category_group'=>'1',
        'category_name'=>'Non-Regulated - Baby Products',
        'active'=>'1'
      ] );

      \App\Models\ProductCategory::create( [
        'id'=>12,
        'category_group'=>'2',
        'category_name'=>'Class 2 Medical Devices',
        'active'=>'1'
      ] );

      \App\Models\ProductCategory::create( [
        'id'=>13,
        'category_group'=>'2',
        'category_name'=>'Quasi Drugs',
        'active'=>'1'
      ] );

    }
}

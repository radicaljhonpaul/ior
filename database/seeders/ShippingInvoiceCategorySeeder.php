<?php

namespace Database\Seeders;

use App\Models\ShippingInvoiceCategories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShippingInvoiceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        ShippingInvoiceCategories::create( [
            'id'=>1,
            'name'=>'FBA',
            'status'=>'active',
        ] );

        ShippingInvoiceCategories::create( [
            'id'=>2,
            'name'=>'FBM',
            'status'=>'active',
        ] );

        ShippingInvoiceCategories::create( [
            'id'=>3,
            'name'=>'Product Sample',
            'status'=>'active',
        ] );

        ShippingInvoiceCategories::create( [
            'id'=>4,
            'name'=>'Non-Commercial',
            'status'=>'active',
        ] );
    }
}

<?php

namespace Database\Seeders;

use App\Models\ShippingInvoiceStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShippingInvoiceStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ShippingInvoiceStatus::create( [
            'id'=>1,
            'name'=>'Final Approved',
        ] );

        ShippingInvoiceStatus::create( [
            'id'=>2,
            'name'=>'Completed',
        ] );

        ShippingInvoiceStatus::create( [
            'id'=>3,
            'name'=>'Draft',
        ] );

        ShippingInvoiceStatus::create( [
            'id'=>4,
            'name'=>'Pending',
        ] );

        ShippingInvoiceStatus::create( [
            'id'=>5,
            'name'=>'Needs Revision',
        ] );

        ShippingInvoiceStatus::create( [
            'id'=>6,
            'name'=>'CPL Approved',
        ] );
    }
}

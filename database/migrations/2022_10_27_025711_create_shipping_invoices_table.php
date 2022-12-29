<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_invoices', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('billing_invoice_id');
			$table->string('invoice_no_big', 5);
			$table->string('invoice_no_tiny', 3);
			$table->date('invoice_date');
			$table->string('shipping_from_company_name', 255);
			$table->string('shipping_from_company_address', 255);
			$table->string('shipping_from_company_phone', 255);
			$table->string('shipping_destination_company_name', 255);
			$table->string('shipping_destination_company_address', 255);
			$table->string('shipping_destination_company_phone', 255);
			$table->string('shipping_destination_company_recepient', 255);
			$table->tinyInteger('is_same_address');
			$table->integer('status');
			$table->timestamps();
			$table->softDeletes();
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shipping_invoices');
    }
};

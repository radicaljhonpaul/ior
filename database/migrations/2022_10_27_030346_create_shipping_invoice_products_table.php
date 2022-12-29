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
        Schema::create('shipping_invoice_products', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('shipping_invoice_id')->unsigned();
			$table->integer('shipping_invoice_category_id')->unsigned();
			$table->integer('product_id');
			$table->float('qty');
			$table->float('dosp')->nullable();
			$table->string('adosp')->nullable();
			$table->float('amz_sf')->nullable();
			$table->float('amz_ff')->nullable();
			$table->float('tdosp')->nullable();
			$table->float('tadosp')->nullable();
			$table->float('declared_value_in_yen')->nullable();
			$table->float('total_declared_value_in_yen')->nullable();
			$table->float('grand_tdosp');
			$table->float('amz_fees')->nullable();
			$table->float('grand_tasp')->nullable();
			$table->string('fosr', 255)->nullable();
			$table->string('simulator_report', 255)->nullable();
			$table->string('supporting_documents')->nullable();
			$table->timestamps();
		});

		Schema::table('shipping_invoice_products', function(Blueprint $table) {
			$table->foreign('shipping_invoice_id')->references('id')->on('shipping_invoices')
						->onDelete('cascade')
						->onUpdate('cascade');
		});

		Schema::table('shipping_invoice_products', function(Blueprint $table) {
			$table->foreign('shipping_invoice_category_id')->references('id')->on('shipping_invoice_categories')
						->onDelete('cascade')
						->onUpdate('no action');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shipping_invoice_products');
    }
};

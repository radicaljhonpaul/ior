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
      Schema::create('shipping_invoice_status_log', function(Blueprint $table) {
        $table->increments('id');
        $table->integer('shipping_invoice_product_id')->unsigned();
        $table->integer('shipping_invoice_status_id')->unsigned();
        $table->integer('status_updated_by')->unsigned();
        $table->timestamps();
      });

      Schema::table('shipping_invoice_status_log', function(Blueprint $table) {
        $table->foreign('shipping_invoice_product_id')->references('id')->on('shipping_invoice_products')
              ->onDelete('cascade')
              ->onUpdate('cascade');
      });

      Schema::table('shipping_invoice_status_log', function(Blueprint $table) {
        $table->foreign('shipping_invoice_status_id')->references('id')->on('shipping_invoice_status')
              ->onDelete('cascade')
              ->onUpdate('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shipping_invoice_status_logs');
    }
};

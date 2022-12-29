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
        Schema::create('product_registrations', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id');
            $table->tinyInteger('product_categories_id')->nullable();
            $table->string('product_name',100)->nullable();
            $table->string('product_image',100)->nullable();
            $table->string('product_packaging_image',100)->nullable();
            $table->string('product_url',100)->nullable();
            // $table->tinyInteger('product_label')->nullable();
            $table->string('sku',25)->nullable();
            $table->string('hs_code',25)->nullable();
            $table->integer('country_of_origin')->nullable();
            $table->string('asin',50)->nullable();
            $table->string('net_weight',50)->nullable();
            $table->string('product_label_text',100)->nullable();
            $table->string('certificate_country_of_origin_product',100)->nullable();
            $table->tinyInteger('status')->nullable();
            $table->tinyInteger('is_active')->nullable();
            $table->timestamps();
            // $table->string('product_material_composition',100)->nullable();
            // $table->string('model_number',25)->nullable();
            // $table->string('product_barcode',13)->nullable();
            // $table->string('product_barcode_image',100)->nullable();

            // $table->string('product_barcode_type',10)->nullable();
            // $table->string('certificate_country_of_origin_product',100)->nullable();
            // $table->string('product_packaging_material_list',100)->nullable();
            // $table->string('dimension_of_product_packaging_cm',50)->nullable();
            // $table->string('dimension_of_product_cm',50)->nullable();
            // $table->string('msrp',100)->nullable();
            // $table->tinyInteger('is_product_heat_sensitive')->nullable();
            // $table->string('volume',25)->nullable();
            // $table->text('how_to_use')->nullable();
            // $table->text('precautions')->nullable();
            // $table->tinyInteger('product_label_type')->nullable();
            // $table->tinyInteger('product_label_paid')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_registrations');
    }
};

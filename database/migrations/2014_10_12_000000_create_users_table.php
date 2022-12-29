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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->string('email')->unique();
            // $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            // $table->string('contact_person')->nullable();
            $table->string('company_id')->nullable();
            // $table->string('company_name')->nullable();
            // $table->string('company_address')->nullable();
            // $table->string('city')->nullable();
            // $table->integer('country')->nullable();
            // $table->string('zip_code')->nullable();
            // $table->string('business_license')->nullable();
            // $table->integer('consultant_id')->nullable();
            // $table->integer('user_role_id')->nullable();
            // $table->integer('user_level')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('avatar')->nullable();
            $table->integer('department')->nullable();
            // $table->integer('department_head')->nullable();
            // $table->integer('super_admin')->nullable();
            $table->integer('is_paid')->nullable();
            $table->date('payment_date')->nullable();
            // $table->tinyInteger('pli')->nullable();
            // $table->date('pli_date')->nullable();
            // $table->tinyInteger('paid_product_label')->nullable();
            // $table->integer('online_seller')->nullable();
            // $table->string('amazon_seller')->nullable();
            // $table->integer('shipping_company')->nullable();
            // $table->tinyInteger('shipping_company_link')->nullable();
            // $table->tinyInteger('is_new_login')->nullable();
            $table->tinyInteger('is_primary_contact')->nullable();
            $table->tinyInteger('active')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};

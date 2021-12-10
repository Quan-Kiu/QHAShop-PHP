<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('user_type_id')->references('id')->on('user_types');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->foreign('product_type_id')->references('id')->on('product_types');
            $table->foreign('supplier_id')->references('id')->on('suppliers');
        });
        Schema::table('images', function (Blueprint $table) {

            $table->foreign('product_id')->references('id')->on('products');
        });
        Schema::table('sizes', function (Blueprint $table) {

            $table->foreign('product_id')->references('id')->on('products');
        });
        Schema::table('colors', function (Blueprint $table) {

            $table->foreign('product_id')->references('id')->on('products');
        });
        Schema::table('comments', function (Blueprint $table) {

            $table->foreign('product_id')->references('id')->on('products');
        });
        Schema::table('carts', function (Blueprint $table) {

            $table->foreign('product_id')->references('id')->on('products');

            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('invoices', function (Blueprint $table) {

            $table->foreign('user_id')->references('id')->on('users');

            $table->foreign('invoice_status_id')->references('id')->on('invoice_statuses');
        });
        Schema::table('invoice_details', function (Blueprint $table) {

            $table->foreign('product_id')->references('id')->on('products');

            $table->foreign('invoice_id')->references('id')->on('invoices');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
        Schema::table('products', function (Blueprint $table) {
            //
        });
        Schema::table('images', function (Blueprint $table) {
            //
        });
        Schema::table('sizes', function (Blueprint $table) {
            //
        });
        Schema::table('colors', function (Blueprint $table) {
            //
        });
        Schema::table('comments', function (Blueprint $table) {
            //
        });
        Schema::table('invoices', function (Blueprint $table) {
            //
        });
        Schema::table('invoice_details', function (Blueprint $table) {
            //
        });
    }
}

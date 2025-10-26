<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');

            // Basic ownership/info
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('added_by')->nullable();

            // Core product identity
            $table->string('name');
            // $table->string('code')->nullable();
            $table->string('slug')->nullable();

            // Category/brand (nullable to avoid FK issues)
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('sub_category_id')->nullable();
            $table->unsignedBigInteger('sub_sub_category_id')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();

            // Pricing/stock core columns
            $table->string('unit')->nullable();
            $table->float('unit_price')->default(0);
            $table->float('purchase_price')->default(0);
            $table->integer('current_stock')->default(0);
            // $table->integer('minimum_order_qty')->nullable();

            // Tax/discount start numeric so later migration can change to string
            $table->float('tax')->default(0);
            $table->float('discount')->default(0);

            // Status flags
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('featured_status')->default(0);
            $table->tinyInteger('featured')->default(0);
            $table->tinyInteger('request_status')->default(0);
            $table->tinyInteger('free_shipping')->default(0);

            // Media basics
            $table->string('thumbnail')->nullable();

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
        Schema::dropIfExists('products');
    }
}

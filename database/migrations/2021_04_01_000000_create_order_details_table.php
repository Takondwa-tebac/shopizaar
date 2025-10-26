<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('order_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('seller_id')->nullable();

            $table->text('product_details')->nullable();
            $table->integer('qty')->default(1);
            $table->float('price')->default(0);
            $table->float('tax')->default(0);
            $table->float('discount')->default(0);
            $table->string('tax_model')->nullable();
            $table->string('delivery_status')->nullable();
            $table->string('payment_status')->nullable();

            $table->unsignedBigInteger('shipping_method_id')->nullable();
            $table->string('variant')->nullable();
            $table->string('variation')->nullable();

            // columns added by later migrations; include now to avoid dependency failures
            $table->boolean('is_stock_decreased')->default(1);
            $table->integer('refund_request')->default(0);
            $table->string('digital_file_after_sell')->nullable();

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
        Schema::dropIfExists('order_details');
    }
}

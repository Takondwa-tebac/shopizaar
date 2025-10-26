<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');

            // Relations
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('seller_id')->nullable();
            $table->unsignedBigInteger('shipping_method_id')->nullable();
            $table->unsignedBigInteger('delivery_man_id')->nullable();
            $table->unsignedBigInteger('billing_address')->nullable();

            // Flags and types
            $table->boolean('is_guest')->default(false);
            $table->string('customer_type')->nullable();
            $table->string('order_type')->nullable();

            // Payment and status
            $table->string('payment_status')->nullable();
            $table->string('order_status')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('transaction_ref')->nullable();
            $table->string('payment_by')->nullable();
            $table->string('payment_note')->nullable();

            // Amounts (start numeric; later migrations may adjust types)
            $table->decimal('order_amount', 24, 6)->default(0);
            $table->decimal('paid_amount', 24, 6)->default(0);
            $table->decimal('bring_change_amount', 24, 6)->default(0)->nullable();
            $table->string('bring_change_amount_currency')->nullable();
            // $table->decimal('admin_commission', 24, 6)->default(0);
            $table->decimal('discount_amount', 24, 6)->default(0);
            $table->string('discount_type')->nullable();
            $table->decimal('shipping_cost', 24, 6)->default(0);
            $table->boolean('is_shipping_free')->default(false);
            $table->decimal('deliveryman_charge', 24, 6)->default(0)->nullable();
            $table->decimal('extra_discount', 24, 6)->default(0)->nullable();
            $table->string('extra_discount_type')->nullable();

            // Shipping/billing and tracking
            $table->string('shipping_address')->nullable();
            $table->json('shipping_address_data')->nullable();
            $table->json('billing_address_data')->nullable();
            $table->string('order_group_id')->nullable();
            $table->string('verification_code')->nullable();
            $table->boolean('verification_status')->default(false);
            $table->string('seller_is')->nullable();
            $table->string('shipping_responsibility')->nullable();
            // $table->string('shipping_type')->nullable();
            // $table->string('delivery_type')->nullable();
            // $table->string('delivery_service_name')->nullable();
            // $table->string('third_party_delivery_tracking_id')->nullable();

            // Misc
            $table->boolean('is_pause')->default(false);
            $table->string('cause')->nullable();
            $table->timestamp('expected_delivery_date')->nullable();
            $table->string('order_note')->nullable();
            $table->string('coupon_code')->nullable();
            // $table->string('coupon_discount_bearer')->nullable();
            $table->boolean('checked')->default(false);

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
        Schema::dropIfExists('orders');
    }
}

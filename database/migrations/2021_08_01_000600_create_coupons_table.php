<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->bigIncrements('id');

            // $table->string('added_by')->nullable();
            $table->string('coupon_type')->nullable();
            // $table->string('coupon_bearer')->nullable();
            // $table->unsignedBigInteger('seller_id')->nullable();
            // $table->unsignedBigInteger('customer_id')->nullable();

            $table->string('title')->nullable();
            $table->string('code')->nullable();
            $table->timestamp('start_date')->nullable();
            $table->timestamp('expire_date')->nullable();

            $table->decimal('min_purchase', 24, 6)->default(0);
            $table->decimal('max_discount', 24, 6)->default(0)->nullable();
            $table->decimal('discount', 24, 6)->default(0);
            $table->string('discount_type')->nullable();

            // status used by scopeActive(); not in model doc but common in project
            $table->tinyInteger('status')->default(1);

            // intentionally NOT adding `limit` here; it will be added by 2021_09_19_061647_add_limit_to_coupons_table.php

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
        Schema::dropIfExists('coupons');
    }
}

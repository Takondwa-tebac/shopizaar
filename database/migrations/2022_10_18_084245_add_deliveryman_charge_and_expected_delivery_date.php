<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeliverymanChargeAndExpectedDeliveryDate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
{
    Schema::table('orders', function (Blueprint $table) {
        if (!Schema::hasColumn('orders', 'deliveryman_charge')) {
            $table->double('deliveryman_charge')->default(0)->after('delivery_man_id');
        }
        if (!Schema::hasColumn('orders', 'expected_delivery_date')) {
            $table->date('expected_delivery_date')->nullable()->after('deliveryman_charge');
        }
    });
}

public function down()
{
    Schema::table('orders', function (Blueprint $table) {
        if (Schema::hasColumn('orders', 'deliveryman_charge')) {
            $table->dropColumn('deliveryman_charge');
        }
        if (Schema::hasColumn('orders', 'expected_delivery_date')) {
            $table->dropColumn('expected_delivery_date');
        }
    });
}
}

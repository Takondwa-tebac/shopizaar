<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBillingToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            if (!Schema::hasColumn('orders', 'billing_address')) {
                $table->unsignedBigInteger('billing_address')->nullable();
            }
            if (!Schema::hasColumn('orders', 'billing_address_data')) {
                $table->string('billing_address_data')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            if (Schema::hasColumn('orders', 'billing_address')) {
                $table->dropColumn('billing_address');
            }
            if (Schema::hasColumn('orders', 'billing_address_data')) {
                $table->dropColumn('billing_address_data');
            }
        });
    }
}

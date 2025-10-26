<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsBillingToShippingAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('shipping_addresses')) {
            Schema::table('shipping_addresses', function (Blueprint $table) {
                if (!Schema::hasColumn('shipping_addresses', 'is_billing')) {
                    $table->boolean('is_billing')->nullable();
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('shipping_addresses')) {
            Schema::table('shipping_addresses', function (Blueprint $table) {
                if (Schema::hasColumn('shipping_addresses', 'is_billing')) {
                    $table->dropColumn('is_billing');
                }
            });
        }
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsGuestColumnToShippingAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('shipping_addresses', function (Blueprint $table) {
        if (!Schema::hasColumn('shipping_addresses', 'is_guest')) {
            $table->boolean('is_guest')->default(false)->after('customer_id');
        }
    });
}

public function down()
{
    Schema::table('shipping_addresses', function (Blueprint $table) {
        if (Schema::hasColumn('shipping_addresses', 'is_guest')) {
            $table->dropColumn('is_guest');
        }
    });
}
}

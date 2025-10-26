<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLatLongToShippingAddressesTable extends Migration
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
                if (!Schema::hasColumn('shipping_addresses', 'latitude')) {
                    $table->string('latitude')->nullable();
                }
                if (!Schema::hasColumn('shipping_addresses', 'longitude')) {
                    $table->string('longitude')->nullable();
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
                if (Schema::hasColumn('shipping_addresses', 'latitude')) {
                    $table->dropColumn('latitude');
                }
                if (Schema::hasColumn('shipping_addresses', 'longitude')) {
                    $table->dropColumn('longitude');
                }
            });
        }
    }
}

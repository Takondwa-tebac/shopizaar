<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsGuestColumnToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
public function up()
{
    Schema::table('orders', function (Blueprint $table) {
        if (!Schema::hasColumn('orders', 'is_guest')) {
            $table->boolean('is_guest')->default(false)->after('customer_id');
        }
    });
}

public function down()
{
    Schema::table('orders', function (Blueprint $table) {
        if (Schema::hasColumn('orders', 'is_guest')) {
            $table->dropColumn('is_guest');
        }
    });
}
}

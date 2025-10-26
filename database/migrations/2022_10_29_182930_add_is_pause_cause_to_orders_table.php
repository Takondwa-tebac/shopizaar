<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsPauseCauseToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
{
    Schema::table('orders', function (Blueprint $table) {
        if (!Schema::hasColumn('orders', 'is_pause')) {
            $table->string('is_pause', 20)->default('0')->after('order_amount');
        }
        if (!Schema::hasColumn('orders', 'cause')) {
            $table->string('cause', 255)->nullable()->after('is_pause');
        }
    });
}

public function down()
{
    Schema::table('orders', function (Blueprint $table) {
        if (Schema::hasColumn('orders', 'is_pause')) {
            $table->dropColumn('is_pause');
        }
        if (Schema::hasColumn('orders', 'cause')) {
            $table->dropColumn('cause');
        }
    });
}
}

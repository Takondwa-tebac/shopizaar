<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateStringLimit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Skip this migration if the table doesn't exist
        if (!Schema::hasTable('orders')) {
            return;
        }
        
        Schema::table('orders', function (Blueprint $table) {
            if (Schema::hasColumn('orders', 'order_status')) {
                $table->string('order_status',50)->change();
            }
            if (Schema::hasColumn('orders', 'payment_method')) {
                $table->string('payment_method',100)->change();
            }
            if (Schema::hasColumn('orders', 'order_amount')) {
                $table->float('order_amount')->change();
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
            //
        });
    }
}

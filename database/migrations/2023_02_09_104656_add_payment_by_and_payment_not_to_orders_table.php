<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPaymentByAndPaymentNotToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
  public function up()
{
    Schema::table('orders', function (Blueprint $table) {
        if (!Schema::hasColumn('orders', 'payment_by')) {
            $table->string('payment_by', 255)->nullable()->after('transaction_ref');
        }
        if (!Schema::hasColumn('orders', 'payment_note')) {
            $table->text('payment_note')->nullable()->after('payment_by');
        }
    });
}

public function down()
{
    Schema::table('orders', function (Blueprint $table) {
        if (Schema::hasColumn('orders', 'payment_by')) {
            $table->dropColumn('payment_by');
        }
        if (Schema::hasColumn('orders', 'payment_note')) {
            $table->dropColumn('payment_note');
        }
    });
}
}

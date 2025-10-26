<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOrderIdToReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
{
    Schema::table('reviews', function (Blueprint $table) {
        if (!Schema::hasColumn('reviews', 'order_id')) {
            $table->bigInteger('order_id')->nullable()->after('delivery_man_id');
        }
        if (!Schema::hasColumn('reviews', 'is_saved')) {
            $table->boolean('is_saved')->default(false);
        }
    });
}

public function down()
{
    Schema::table('reviews', function (Blueprint $table) {
        if (Schema::hasColumn('reviews', 'order_id')) {
            $table->dropColumn('order_id');
        }
        if (Schema::hasColumn('reviews', 'is_saved')) {
            $table->dropColumn('is_saved');
        }
    });
}
}

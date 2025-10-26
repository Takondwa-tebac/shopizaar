<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
 public function up()
{
    // First check if the table exists
    if (Schema::hasTable('products')) {
        Schema::table('products', function (Blueprint $table) {
            // Only modify if the column exists
            if (Schema::hasColumn('products', 'images')) {
                // Change the column type if it exists
                $table->longText('images')->nullable()->change();
            } else {
                // Or create it if it doesn't exist
                $table->longText('images')->nullable();
            }
        });
    }
}

public function down()
{
    // In the down method, we'll revert to the original type if needed
    if (Schema::hasTable('products') && Schema::hasColumn('products', 'images')) {
        Schema::table('products', function (Blueprint $table) {
            $table->string('images')->nullable()->change();
        });
    }
}
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::table('products', function (Blueprint $table) {
        if (!Schema::hasColumn('products', 'digital_product_file_types')) {
            $table->longText('digital_product_file_types')->nullable();
        }
        
        if (!Schema::hasColumn('products', 'digital_product_extensions')) {
            $table->longText('digital_product_extensions')->nullable();
        }

        // Reorder columns if needed
        if (Schema::hasColumn('products', 'variation')) {
            Schema::table('products', function (Blueprint $table) {
                $table->longText('digital_product_file_types')
                    ->nullable()
                    ->after('variation')
                    ->change();
                $table->longText('digital_product_extensions')
                    ->nullable()
                    ->after('digital_product_file_types')
                    ->change();
            });
        }
    });
}

public function down()
{
    Schema::table('products', function (Blueprint $table) {
        $columns = [
            'digital_product_file_types',
            'digital_product_extensions'
        ];

        foreach ($columns as $column) {
            if (Schema::hasColumn('products', $column)) {
                $table->dropColumn($column);
            }
        }
    });
}
};

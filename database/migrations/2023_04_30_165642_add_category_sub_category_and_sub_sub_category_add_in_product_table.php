<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategorySubCategoryAndSubSubCategoryAddInProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
  public function up()
{
    Schema::table('products', function (Blueprint $table) {
        // Add the category_ids column first if it doesn't exist
        if (!Schema::hasColumn('products', 'category_ids')) {
            $table->string('category_ids')->nullable();
        }

        // Add other columns after category_ids
        $columns = [
            'category_id' => 'varchar',
            'sub_category_id' => 'varchar',
            'sub_sub_category_id' => 'varchar'
        ];

        foreach ($columns as $column => $type) {
            if (!Schema::hasColumn('products', $column)) {
                $table->{$type}($column, 255)->nullable();
            }
        }

        // Reorder columns if needed
        if (Schema::hasColumn('products', 'category_ids')) {
            Schema::table('products', function (Blueprint $table) {
                $table->string('category_id')->nullable()->after('category_ids')->change();
                $table->string('sub_category_id')->nullable()->after('category_id')->change();
                $table->string('sub_sub_category_id')->nullable()->after('sub_category_id')->change();
            });
        }
    });
}

public function down()
{
    Schema::table('products', function (Blueprint $table) {
        $columns = [
            'sub_sub_category_id',
            'sub_category_id',
            'category_id',
            'category_ids'
        ];

        foreach ($columns as $column) {
            if (Schema::hasColumn('products', $column)) {
                $table->dropColumn($column);
            }
        }
    });
}
}

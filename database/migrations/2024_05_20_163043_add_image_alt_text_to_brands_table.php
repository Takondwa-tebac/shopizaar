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
    if (!Schema::hasTable('brands')) {
        throw new \Exception('The brands table does not exist. Please run the brands migration first.');
    }

    if (!Schema::hasColumn('brands', 'image_alt_text')) {
        Schema::table('brands', function (Blueprint $table) {
            $table->string('image_alt_text')->nullable()->after('image');
        });
    }
}

public function down()
{
    if (Schema::hasColumn('brands', 'image_alt_text')) {
        Schema::table('brands', function (Blueprint $table) {
            $table->dropColumn('image_alt_text');
        });
    }
}
};

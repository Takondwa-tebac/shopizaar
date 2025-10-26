<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddThemeToBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
{
    Schema::table('banners', function (Blueprint $table) {
        if (!Schema::hasColumn('banners', 'theme')) {
            $table->string('theme')->default('default');
        }
    });
}

public function down()
{
    Schema::table('banners', function (Blueprint $table) {
        if (Schema::hasColumn('banners', 'theme')) {
            $table->dropColumn('theme');
        }
    });
}
}

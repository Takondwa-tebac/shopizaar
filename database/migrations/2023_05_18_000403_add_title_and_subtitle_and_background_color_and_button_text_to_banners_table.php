<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTitleAndSubtitleAndBackgroundColorAndButtonTextToBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('banners', function (Blueprint $table) {
            if (!Schema::hasColumn('banners', 'title')) {
                $table->string('title')->after('resource_id')->nullable();
            }
            if (!Schema::hasColumn('banners', 'sub_title')) {
                $table->string('sub_title')->after('title')->nullable();
            }
            if (!Schema::hasColumn('banners', 'button_text')) {
                $table->string('button_text')->after('sub_title')->nullable();
            }
            if (!Schema::hasColumn('banners', 'background_color')) {
                $table->string('background_color')->after('button_text')->nullable();
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
        Schema::table('banners', function (Blueprint $table) {
            $columns = ['title', 'sub_title', 'button_text', 'background_color'];
            foreach ($columns as $column) {
                if (Schema::hasColumn('banners', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
}

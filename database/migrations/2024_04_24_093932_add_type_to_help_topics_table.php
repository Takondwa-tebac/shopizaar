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
    if (!Schema::hasTable('help_topics')) {
        throw new \Exception('The help_topics table does not exist. Please run the help_topics migration first.');
    }

    if (!Schema::hasColumn('help_topics', 'type')) {
        Schema::table('help_topics', function (Blueprint $table) {
            $table->string('type')->default('default')->after('id');
        });
    }
}

public function down()
{
    if (Schema::hasColumn('help_topics', 'type')) {
        Schema::table('help_topics', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
}
};

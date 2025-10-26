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
    Schema::create('help_topics', function (Blueprint $table) {
        $table->id();
        $table->string('type')->default('default');
        $table->string('question');
        $table->text('answer');
        $table->integer('ranking')->default(0);
        $table->boolean('status')->default(true);
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('help_topics');
}
};

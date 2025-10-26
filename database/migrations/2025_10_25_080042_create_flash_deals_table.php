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
    Schema::create('flash_deals', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->dateTime('start_date');
        $table->dateTime('end_date');
        $table->decimal('discount', 8, 2);
        $table->enum('discount_type', ['percentage', 'fixed']);
        $table->boolean('status')->default(true);
        $table->string('image')->nullable();
        $table->text('description')->nullable();
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('flash_deals');
}
};

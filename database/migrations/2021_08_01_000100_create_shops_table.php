<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('seller_id')->nullable();

            $table->string('name');
            $table->string('slug')->nullable();
            $table->string('address')->nullable();
            $table->string('contact')->nullable();

            $table->string('image')->nullable();
            $table->string('image_storage_type')->nullable();

            $table->string('bottom_banner')->nullable();
            $table->string('bottom_banner_storage_type')->nullable();

            $table->string('offer_banner')->nullable();
            $table->string('offer_banner_storage_type')->nullable();

            // Vacation fields
            $table->date('vacation_start_date')->nullable();
            $table->date('vacation_end_date')->nullable();
            $table->text('vacation_note')->nullable();
            $table->boolean('vacation_status')->default(false);

            $table->boolean('temporary_close')->default(false);

            // Banner fields many alters expect to add later
            $table->string('banner')->nullable();
            $table->string('banner_storage_type')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
}

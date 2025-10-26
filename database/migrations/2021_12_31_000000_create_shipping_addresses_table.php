<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('shipping_addresses')) {
            Schema::create('shipping_addresses', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('customer_id')->nullable();
                $table->string('contact_person_name');
                $table->string('email')->nullable();
                $table->string('phone');
                $table->text('address');
                $table->string('city');
                $table->string('state')->nullable();
                $table->string('zip_code')->nullable();
                $table->string('country');
                $table->string('latitude')->nullable();
                $table->string('longitude')->nullable();
                $table->boolean('is_billing')->default(false);
                $table->tinyInteger('is_guest')->default(0);
                $table->timestamps();

                // Foreign key
                $table->foreign('customer_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shipping_addresses');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupportTicketConvs extends Migration
{
    public function up()
{
    Schema::create('support_ticket_convs', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('support_ticket_id');
        $table->text('customer_message');
        $table->json('attachment')->nullable();
        $table->timestamps();
        
        $table->foreign('support_ticket_id')
              ->references('id')
              ->on('support_tickets')
              ->onDelete('cascade');
    });
}

public function down()
{
    Schema::dropIfExists('support_ticket_convs');
}

}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSeenNotificationAndNotificationReceiverToChattingsTable extends Migration
{
public function up()
{
    Schema::table('chattings', function (Blueprint $table) {
        // Add status column if it doesn't exist
        if (!Schema::hasColumn('chattings', 'status')) {
            $table->string('status')->nullable();
        }

        // Add seen_notification column
        if (!Schema::hasColumn('chattings', 'seen_notification')) {
            $table->boolean('seen_notification')->default(false);
        }

        // Add notification_receiver column
        if (!Schema::hasColumn('chattings', 'notification_receiver')) {
            $table->string('notification_receiver', 20)
                ->nullable()
                ->comment('admin, seller, customer, deliveryman');
        }

        // Reorder columns if needed
        if (method_exists($table, 'after')) {
            Schema::table('chattings', function (Blueprint $table) {
                $table->string('status')->nullable()->after('seller_id')->change();
                $table->boolean('seen_notification')->default(false)->after('status')->change();
                $table->string('notification_receiver', 20)
                    ->nullable()
                    ->after('status')
                    ->comment('admin, seller, customer, deliveryman')
                    ->change();
            });
        }
    });
}

public function down()
{
    Schema::table('chattings', function (Blueprint $table) {
        $columns = ['seen_notification', 'notification_receiver'];
        
        foreach ($columns as $column) {
            if (Schema::hasColumn('chattings', $column)) {
                $table->dropColumn($column);
            }
        }
        
        // Only drop status if it was added by this migration
        if (Schema::hasColumn('chattings', 'status') && 
            !Schema::hasColumn('chattings', 'status_before_migration')) {
            $table->dropColumn('status');
        }
    });
}
}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVacationStartAndVacationEndAndVacationNotColumnToShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
 public function up()
{
    Schema::table('shops', function (Blueprint $table) {
        $columns = [
            'vacation_start_date' => 'date',
            'vacation_end_date' => 'date',
            'vacation_note' => 'string',
            'vacation_status' => 'tinyInteger',
            'temporary_close' => 'tinyInteger'
        ];

        foreach ($columns as $column => $type) {
            if (!Schema::hasColumn('shops', $column)) {
                $columnDefinition = $table->{$type}($column)->nullable();
                
                if ($column === 'vacation_status' || $column === 'temporary_close') {
                    $columnDefinition->default(0);
                }
                
                if ($column === 'vacation_start_date') {
                    $columnDefinition->after('image');
                }
            }
        }
    });
}

public function down()
{
    Schema::table('shops', function (Blueprint $table) {
        $columns = [
            'vacation_start_date',
            'vacation_end_date',
            'vacation_note',
            'vacation_status',
            'temporary_close'
        ];

        foreach ($columns as $column) {
            if (Schema::hasColumn('shops', $column)) {
                $table->dropColumn($column);
            }
        }
    });
}
}

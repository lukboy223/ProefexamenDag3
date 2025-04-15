<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('
        drop procedure if exists update_result;
        create procedure update_result(
           in givAmountPoints smallint unsigned
            ,in givResultsId int unsigned
        )
        begin

        update Results
        set
        AmountPoints = givAmountPoints

        where Id = givResultsId;

        end
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
// cool 
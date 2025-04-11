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
        drop procedure if exists read_result;
        create procedure read_result
        (
        in givResId int unsigned
        )
        begin

        select
        RES.Id
        ,PEO.FullName
        ,RES.AmountPoints

        from Results as RES

        inner join games as GEM
        on RES.GameId = GEM.Id

        inner join People as PEO
        on GEM.PersonId = PEO.Id

        where RES.Id = givResId;

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

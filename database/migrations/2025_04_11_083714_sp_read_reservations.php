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
        drop procedure if exists read_reservations;
        create procedure read_reservations(
         in givLIMIT int
        ,in givOFFSET int
        )
        begin

        select 
         RES.Id
        ,PEO.FullName
        ,RES.Date
        ,RES.AmountHours
        ,RES.Starttime
        ,RES.EndTime
        ,RES.AmountAdults
        ,RES.AmountKids


        from reservations as RES

        inner join People as PEO
        on RES.PersonId = PEO.Id

        left join Games as GAM
        on GAM.ReservationId = RES.Id

        left join Results as RESU
        on RESU.GameId = GAM.Id
        
        group by RES.Id
        order by sum(RESU.AmountPoints) desc
         limit givLIMIT offset givOFFSET;

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
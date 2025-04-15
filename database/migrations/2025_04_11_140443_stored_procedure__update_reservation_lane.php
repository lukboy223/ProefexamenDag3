<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('
       drop procedure if exists SP_UpdateReservationLane;
CREATE PROCEDURE SP_UpdateReservationLane(
                IN p_Id INT,
                IN p_LaneNumber INT
            )
            BEGIN
                UPDATE Reservations
                SET LaneId = p_LaneNumber
                WHERE Id = p_Id;
            END;

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

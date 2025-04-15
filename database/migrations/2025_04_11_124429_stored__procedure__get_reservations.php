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
    DROP PROCEDURE IF EXISTS SP_GetReservations;

CREATE PROCEDURE SP_GetReservations(
    IN p_Offset INT,
    IN p_Limit INT
)
BEGIN
    SELECT 
        Reservations.Id,
        Reservations.PersonId as PeopleId,
        Reservations.LaneId,   
        Reservations.OpeningTimeId,
        Reservations.ReservationStatus,
        Reservations.Date,
        Reservations.AmountHours,
        Reservations.StartTime,
        Reservations.EndTime,
        Reservations.AmountAdults,
        Reservations.AmountKids,
        Reservations.Note AS ReservationNote,
        People.FirstName,
        People.Infix,
        People.LastName,
        People.CallName,
        CONCAT_WS(" ", People.FirstName, People.Infix, People.LastName) AS FullName,
        People.Note AS PeopleNote,
        Lanes.Number AS LaneNumber,
        Lanes.Hasfence,
        Lanes.Note AS LaneNote,
        Lanes.Id as LaneId
    FROM 
        Reservations
    INNER JOIN 
        People ON Reservations.PersonId = People.Id
    INNER JOIN 
        Lanes ON Reservations.LaneId = Lanes.Id
        
        ORDER BY Reservations.Date DESC
    LIMIT p_Offset, p_Limit;
END;
    ');
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('SP_GetReservations');
    }
};

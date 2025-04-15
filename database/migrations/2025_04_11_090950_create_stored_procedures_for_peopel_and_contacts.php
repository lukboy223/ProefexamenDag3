<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Verwijder de stored procedures als ze al bestaan
        DB::unprepared('DROP PROCEDURE IF EXISTS GetPeopleWithContactInfo');
        // Stored Procedure 1: GetpeopleWithContactInfo
        DB::unprepared('
        CREATE PROCEDURE GetPeopleWithContactInfo(IN peopleId INT)
        BEGIN
            SELECT 
                p.Id AS PeopleId,
                p.FirstName,
                p.Infix,
                p.LastName,
                p.CallName as PreferredName,
                CASE 
                    WHEN p.IsAdult = 1 THEN "Ja"
                    WHEN p.IsAdult = 0 THEN "Nee"
                    ELSE "Onbekend"
                END AS Adult,
                tp.Name AS TypePeople,
                c.Phone,
                c.Email,
                c.Opmerking AS ContactOpmerking,
                p.Note AS peopleOpmerking,
                p.created_at as DatumAangemaakt,
                p.updated_at as DatumGewijzigd
            FROM 
                People p
            LEFT JOIN 
                TypePeople tp ON p.TypePeopleId = tp.Id
            LEFT JOIN 
                Contacts c ON p.Id = c.PeopleId
            WHERE 
                p.Id = peopleId;
        END
    ');
    

        // Verwijder de stored procedures als ze al bestaan
        DB::unprepared('DROP PROCEDURE IF EXISTS GetAllPeopleWithContactInfo');
        // Stored Procedure 2: GetAllpeopleWithContactInfo
        DB::unprepared('
        CREATE PROCEDURE GetAllPeopleWithContactInfo()
        BEGIN
            SELECT 
                p.Id AS PeopleId,
                p.FirstName,
                p.Infix,
                p.LastName,
                p.CallName as PreferredName,
                CASE 
                    WHEN p.IsAdult = 1 THEN "Ja"
                    WHEN p.IsAdult = 0 THEN "Nee"
                    ELSE "Onbekend"
                END AS Adult,
                tp.Name AS TypePeople,
                c.Phone,
                c.Email,
                c.Opmerking AS ContactOpmerking,
                p.Note AS peopleOpmerking,
                p.created_at as DatumAangemaakt,
                p.updated_at as DatumGewijzigd
            FROM 
                People p
            LEFT JOIN 
                TypePeople tp ON p.TypePeopleId = tp.Id
            LEFT JOIN 
                Contacts c ON p.Id = c.PeopleId
            ORDER BY 
                p.LastName ASC;
        END
    ');
    

        // Verwijder de stored procedures als ze al bestaan
        DB::unprepared('DROP PROCEDURE IF EXISTS GetPeopleByTypeWithContactInfo');
        // Stored Procedure 3: GetpeopleByTypeWithContactInfo
        DB::unprepared('
        CREATE PROCEDURE GetPeopleByTypeWithContactInfo(IN typePeopleName VARCHAR(50))
        BEGIN
            SELECT 
                p.Id AS PeopleId,
                p.FirstName,
                p.Infix,
                p.LastName,
                p.CallName as PreferredName,
                CASE 
                    WHEN p.IsAdult = 1 THEN "Ja"
                    WHEN p.IsAdult = 0 THEN "Nee"
                    ELSE "Onbekend"
                END AS Adult,
                tp.Name AS Typepeople,
                c.Phone,
                c.Email,
                c.Opmerking AS ContactOpmerking,
                p.Note AS peopleOpmerking,
                p.created_at as DatumAangemaakt,
                p.updated_at as DatumGewijzigd
            FROM 
                People p
            LEFT JOIN 
                TypePeople tp ON p.TypePeopleId = tp.Id
            LEFT JOIN 
                Contacts c ON p.Id = c.peopleId
            WHERE 
                tp.Id = typePeopleName;
        END

    ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Verwijder de stored procedures als de migratie wordt teruggedraaid
        DB::unprepared('DROP PROCEDURE IF EXISTS GetPeopleWithContactInfo');
        DB::unprepared('DROP PROCEDURE IF EXISTS GetAllPeopleWithContactInfo');
        DB::unprepared('DROP PROCEDURE IF EXISTS GetPeopleByTypeWithContactInfo');
    }
};
// cool 
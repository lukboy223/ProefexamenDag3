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
        DB::unprepared('DROP PROCEDURE IF EXISTS GetPeopelWithContactInfo');
        // Stored Procedure 1: GetPeopelWithContactInfo
        DB::unprepared('
        CREATE PROCEDURE GetPeopelWithContactInfo(IN peopelId INT)
        BEGIN
            SELECT 
                p.Id AS PeopelId,
                p.FirstName,
                p.Infix,
                p.LastName,
                p.PreferredName,
                CASE 
                    WHEN p.Adult = 1 THEN "Ja"
                    WHEN p.Adult = 0 THEN "Nee"
                    ELSE "Onbekend"
                END AS Adult,
                tp.Name AS TypePeopel,
                c.Phone,
                c.Email,
                c.Opmerking AS ContactOpmerking,
                p.Opmerking AS PeopelOpmerking,
                p.DatumAangemaakt,
                p.DatumGewijzigd
            FROM 
                Peopel p
            LEFT JOIN 
                TypePeople tp ON p.TypePeopelId = tp.Id
            LEFT JOIN 
                Contacts c ON p.Id = c.PeopelId
            WHERE 
                p.Id = peopelId;
        END
    ');
    

        // Verwijder de stored procedures als ze al bestaan
        DB::unprepared('DROP PROCEDURE IF EXISTS GetAllPeopelWithContactInfo');
        // Stored Procedure 2: GetAllPeopelWithContactInfo
        DB::unprepared('
        CREATE PROCEDURE GetAllPeopelWithContactInfo()
        BEGIN
            SELECT 
                p.Id AS PeopelId,
                p.FirstName,
                p.Infix,
                p.LastName,
                p.PreferredName,
                CASE 
                    WHEN p.Adult = 1 THEN "Ja"
                    WHEN p.Adult = 0 THEN "Nee"
                    ELSE "Onbekend"
                END AS Adult,
                tp.Name AS TypePeopel,
                c.Phone,
                c.Email,
                c.Opmerking AS ContactOpmerking,
                p.Opmerking AS PeopelOpmerking,
                p.DatumAangemaakt,
                p.DatumGewijzigd
            FROM 
                Peopel p
            LEFT JOIN 
                TypePeople tp ON p.TypePeopelId = tp.Id
            LEFT JOIN 
                Contacts c ON p.Id = c.PeopelId
            ORDER BY 
                p.LastName ASC;
        END
    ');
    

        // Verwijder de stored procedures als ze al bestaan
        DB::unprepared('DROP PROCEDURE IF EXISTS GetPeopelByTypeWithContactInfo');
        // Stored Procedure 3: GetPeopelByTypeWithContactInfo
        DB::unprepared('
        CREATE PROCEDURE GetPeopelByTypeWithContactInfo(IN typePeopelName VARCHAR(50))
        BEGIN
            SELECT 
                p.Id AS PeopelId,
                p.FirstName,
                p.Infix,
                p.LastName,
                p.PreferredName,
                CASE 
                    WHEN p.Adult = 1 THEN "Ja"
                    WHEN p.Adult = 0 THEN "Nee"
                    ELSE "Onbekend"
                END AS Adult,
                tp.Name AS TypePeopel,
                c.Phone,
                c.Email,
                c.Opmerking AS ContactOpmerking,
                p.Opmerking AS PeopelOpmerking,
                p.DatumAangemaakt,
                p.DatumGewijzigd
            FROM 
                Peopel p
            LEFT JOIN 
                TypePeople tp ON p.TypePeopelId = tp.Id
            LEFT JOIN 
                Contacts c ON p.Id = c.PeopelId
            WHERE 
                tp.Name = typePeopelName;
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
        DB::unprepared('DROP PROCEDURE IF EXISTS GetPeopelWithContactInfo');
        DB::unprepared('DROP PROCEDURE IF EXISTS GetAllPeopelWithContactInfo');
        DB::unprepared('DROP PROCEDURE IF EXISTS GetPeopelByTypeWithContactInfo');
    }
};

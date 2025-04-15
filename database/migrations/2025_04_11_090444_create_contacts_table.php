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
        DROP TABLE IF EXISTS Contacts;
        CREATE TABLE Contacts (
            Id INT UNSIGNED NOT NULL AUTO_INCREMENT,
            PeopleId INT UNSIGNED NOT NULL,
            Phone VARCHAR(10) NOT NULL,
            Email VARCHAR(50) NOT NULL,
            IsActive BIT NOT NULL DEFAULT 1,
            Opmerking VARCHAR(250) DEFAULT NULL,
            DatumAangemaakt DATETIME(6) NOT NULL DEFAULT NOW(6),
            DatumGewijzigd DATETIME(6) NOT NULL DEFAULT NOW(6) ON UPDATE NOW(6),
            PRIMARY KEY (Id),
            FOREIGN KEY (PeopleId) REFERENCES People(Id)
        ) ENGINE=INNODB;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TABLE IF EXISTS Contacts');
    }
};

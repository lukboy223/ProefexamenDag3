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
       Drop table if exists Reservations;
       CREATE TABLE Reservations (
    Id INT UNSIGNED AUTO_INCREMENT
    ,PeopleId INT UNSIGNED NOT NULL
    ,Openingstijd INT NOT NULL
    ,LaneId INT UNSIGNED NOT NULL
    ,PakketOptieId INT
    ,ReserveringStatus VARCHAR(20) NOT NULL
    ,Reserveringsnummer VARCHAR(20) NOT NULL
    ,Datum DATE NOT NULL
    ,AantalUren INT NOT NULL
    ,BeginTijd TIME NOT NULL
    ,EindTijd TIME NOT NULL
    ,AantalVolwassen INT NOT NULL
    ,AantalKinderen INT
    ,Isactive bit not null default 1
    ,Note varchar(250) null default null
    ,DateCreated datetime(6) not null default now(6)
    ,DateChanged datetime(6) not null default now(6)
    ,PRIMARY KEY (Id)
    ,FOREIGN KEY (PeopleId) REFERENCES People(Id)
    ,FOREIGN KEY (LaneId) REFERENCES Lane(Id)
) ENGINE=InnoDB;
       ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Reservations');
    }
};

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
       Drop table if exists People;
        CREATE TABLE People (
    Id INT UNSIGNED AUTO_INCREMENT
    ,TypePeopleId INT UNSIGNED NOT NULL
    ,FirstName VARCHAR(50) NOT NULL
    ,Tussenvoegsel VARCHAR(50)
    ,LastName VARCHAR(50) NOT NULL
    ,Nickname VARCHAR(50) NULL
    ,IsAdult BOOLEAN NOT NULL
    ,Isactive bit not null default 1
    ,Note varchar(250) null default null
    ,DateCreated datetime(6) not null default now(6)
    ,DateChanged datetime(6) not null default now(6)
    ,PRIMARY KEY (Id)
    ,FOREIGN KEY (TypePeopleId) REFERENCES TypePeople(Id)
) ENGINE=InnoDB;');

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('People');
    }
};

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
        //cool migrations
        DB::unprepared('
        drop table if exists Reservations;
        create table Reservations(
         Id int unsigned not null auto_increment
        ,PersonId int unsigned not null 
        ,OpeningTimeId int unsigned not null 
        ,LaneId int unsigned not null  
        ,PackageId int  unsigned null default null
        ,ReservationStatus varchar(50) not null
        ,ReservationNumber varchar(20) not null
        ,Date date not null
        ,AmountHours tinyint unsigned not null 
        ,Starttime time not null
        ,EndTime time not null
        ,AmountAdults tinyint unsigned not null 
        ,AmountKids tinyint unsigned null default null
        ,IsActive bit not null default 1
        ,Note varchar(250) null default null
        ,Created_at datetime(6) not null default now(6)
        ,Updated_at datetime(6) not null default now(6)
        ,primary key (Id)
        ,foreign key (PersonId) references People(Id)
        )engine=innoDB;
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

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
        drop table if exists Reservations;
        create table Reservations(
         Id int unsigned not null auto_increment
        ,PersonId int unsigned not null 
        ,OpeningTimeId int unsigned not null 
        ,LaneId int unsigned not null  
        ,PackageId int  unsigned not null 
        ,ReservationStatus varchar(50) not null
        ,Date date not null
        ,AmountHours tinyint unsigned not null 
        ,Starttime time not null
        ,EndTime time not null
        ,AmountAdults tinyint unsigned not null 
        ,AmountKids tinyint unsigned not null 
        ,IsActive bit not null default 1
        ,Note varchar(250) null default null
        ,Create_at datetime(6) not null default now(6)
        ,Update_at datetime(6) not null default now(6)
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

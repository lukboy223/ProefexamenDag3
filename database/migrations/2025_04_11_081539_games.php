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
        drop table if exists Games;
        create table Games(
         Id int unsigned not null auto_increment
        ,PersonId int unsigned not null
        ,ReservationId int unsigned not null
        ,IsActive bit not null default 1
        ,Note varchar(250) null default null
        ,Created_at datetime(6) not null default now(6)
        ,Updated_at datetime(6) not null default now(6)
        ,primary key (Id)
        ,foreign key (PersonId) references People(Id)
        ,foreign key (ReservationId) references reservations(Id)
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
// cool 
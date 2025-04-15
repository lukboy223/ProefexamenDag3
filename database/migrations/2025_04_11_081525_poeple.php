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
        drop table if exists People;
        create table People(
         Id int unsigned not null auto_increment
        ,TypePeopleId INT UNSIGNED NOT NULL
        ,FirstName varchar(50) not null
        ,Infix varchar(10) null default null
        ,LastName varchar(50) not null
        ,FullName varchar(110) as (concat_ws(" ", FirstName, Infix, LastName)) stored
        ,CallName varchar(50) not null
        ,IsAdult bit not null
        ,IsActive bit not null default 1
        ,Note varchar(250) null default null
        ,Created_at datetime(6) not null default now(6)
        ,Updated_at datetime(6) not null default now(6)
        ,primary key (Id)
        ,foreign key (TypePeopleId) references TypePeople(Id)
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
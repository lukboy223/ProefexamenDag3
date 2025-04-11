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
        drop table if exists Results;
        create table Results(
         Id int unsigned not null auto_increment
        ,GameId int unsigned not null
        ,AmountPoints smallint unsigned null default null
        ,IsActive bit not null default 1
        ,Note varchar(250) null default null
        ,Created_at datetime(6) not null default now(6)
        ,Updated_at datetime(6) not null default now(6)
        ,primary key (Id)
        ,foreign key (GameId) references Games(Id)
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

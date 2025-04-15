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
        // DB::unprepared('
        // Drop table if exists TypePeople;
        // Create table TypePeople(
        //  Id INT UNSIGNED not null auto_increment
        // ,Name varchar(50) not null 
        // ,Isactive bit not null default 1
        // ,Note varchar(250) null default null
        // ,created_at DATETIME(6) NOT NULL DEFAULT NOW(6)
        // ,updated_at DATETIME(6) NOT NULL DEFAULT NOW(6) ON UPDATE NOW(6)
        // ,Primary Key (Id)
        // )engine=innoDB;');
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TypePeople');
    }
};

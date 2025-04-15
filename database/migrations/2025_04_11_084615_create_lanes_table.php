<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('
         Drop table if exists Lanes;
        CREATE TABLE Lanes (
    Id INT UNSIGNED AUTO_INCREMENT
    ,Number INT NOT NULL 
    ,Hasfence BOOLEAN NOT NULL
    ,Isactive bit not null default 1
    ,Note varchar(250) null default null
    ,created_at DATETIME(6) NOT NULL DEFAULT NOW(6)
    ,updated_at DATETIME(6) NOT NULL DEFAULT NOW(6) ON UPDATE NOW(6)
    ,Primary Key (Id)
) ENGINE=InnoDB;
    ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Lanes');
    }
};

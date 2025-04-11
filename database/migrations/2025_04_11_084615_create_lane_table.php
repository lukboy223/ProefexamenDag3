<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        db::unprepared('
         Drop table if exists Lanes;
        CREATE TABLE Lane (
    Id INT UNSIGNED AUTO_INCREMENT
    ,Number INT NOT NULL
    ,Hasfence BOOLEAN NOT NULL
    ,Isactive bit not null default 1
    ,Note varchar(250) null default null
    ,DateCreated datetime(6) not null default now(6)
    ,DateChanged datetime(6) not null default now(6)
    ,Primary Key (Id)
) ENGINE=InnoDB;
    ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Lane');
    }
};

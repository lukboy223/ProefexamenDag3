<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypePersonSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('TypePeople')->insert([
            ['Id' => 1, 'Name' => 'Klant'],
            ['Id' => 2, 'Name' => 'Medewerker'],
            ['Id' => 3, 'Name' => 'Gast'],
        ]);
    }
}

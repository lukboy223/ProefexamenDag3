<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypePersonSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('TypePeople')->insert([
            ['Id' => 1, 'Naam' => 'Klant'],
            ['Id' => 2, 'Naam' => 'Medewerker'],
            ['Id' => 3, 'Naam' => 'Gast'],
        ]);
    }
}

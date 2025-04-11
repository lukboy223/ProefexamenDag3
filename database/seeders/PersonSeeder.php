<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersoonSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('Person')->insert([
            ['Id' => 1, 'TypePersoon' => 1, 'Voornaam' => 'Mazin', 'Tussenvoegsel' => null, 'Achternaam' => 'Jamil', 'Roepnaam' => 'Mazin', 'IsVolwassen' => 1],
            ['Id' => 2, 'TypePersoon' => 1, 'Voornaam' => 'Arjan', 'Tussenvoegsel' => 'de', 'Achternaam' => 'Ruijter', 'Roepnaam' => 'Arjan', 'IsVolwassen' => 1],
            ['Id' => 3, 'TypePersoon' => 1, 'Voornaam' => 'Hans', 'Tussenvoegsel' => null, 'Achternaam' => 'Odijk', 'Roepnaam' => 'Hans', 'IsVolwassen' => 1],
            ['Id' => 4, 'TypePersoon' => 1, 'Voornaam' => 'Dennis', 'Tussenvoegsel' => 'van', 'Achternaam' => 'Wakeren', 'Roepnaam' => 'Dennis', 'IsVolwassen' => 1],
            ['Id' => 5, 'TypePersoon' => 2, 'Voornaam' => 'Wilco', 'Tussenvoegsel' => 'Van de', 'Achternaam' => 'Grift', 'Roepnaam' => 'Wilco', 'IsVolwassen' => 1],
            ['Id' => 6, 'TypePersoon' => 3, 'Voornaam' => 'Tom', 'Tussenvoegsel' => null, 'Achternaam' => 'Sanders', 'Roepnaam' => 'Tom', 'IsVolwassen' => 0],
            ['Id' => 7, 'TypePersoon' => 3, 'Voornaam' => 'Andrew', 'Tussenvoegsel' => null, 'Achternaam' => 'Sanders', 'Roepnaam' => 'Andrew', 'IsVolwassen' => 0],
            ['Id' => 8, 'TypePersoon' => 3, 'Voornaam' => 'Julian', 'Tussenvoegsel' => null, 'Achternaam' => 'Kaldenheuvel', 'Roepnaam' => 'Julian', 'IsVolwassen' => 1],
        ]);
    }
}


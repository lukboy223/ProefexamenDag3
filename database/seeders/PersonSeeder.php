<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('Peopel')->insert([
            ['Id' => 1, 'TypePerson' => 1, 'Voornaam' => 'Mazin', 'Tussenvoegsel' => null, 'Achternaam' => 'Jamil', 'Roepnaam' => 'Mazin', 'IsVolwassen' => true],
            ['Id' => 2, 'TypePerson' => 1, 'Voornaam' => 'Arjan', 'Tussenvoegsel' => 'de', 'Achternaam' => 'Ruijter', 'Roepnaam' => 'Arjan', 'IsVolwassen' => true],
            ['Id' => 3, 'TypePerson' => 1, 'Voornaam' => 'Hans', 'Tussenvoegsel' => null, 'Achternaam' => 'Odijk', 'Roepnaam' => 'Hans', 'IsVolwassen' => true],
            ['Id' => 4, 'TypePerson' => 1, 'Voornaam' => 'Dennis', 'Tussenvoegsel' => 'van', 'Achternaam' => 'Wakeren', 'Roepnaam' => 'Dennis', 'IsVolwassen' => true],
            ['Id' => 5, 'TypePerson' => 2, 'Voornaam' => 'Wilco', 'Tussenvoegsel' => 'Van de', 'Achternaam' => 'Grift', 'Roepnaam' => 'Wilco', 'IsVolwassen' => true],
            ['Id' => 6, 'TypePerson' => 3, 'Voornaam' => 'Tom', 'Tussenvoegsel' => null, 'Achternaam' => 'Sanders', 'Roepnaam' => 'Tom', 'IsVolwassen' => false],
            ['Id' => 7, 'TypePerson' => 3, 'Voornaam' => 'Andrew', 'Tussenvoegsel' => null, 'Achternaam' => 'Sanders', 'Roepnaam' => 'Andrew', 'IsVolwassen' => false],
            ['Id' => 8, 'TypePerson' => 3, 'Voornaam' => 'Julian', 'Tussenvoegsel' => null, 'Achternaam' => 'Kaldenheuvel', 'Roepnaam' => 'Julian', 'IsVolwassen' => true],
        ]);
    }
}

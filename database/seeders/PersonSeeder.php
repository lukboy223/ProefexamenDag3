<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('Peopel')->insert([
            ['Id' => 1, 'TypePeopelId' => 1, 'FirstName' => 'Mazin', 'Infix' => null, 'LastName' => 'Jamil', 'PreferredName' => 'Mazin', 'Adult' => true],
            ['Id' => 2, 'TypePeopelId' => 1, 'FirstName' => 'Arjan', 'Infix' => 'de', 'LastName' => 'Ruijter', 'PreferredName' => 'Arjan', 'Adult' => true],
            ['Id' => 3, 'TypePeopelId' => 1, 'FirstName' => 'Hans', 'Infix' => null, 'LastName' => 'Odijk', 'PreferredName' => 'Hans', 'Adult' => true],
            ['Id' => 4, 'TypePeopelId' => 1, 'FirstName' => 'Dennis', 'Infix' => 'van', 'LastName' => 'Wakeren', 'PreferredName' => 'Dennis', 'Adult' => true],
            ['Id' => 5, 'TypePeopelId' => 2, 'FirstName' => 'Wilco', 'Infix' => 'Van de', 'LastName' => 'Grift', 'PreferredName' => 'Wilco', 'Adult' => true],
            ['Id' => 6, 'TypePeopelId' => 3, 'FirstName' => 'Tom', 'Infix' => null, 'LastName' => 'Sanders', 'PreferredName' => 'Tom', 'Adult' => false],
            ['Id' => 7, 'TypePeopelId' => 3, 'FirstName' => 'Andrew', 'Infix' => null, 'LastName' => 'Sanders', 'PreferredName' => 'Andrew', 'Adult' => false],
            ['Id' => 8, 'TypePeopelId' => 3, 'FirstName' => 'Julian', 'Infix' => null, 'LastName' => 'Kaldenheuvel', 'PreferredName' => 'Julian', 'Adult' => true],
        ]);
    }
}

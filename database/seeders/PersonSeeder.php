<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('People')->insert([
            ['Id' => 1, 'TypePeopleId' => 1, 'FirstName' => 'Mazin', 'Infix' => null, 'LastName' => 'Jamil', 'CallName' => 'Mazin', 'IsAdult' => true],
            ['Id' => 2, 'TypePeopleId' => 1, 'FirstName' => 'Arjan', 'Infix' => 'de', 'LastName' => 'Ruijter', 'CallName' => 'Arjan', 'IsAdult' => true],
            ['Id' => 3, 'TypePeopleId' => 1, 'FirstName' => 'Hans', 'Infix' => null, 'LastName' => 'Odijk', 'CallName' => 'Hans', 'IsAdult' => true],
            ['Id' => 4, 'TypePeopleId' => 1, 'FirstName' => 'Dennis', 'Infix' => 'van', 'LastName' => 'Wakeren', 'CallName' => 'Dennis', 'IsAdult' => true],
            ['Id' => 5, 'TypePeopleId' => 2, 'FirstName' => 'Wilco', 'Infix' => 'Van de', 'LastName' => 'Grift', 'CallName' => 'Wilco', 'IsAdult' => true],
            ['Id' => 6, 'TypePeopleId' => 3, 'FirstName' => 'Tom', 'Infix' => null, 'LastName' => 'Sanders', 'CallName' => 'Tom', 'IsAdult' => false],
            ['Id' => 7, 'TypePeopleId' => 3, 'FirstName' => 'Andrew', 'Infix' => null, 'LastName' => 'Sanders', 'CallName' => 'Andrew', 'IsAdult' => false],
            ['Id' => 8, 'TypePeopleId' => 3, 'FirstName' => 'Julian', 'Infix' => null, 'LastName' => 'Kaldenheuvel', 'CallName' => 'Julian', 'IsAdult' => true],
        ]);
    }
}
// cool 
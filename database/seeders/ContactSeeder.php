<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('Contacts')->insert([
            ['Id' => 1, 'PeopleId' => 1, 'Phone' => '0612365478', 'Email' => 'm.jamil@gmail.com'],
            ['Id' => 2, 'PeopleId' => 2, 'Phone' => '0637264532', 'Email' => 'a.ruijter@gmail.com'],
            ['Id' => 3, 'PeopleId' => 3, 'Phone' => '0639451238', 'Email' => 'h.odijk@gmail.com'],
            ['Id' => 4, 'PeopleId' => 4, 'Phone' => '0693234612', 'Email' => 'd.van.wakeren@gmail.com'],
            ['Id' => 5, 'PeopleId' => 5, 'Phone' => '0693234694', 'Email' => 'w.van.de.grift@gmail.com'],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('Contacts')->insert([
            ['Id' => 1, 'PersoonId' => 1, 'Mobiel' => '0612365478', 'Email' => 'm.jamil@gmail.com'],
            ['Id' => 2, 'PersoonId' => 2, 'Mobiel' => '0637264532', 'Email' => 'a.ruijter@gmail.com'],
            ['Id' => 3, 'PersoonId' => 3, 'Mobiel' => '0639451238', 'Email' => 'h.odijk@gmail.com'],
            ['Id' => 4, 'PersoonId' => 4, 'Mobiel' => '0693234612', 'Email' => 'd.van.wakeren@gmail.com'],
            ['Id' => 5, 'PersoonId' => 5, 'Mobiel' => '0693234694', 'Email' => 'w.van.de.grift@gmail.com'],
        ]);
    }
}

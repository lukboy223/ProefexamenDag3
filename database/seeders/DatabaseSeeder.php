<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TypePerson;
use App\Models\Person;
use App\Models\Contact;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Make sure to seed these in the correct order
        TypePerson::factory(10)->create();
        
        // Create people, make sure at least one exists
        Person::factory(20)->create();
        
        // Now create contacts
        Contact::factory(30)->create();
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TypePerson as TypePeople;
use App\Models\Person as People;
use App\Models\Contact;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('cookie123')
        ]);

        $this->call([
            TypePersonSeeder::class,
            PersonSeeder::class,
            ContactSeeder::class,
        ]);
    }
}

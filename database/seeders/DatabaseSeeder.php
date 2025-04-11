<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\TypePersonSeeder;
use Database\Seeders\PersonSeeder;
use Database\Seeders\ContactSeeder;
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

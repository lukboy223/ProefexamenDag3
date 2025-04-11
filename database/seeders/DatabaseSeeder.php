<?php

namespace Database\Seeders;

use App\Models\Lane;
use App\Models\People;
use App\Models\Reservation;
use App\Models\TypePeople;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Lane::factory(30)->create();
        TypePeople::factory(30)->create();
        People::factory(30)->create();
        Reservation::factory(30)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@test.com',
            'password' => bcrypt('1'), // password
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Lanes;
use App\Models\People;

use App\Models\Reservations;
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
        // Lanes::factory(30)->create();
        TypePeople::factory(30)->create();
        People::factory(30)->create();
       

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@test.com',
            'password' => bcrypt('1'), // password
        ]);

        Lanes::factory()->create([
            'Number' => 1,
            'HasFence' => true,
        ]);
        Lanes::factory()->create([
            'Number' => 2,
            'HasFence' => true,
        ]);
        Lanes::factory()->create([
            'Number' => 3,
            'HasFence' => true,
        ]);
        Lanes::factory()->create([
            'Number' => 4,
            'HasFence' => true,
        ]);
        Lanes::factory()->create([
            'Number' => 5,
            'HasFence' => true,
        ]);
        Lanes::factory()->create([
            'Number' => 6,
            'HasFence' => true,
        ]);
        Lanes::factory()->create([
            'Number' => 7,
            'HasFence' => true,
        ]);
        Lanes::factory()->create([
            'Number' => 8,
            'HasFence' => true,
        ]);
        Lanes::factory()->create([
            'Number' => 9,
            'HasFence' => true,
        ]);
        Lanes::factory()->create([
            'Number' => 10,
            'HasFence' => true,
        ]);
        Reservations::factory(30)->create();f
    }
}

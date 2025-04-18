<?php

namespace Database\Seeders;

use App\Models\Lanes;
use App\Models\People;
use App\Models\Reservations;
use App\Models\TypePeople;
use App\Models\User;
use App\Models\Game;
use App\Models\Person;
use App\Models\Reservation;
use App\Models\Result;
use App\Models\TypePerson;

use Illuminate\Database\Seeder;
use Database\Seeders\TypePersonSeeder;
use Database\Seeders\PersonSeeder;
use Database\Seeders\ContactSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // User::factory(10)->create();
        // Lanes::factory(30)->create();
        // TypePeople::factory(30)->create();
        // People::factory(30)->create();
       

     

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
        

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('cookie123')
        ]);
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@test.com',
            'password' => bcrypt('1')
        ]);

        //calls other seeders
        $this->call([
            TypePersonSeeder::class,
            PersonSeeder::class,
            ContactSeeder::class,

        ]);

        // TypePerson::factory()->create([
        //     'Name' => 'Klant'
        // ]);
        // TypePerson::factory()->create([
        //     'Name' => 'Medewerker'
        // ]);
        // TypePerson::factory()->create([
        //     'Name' => 'Gast'
        // ]);

        // Person::factory()->create([
        //     'TypePeopleId' => '1',
        //     'FirstName' => 'Mazin',
        //     'Infix' => '',
        //     'LastName' => 'jamil',
        //     'CallName' => 'Mazin',
        //     'IsAdult' => true,
        // ]);
        // Person::factory()->create([
        //     'TypePeopleId' => '1',
        //     'FirstName' => 'Arjan',
        //     'Infix' => 'de',
        //     'LastName' => 'Ruijter',
        //     'CallName' => 'Arjan',
        //     'IsAdult' => true,
        // ]);
        // Person::factory()->create([
        //     'TypePeopleId' => '1',
        //     'FirstName' => 'Hans',
        //     'Infix' => '',
        //     'LastName' => 'Odijk',
        //     'CallName' => 'Hans',
        //     'IsAdult' => true,
        // ]);
        // Person::factory()->create([
        //     'TypePeopleId' => '1',
        //     'FirstName' => 'Dennis',
        //     'Infix' => 'van',
        //     'LastName' => 'Wakeren',
        //     'CallName' => 'Dennis',
        //     'IsAdult' => true,
        // ]);
        // Person::factory()->create([
        //     'TypePeopleId' => '2',
        //     'FirstName' => 'Wilco',
        //     'Infix' => 'Van de',
        //     'LastName' => 'Grift',
        //     'CallName' => 'Wilco',
        //     'IsAdult' => true,
        // ]);
        // Person::factory()->create([
        //     'TypePeopleId' => '3',
        //     'FirstName' => 'Tom',
        //     'Infix' => '',
        //     'LastName' => 'Sanders',
        //     'CallName' => 'Tom',
        //     'IsAdult' => false,
        // ]);
        // Person::factory()->create([
        //     'TypePeopleId' => '3',
        //     'FirstName' => 'Andrew',
        //     'Infix' => '',
        //     'LastName' => 'Sanders',
        //     'CallName' => 'Andrew',
        //     'IsAdult' => false,
        // ]);
        // Person::factory()->create([
        //     'TypePeopleId' => '3',
        //     'FirstName' => 'Julian',
        //     'Infix' => '',
        //     'LastName' => 'Kaldenheuvel',
        //     'CallName' => 'Julian',
        //     'IsAdult' => true,
        // ]);

        Reservation::factory()->create([
            'PersonId' => '1',
            'OpeningTimeId' => '2',
            'LaneId' => '8',
            'PackageId' => '1',
            'ReservationStatus' => 'Bevestigd',
            'ReservationNumber' => '2022122000001',
            'Date' => '2022-12-20',
            'AmountHours' => '1',
            'Starttime' => '15:00',
            'EndTime' => '16:00',
            'AmountAdults' => '4',
            'AmountKids' => '2',
        ]);
        Reservation::factory()->create([
            'PersonId' => '2',
            'OpeningTimeId' => '2',
            'LaneId' => '2',
            'PackageId' => '3',
            'ReservationStatus' => 'Bevestigd',
            'ReservationNumber' => '2022122000002',
            'Date' => '2022-12-20',
            'AmountHours' => '1',
            'Starttime' => '17:00',
            'EndTime' => '18:00',
            'AmountAdults' => '4',
            'AmountKids' => null,
        ]);
        Reservation::factory()->create([
            'PersonId' => '3',
            'OpeningTimeId' => '7',
            'LaneId' => '3',
            'PackageId' => '1',
            'ReservationStatus' => 'Bevestigd',
            'ReservationNumber' => '2022122000003',
            'Date' => '2022-12-24',
            'AmountHours' => '2',
            'Starttime' => '16:00',
            'EndTime' => '18:00',
            'AmountAdults' => '4',
            'AmountKids' => null,
        ]);
        Reservation::factory()->create([
            'PersonId' => '1',
            'OpeningTimeId' => '2',
            'LaneId' => '6',
            'PackageId' => null,
            'ReservationStatus' => 'Bevestigd',
            'ReservationNumber' => '2022122000004',
            'Date' => '2022-12-27',
            'AmountHours' => '2',
            'Starttime' => '17:00',
            'EndTime' => '19:00',
            'AmountAdults' => '2',
            'AmountKids' => null,
        ]);
        Reservation::factory()->create([
            'PersonId' => '4',
            'OpeningTimeId' => '3',
            'LaneId' => '4',
            'PackageId' => '4',
            'ReservationStatus' => 'Bevestigd',
            'ReservationNumber' => '2022122000005',
            'Date' => '2022-12-28',
            'AmountHours' => '1',
            'Starttime' => '14:00',
            'EndTime' => '15:00',
            'AmountAdults' => '3',
            'AmountKids' => null,
        ]);
        Reservation::factory()->create([
            'PersonId' => '5',
            'OpeningTimeId' => '10',
            'LaneId' => '5',
            'PackageId' => '4',
            'ReservationStatus' => 'Bevestigd',
            'ReservationNumber' => '2022122000006',
            'Date' => '2022-12-28',
            'AmountHours' => '2',
            'Starttime' => '19:00',
            'EndTime' => '21:00',
            'AmountAdults' => '2',
            'AmountKids' =>null,
        ]);

        Game::factory()->create([
            'PersonId' => 1,
            'ReservationId' => 1,
        ]);
        Game::factory()->create([
            'PersonId' => 2,
            'ReservationId' => 2,
        ]);
        Game::factory()->create([
            'PersonId' => 3,
            'ReservationId' => 3,
        ]);
        Game::factory()->create([
            'PersonId' => 4,
            'ReservationId' => 5,
        ]);
        Game::factory()->create([
            'PersonId' => 5,
            'ReservationId' => 5,
        ]);
        Game::factory()->create([
            'PersonId' => 6,
            'ReservationId' => 5,
        ]);
        Game::factory()->create([
            'PersonId' => 7,
            'ReservationId' => 5,
        ]);

        Result::factory()->create([
            'GameId' => 1,
            'AmountPoints' => 290,
        ]);
        Result::factory()->create([
            'GameId' => 2,
            'AmountPoints' => 300,
        ]);
        Result::factory()->create([
            'GameId' => 3,
            'AmountPoints' => 120,
        ]);
        Result::factory()->create([
            'GameId' => 4,
            'AmountPoints' => 34,
        ]);
        Result::factory()->create([
            'GameId' => 5,
            'AmountPoints' => null,
        ]);
        Result::factory()->create([
            'GameId' => 6,
            'AmountPoints' => 234,
        ]);
        Result::factory()->create([
            'GameId' => 7,
            'AmountPoints' => 299,
        ]);


    }
}

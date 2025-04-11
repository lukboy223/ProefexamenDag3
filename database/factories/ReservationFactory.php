<?php

namespace Database\Factories;

use App\Models\Lane;
use App\Models\People;
use App\Models\PakketOptie;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'PeopleId' => People::factory(),
            'Openingstijd' => $this->faker->dateTimeBetween('+1 week'),
            'LaneId' => Lane::factory(),
            'PakketOptieId' => $this->faker->optional()->randomNumber(1,4),
            'ReserveringStatus' => $this->faker->randomElement(['In behandeling', 'Bevestigd', 'Geannuleerd']),
            'Reserveringsnummer' => $this->faker->unique()->numberBetween(1000, 9999),
            'Datum' => $this->faker->date(),
            'AantalUren' => $this->faker->numberBetween(1, 5),
            'BeginTijd' => $this->faker->time(),
            'EindTijd' => $this->faker->time(),
            'AantalVolwassen' => $this->faker->numberBetween(1, 10),
            'AantalKinderen' => $this->faker->numberBetween(0, 10),
            'DateCreated' => now(),
            'DateChanged' => now(),
        ];
    }
}

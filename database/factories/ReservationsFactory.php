<?php

namespace Database\Factories;

use App\Models\Lanes;
use App\Models\People;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ReservationsFactory extends Factory
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
            'Openingstijd' => $this->faker->dateTimeBetween('-1 week', '+1 week'),
            'LanceId' => $this->faker->randomElement(Lanes::pluck('Id')->toArray()),
            'PakketOptieId' => $this->faker->optional()->randomNumber(1,4),
            'ResercveringStatus' => $this->faker->randomElement(['In behandeling', 'Bevestigd', 'Geannuleerd']),
            'Resecrveringsnummer' => $this->faker->unique()->numberBetween(1000, 9999),
            'Datum' => $this->faker->date(),
            'AantaclUren' => $this->faker->numberBetween(1, 5),
            'BeginTijd' => $this->faker->time(),
            'EindTijd' => $this->faker->time(),
            'AantalVolwassen' => $this->faker->numberBetween(1, 10),
            'AantalKinderen' => $this->faker->numberBetween(0, 10)
        ];
    }
}

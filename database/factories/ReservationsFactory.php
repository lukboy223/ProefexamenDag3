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
            'OpeningTimeId' => $this->faker->dateTimeBetween('-1 week', '+1 week'),
            'LaneId' => $this->faker->randomElement(Lanes::pluck('Id')->toArray()),
            'PackageId' => $this->faker->optional()->randomNumber(1,4),
            'ReservationStatus' => $this->faker->randomElement(['In behandeling', 'Bevestigd', 'Geannuleerd']),
            'Reservationsnummer' => $this->faker->unique()->numberBetween(1000, 9999),
            'Date' => $this->faker->date(),
            'AantalUren' => $this->faker->numberBetween(1, 5),
            'BeginTijd' => $this->faker->time(),
            'EindTijd' => $this->faker->time(),
            'AantalVolwassen' => $this->faker->numberBetween(1, 10),
            'AantalKinderen' => $this->faker->numberBetween(0, 10)
        ];
    }
}

<?php

namespace Database\Factories;


use App\Models\TypePerson;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Person>
 */
class PersonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'TypePeopelId' => TypePerson::factory(),
            'FirstName' => $this->faker->firstName(),
            // Use a shorter infix with max 10 characters
            'Infix' => $this->faker->randomElement(['van', 'de', 'van der', 'van den', 'ten', '']),
            'LastName' => $this->faker->lastName(),
            'PreferredName' => $this->faker->firstName(),
            'Adult' => $this->faker->boolean() ? 1 : 0,
            'IsActive' => $this->faker->boolean() ? 1 : 0,
            'Opmerking' => $this->faker->sentence(),
            'DatumAangemaakt' => $this->faker->dateTime(),
            'DatumGewijzigd' => $this->faker->dateTime(),

        ];
    }
}

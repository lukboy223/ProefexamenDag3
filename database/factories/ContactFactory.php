<?php

namespace Database\Factories;

use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'PeopelId' => Person::inRandomOrder()->first()->Id ?? 1,
            // Generate a 10-digit string without formatting
            'Phone' => substr(preg_replace('/[^0-9]/', '', $this->faker->phoneNumber()), 0, 10),
            'Email' => $this->faker->safeEmail(),
            'IsActive' => $this->faker->boolean() ? 1 : 0,
            'Opmerking' => $this->faker->sentence(),
            'DatumAangemaakt' => $this->faker->dateTime(),
            'DatumGewijzigd' => $this->faker->dateTime(),
        ];
    }
}

<?php

namespace Database\Factories;
use App\Models\TypePeople;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PeopleFactory extends Factory
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
            'TypePeopleId' => TypePeople::factory(),
            'FirstName' => $this->faker->firstName(),
            'Tussenvoegsel' => $this->faker->optional()->firstname(),
            'LastName' => $this->faker->lastName(),
            'CallName' => $this->faker->optional()->name(),
            'IsAdult' => $this->faker->boolean(),
        ];
    }
}

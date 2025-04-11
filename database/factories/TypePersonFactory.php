<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\TypePerson as TypePeople;
use App\Models\Person as People;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TypePerson>
 */
class TypePersonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Name' => $this->faker->word,
            'IsActive' => $this->faker->boolean,
            'Opmerking' => $this->faker->sentence,
            'DatumAangemaakt' => $this->faker->dateTime,
            'DatumGewijzigd' => $this->faker->dateTime,
        ];
    }
    
}

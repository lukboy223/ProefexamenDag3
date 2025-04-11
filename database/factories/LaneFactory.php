<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class LaneFactory extends Factory
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
            'Number' => $this->faker->unique()->numberBetween(1, 10),
            'HasFence' => $this->faker->boolean(),
            'DateCreated' => now(),
            'DateChanged' => now(),
        ];
    }
}

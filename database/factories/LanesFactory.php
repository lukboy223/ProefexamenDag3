<?php
// filepath: database/factories/LanesFactory.php
namespace Database\Factories;

use App\Models\Lanes; // Correct model name
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lanes>
 */
class LanesFactory extends Factory
{
    protected $model = Lanes::class; // Link the factory to the Lane model

    public function definition(): array
    {
        return [
            'Number' => $this->faker->numberBetween(1, 10),
            'HasFence' => $this->faker->boolean(),

        ];
    }
}
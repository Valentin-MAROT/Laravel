<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function randomStatus(): string{
        $status = ['A venir', 'En cours', 'Terminé'];
        return $status[array_rand($status)];
    }
     public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'status' => $this->randomStatus(),
            'image' => $this->faker->imageUrl(),
            'nb_players' => $this->faker->numberBetween(1, 10),
        ];
    }
}

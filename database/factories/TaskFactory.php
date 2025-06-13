<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => substr($this->faker->sentence(), 0, 20),
            'description' => $this->faker->paragraph(),
            'stage' => $this->faker->randomElement(['planned', 'ongoing', 'completed']),
            'priority' => $this->faker->randomElement(['low', 'medium', 'high']),
            'deadline' => $this->faker->dateTimeBetween('-10 days')->format('Y-m-d'),
        ];
    }
}

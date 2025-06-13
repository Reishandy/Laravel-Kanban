<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kanban>
 */
class KanbanFactory extends Factory
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
            'user_id' => $this->faker->numberBetween(1, 2),
        ];
    }
}

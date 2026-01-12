<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle(),
            'description' => fake()->paragraphs(3, true),
            'min_salary' => fake()->numberBetween(30000, 50000),
            'max_salary' => fake()->numberBetween(60000, 100000),
            'location' => fake()->city(),
            'contact_email' => fake()->email(),
            'contact_name' => fake()->name(),
            'is_active' => true,
        ];
    }
}

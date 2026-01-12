<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'description' => fake()->paragraph(),
            'city' => fake()->city(),
            'email' => fake()->unique()->companyEmail(),
            'employee_size' => fake()->randomElement(["<10", "10-50", "50-100", ">100", ">500"]),
        ];
    }
}

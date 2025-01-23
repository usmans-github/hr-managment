<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'imageUrl' => fake()->imageUrl(),
            'position' => fake()->jobTitle(),
            'department' => fake()->randomElement(['Development', 'Design', 'Finance', 'Marketing', 'Sales', 'Networking']),
            'status' => fake()->randomElement(['Active', 'On Leave', 'Absent'])
        ];
    }
}

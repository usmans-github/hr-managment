<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attendence>
 */
class AttendenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employee_id' => Employee::inRandomOrder()->first()->id ?? Employee::factory(),
            'date' => $this->faker->dateTimeBetween('-1 month', 'now')->format('Y-m-d'),
            'checked_in' => $this->faker->boolean(80) ? $this->faker->time('H:i, A') : null, // 80% chance of check-in
            'checked_out' => $this->faker->boolean(70) ? $this->faker->time('H:i:s') : null, // 70% chance of check-out
            'status' => $this->faker->randomElement(['Present', 'Absent', 'Late', 'Leave']),
        ];
    }
}

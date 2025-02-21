<?php

namespace Database\Factories;

use App\Models\Employee;
use Carbon\Carbon;
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
        $checkIn = $this->faker->boolean(80) ? Carbon::createFromFormat('H:i', $this->faker->time('H:i'))->format('h:i A') : null;
        $checkOut = $this->faker->boolean(70) ? Carbon::createFromFormat('H:i', $this->faker->time('H:i'))->format('h:i A') : null;

        return [
            'employee_id' => Employee::inRandomOrder()->first()->id ?? Employee::factory(),
            'date' => $this->faker->dateTimeBetween('-1 month', 'now')->format('Y-m-d'),
            'checked_in' => $checkIn,
            'checked_out' => $checkOut,
            'status' => $this->faker->randomElement(['Present', 'Absent', 'Late', 'Leave']),
        ];
    }
}

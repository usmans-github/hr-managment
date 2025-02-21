<?php

namespace Database\Factories;

use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LeaveRequest>
 */
class LeaveRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startDate = Carbon::parse($this->faker->dateTimeBetween('-1 month', '+1 month')->format('Y-m-d'));

        // Ensure end_date is always AFTER start_date
        $endDate = $this->faker->boolean(70)
            ? $startDate->copy()->addDays(rand(1, 7))->format('Y-m-d')
            : null;

        return [
            'leave_type' => $this->faker->randomElement(['Sick Leave', 'Casual Leave', 'Annual Leave', 'Maternity Leave']),
            'employee_id' => Employee::inRandomOrder()->first()->id ?? Employee::factory(),
            'start_date' => $startDate,
            'end_date' => $endDate,
            'reason' => $this->faker->sentence(),
            'status' => $this->faker->randomElement(['Pending', 'Approved', 'Rejected']),
        ];
    }
}

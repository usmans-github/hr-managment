<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\Position;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

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
            'user_id' => User::factory(), // Create a user if not exists
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make('password'), // Default password
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'position_id' => Position::factory(), // Create a position if not exists
            'department_id' => Department::factory(), // Create a department if not exists
            'join_date' => $this->faker->date(),
            'salary' => $this->faker->numberBetween(50000, 150000), // Random salary
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

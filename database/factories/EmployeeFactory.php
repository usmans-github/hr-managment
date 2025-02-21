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
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory(),
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make('password'), // Default password
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'position_id' => Position::inRandomOrder()->first()->id ?? Position::factory(),
            'department_id' => Department::inRandomOrder()->first()->id ?? Department::factory(),
            'join_date' => $this->faker->date(),
            'salary' => $this->faker->numberBetween(50000, 150000), // Random salary
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

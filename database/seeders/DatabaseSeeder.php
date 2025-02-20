<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Position;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /** 
     * Seed the application's database.
     */
    public function run(): void
    {

        User::create([
            'email' => 'admin@example.com',
            'password' => bcrypt('admin@example'),
            'role' => 'admin',
        ]);
        Department::factory()->count(5)->create(); // Generates 5 departments

        Position::factory()->count(10)->create(); // Generates 10 positions linked to departments

        User::factory()->count(10)->create(); // Generates 10 users

        Employee::factory()->count(10)->create(); // Generates 10 employees
    }
}

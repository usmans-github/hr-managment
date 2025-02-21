<?php

namespace Database\Seeders;

use App\Models\Attendence;
use App\Models\Department;
use App\Models\Employee;
use App\Models\LeaveRequest;
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
        //admin
        User::create([
            'email' => 'admin@example.com',
            'password' => bcrypt('admin@example'),
            'role' => 'admin',
        ]);

        Department::factory()->count(5)->create(); 

        Position::factory()->count(10)->create(); 

        User::factory()->count(10)->create(); 

        Employee::factory()->count(10)->create();

        Employee::all()->each(function ($employee) {
            Attendence::factory()->count(rand(20, 30))->create([
                'employee_id' => $employee->id,
            ]);
        });

        Employee::all()->each(function ($employee) {
            LeaveRequest::factory(5)->create([
                'employee_id' => $employee->id,
            ]);
        });
    }
}

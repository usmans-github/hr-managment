<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Position;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin User
        User::create([
            'email' => 'admin@example.com',
            'password' => Hash::make('admin_password'),
            'role' => 'admin',
        ]);

        // Employee User
        Employee::create([
            'first_name' => 'example',
            'last_name' => 'employee',
            'email' => 'employee@example.com',
            'password' => Hash::make('employee_password'),
            'phone' => '123456789',
            'position_id' => '1',
            'department_id' => '1',
            'join_date' => Date::now(),
            'salary' => '$10,000'
        ]);
    }
}

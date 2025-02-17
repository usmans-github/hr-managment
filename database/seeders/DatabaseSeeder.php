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

        User::create([
            'id' => 2,
            'email' => 'usmanali730771@gmail.com',
            'password' => bcrypt('usmanali'),
            'role' => 'employee',
        ]);
        Department::create([
            'id' => 1,
            'department_name' => 'IT'
        ]);
        
        Position::create([
            'id' => 1,
            'position_name' => "Backend Developer",
            'department_id' => 1
        ]);
        Employee::create([
            'id' => 1,
            'user_id' => 2,
            'first_name' => 'Usman',
            'last_name' => 'Ali',
            'email' => 'usmanali730771@gmail.com',
            'password' => bcrypt('usmanali'),
            'phone' => '0300-1234567',
            // 'address' => 'House No. 13 Street No. 2 Hussain Colony HaroonAbad',
            'position_id' => 1,
            'department_id' => 1,
            'join_date' => '2021-01-01',
            'salary' => 50000,
        ]);
    }
}

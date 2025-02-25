<?php

namespace App\Console\Commands;

use App\Models\Employee;
use App\Models\Payroll;
use Carbon\Carbon;
use Illuminate\Console\Command;

class GenerateMonthlyPayroll extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-monthly-payroll';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automatically create payroll records at the end of every month with a status of Pending';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $employees = Employee::all(); // Get all employees

        foreach ($employees as $employee) {
            Payroll::create([
                'employee_id' => $employee->id,
                'pay_period' => Carbon::now()->startOfMonth()->toDateString(), // First day of the current month
                'amount' => $employee->salary, 
                'status' => 'Pending' // Default status
            ]);
        }

        $this->info('Payrolls for all employees have been created successfully.');
    }
    
}

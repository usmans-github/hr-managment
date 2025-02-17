<?php

namespace App\Console\Commands;

use App\Models\Attendence;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CheckAbsentEmployees extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-absent-employees';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check employees who did not check in before the required time and mark them absent';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Define the cutoff time in the same format as stored in DB
        $cutoffTime = Carbon::createFromFormat('h:i A', '07:00 PM');

        $employees = Employee::all();

        foreach ($employees as $employee) {

            // Fetch today's attendance record for the employee
            $attendence = Attendence::where('employee_id', $employee->id)
                ->whereDate('date', Carbon::today())
                ->first();

            // If an attendance record exists
            if ($attendence && $attendence->checked_in) {
                // Convert stored checked_in time into Carbon instance
                $checkedInTime = Carbon::createFromFormat('h:i A', $attendence->checked_in);

                if ($checkedInTime->greaterThan($cutoffTime)) {
                    $attendence->status = 'Late';
                    $attendence->save();
                    $this->info("Marked Late: " . $employee->first_name . ' ' . $employee->last_name);
                }
            }
            // If there is no attendance record, mark as Absent
            elseif (!$attendence) {
                Attendence::create([
                    'employee_id' => $employee->id,
                    'date' => Carbon::today()->toDateString(),
                    'checked_in' => null,
                    'checked_out' => null,
                    'status' => 'Absent'
                ]);
                $this->info("Marked Absent: " . $employee->first_name . ' ' . $employee->last_name);
            }
        }
    }
}

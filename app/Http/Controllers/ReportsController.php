<?php

namespace App\Http\Controllers;

use App\Models\Attendence;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Payroll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            //  Total Employees
            $totalEmployees = Employee::count();

            //  Total Payroll (assuming each employee has a payroll record)
            $totalPayroll = Payroll::where('status', 'Paid')->sum('amount');;

            //  Average Attendance Calculation (for all employees)
            $totalDays = Attendence::distinct('date')->count('date'); // Total working days
            $totalPresent = Attendence::where('status', 'Present')->count(); // Total present records
            $avgAttendence = $totalDays > 0 ? round(($totalPresent / ($totalEmployees * $totalDays)) * 100, 2) : 0; // Percentage

            //  Department-wise Data
            $departments = Department::with(['employees' => function ($query) {
                $query->withCount(['attendences as present_days' => function ($query) {
                    $query->where('status', 'Present');
                }]);
            }])->get()->map(function ($department) use ($totalDays) {
                $totalEmployees = $department->employees->count();
                $totalPresentDays = $department->employees->sum('present_days');
                $departmentAvgAttendence = ($totalEmployees > 0 && $totalDays > 0) ? round(($totalPresentDays / ($totalEmployees * $totalDays)) * 100, 2) : 0;

                return [
                    'name' => $department->department_name,
                    'employees' => $totalEmployees,
                    'avg_attendance' => $departmentAvgAttendence . '%'
                ];
            });

            return view('admin.reports', compact('totalEmployees', 'totalPayroll', 'avgAttendence', 'departments'));
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

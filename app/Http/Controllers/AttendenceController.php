<?php

namespace App\Http\Controllers;

use App\Models\Attendence;
use App\Models\Department;
use App\Models\Employee;
use App\Models\LeaveRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->role === 'admin') {
            //All Employees
            $employees = Employee::all();
            //All Deparmtnets
            $departments = Department::all();
            //All Present Employees
            $presentemployees = Attendence::where('status', 'Present')
                ->whereDate('date', today())->count();
            //All Late EMployees    
            $lateemployees = Attendence::where('status', 'Late') 
                ->whereDate('date', today())->count();
            //All Absent Employees          
            $absentemployees = Attendence::where('status', 'Absent')
                ->whereDate('date', today())->count();        
            //All Onleave EMployees
            $onleaveemployees = Attendence::where('status', 'Absent')
                ->whereDate('date', today())->count();            ;

            return view('attendence.attendences', compact('employees',  'departments', 'presentemployees', 'lateemployees', 'absentemployees', 'onleaveemployees'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employee.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {}

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'status' => 'required|in:Present,Absent,Leave',
        ]);

        $attendence = Attendence::findOrFail($id);
        $attendence->update([
            'status' => $request->status,
        ]);

        return redirect()->route('attendence.index')->with('success', 'Attendence updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $attendence = Attendence::findOrFail($id);
        $attendence->delete();

        return redirect()->route('attendence.index')->with('success', 'attendence deleted successfully.');
    }


    public function checkin($id)
    {   //DAte
        $today = Carbon::today()->toDateString();

        // Check if already checked in
        $attendance = Attendence::where('employee_id', $id)->where('date', $today)->first();
        if ($attendance) {
            return redirect()->route('employee.index')->with('error', 'Already checked in.');
        }
        //Time
        $timetoday = Carbon::now()->format('h:i A');
        // Create new check-in record
        Attendence::create([
            'employee_id' => $id,
            'date' => $today,
            'checked_in' => $timetoday,
            'status' => 'Present',
        ]);
        return redirect()->route('employee.index')->with('success', 'Checked in successfully.');
    }

    public function checkout($id)
    {
        // return dd($id);
        $today = Carbon::today()->toDateString();

        // Find today's attendance record
        $attendance = Attendence::where('employee_id', $id)->where('date', $today)->first();
        if (!$attendance || $attendance->checked_out) {
            return redirect()->route('employee.index')->with('error', 'Either not checkin OR Already checked out.');
        }

        // Update check-out time
        $attendance->update([
            'checked_out' => Carbon::now()->format('h:i A'),
        ]);

        return redirect()->route('employee.index')->with('success', 'Check out successfully');
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaveRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $employee = Employee::where('user_id', $user->id)->first();

        if (!$employee) {
            return redirect()->back()->withErrors('error', 'Employee record not found.');
        }

        $leaverequests = LeaveRequest::where('employee_id', $employee->id)->get();

        return view('employee.leave-requests', compact('employee', 'leaverequests'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        

        //   return dd($request->all(), $employeeId);

        $credenetials = $request->validate([
            'leave_type' => 'required',
            'start_date' => 'required',
            'end_date' => 'nullable',
            'reason' => 'required'
        ]);
        if (!$credenetials) {
            return back()->withErrors('error', 'All fields are required');
        }
        $employeeId = Auth::user()->employee->id;
        //Make a leave request;
        LeaveRequest::create([
            'leave_type' => $credenetials['leave_type'],
            'employee_id' => $employeeId,
            'start_date' => $credenetials['start_date'],
            'end_date' => $credenetials['end_date'],
            'reason' => $credenetials['reason']
        ]);
        return redirect('/leave-request')->with('success', 'Leave request created successfuly');
    }


    /**
     * Display the specified resource.
     */
    public function show(LeaveRequest $leaveRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LeaveRequest $leaveRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LeaveRequest $leaveRequest)
    {
        //
    }
}

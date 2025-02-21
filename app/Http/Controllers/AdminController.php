<?php

namespace App\Http\Controllers;

use App\Models\Attendence;
use App\Models\Department;
use App\Models\Employee;
use App\Models\LeaveRequest;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Pest\Laravel\get;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->role === 'admin') {

            $employees = Employee::with(['position', 'department'])->latest()->get();
            $totalemployees = Employee::all()->count();
            $presentemployees = Attendence::where('status', 'Present')
                ->whereDate('date', today())->count();
            $totaldepartments = Department::all()->count(); 
            $leaverequests = LeaveRequest::latest()->paginate(6);  

            return view('admin.index', compact('employees', 'totalemployees', 'presentemployees', 'totaldepartments', 'leaverequests'));
        }
    }
    public function employees()
    {
        $user = Auth::user();
        if ($user->role === 'admin') {
            $positions = Position::all();
            $departments = Department::all();
            $employees = Employee::with(['department', 'position'])->latest()->paginate(6);

            return view('admin.employees', compact('employees', 'positions', 'departments'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() 
    {
        //Create employee
        $positions = Position::all();
        $departments = Department::all();
                                                                                        
        return view('admin.create-employee', compact('positions', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        Auth::attempt($credentials);
        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

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

    public function employeedetails($id)
    {
        $employee = Employee::where('id', $id)->first();
        $attendences = Attendence::where('employee_id', $employee->id)->Paginate(8);
        $presents = Attendence::where('employee_id', $employee->id)
                    ->where('status', 'Present')->count();
        $absents = Attendence::where('employee_id', $employee->id)
                    ->where('status', 'Absent')->count();
        $lates = Attendence::where('employee_id', $employee->id)
                    ->where('status', 'Late')->count();

        return view('admin.employee-details', compact('employee', 'attendences', 'presents', 'absents', 'lates'));
    }


    public function leaveRequestApprove($id)
    {
        // return dd($id);
        $leaverequest = LeaveRequest::where('id', $id)->first();
        if (!$leaverequest) {
           return back()->withErrors('error', 'Leave Request not found'); 
        }

        $leaverequest->update(['status' => 'Approved']);
        $leaverequest->save();

        return redirect()->route('admin.index')->with('success', 'Leave request approved successfully.');
    }

    public function leaveRequestReject($id)
    {
        // return dd($id);
        $leaverequest = LeaveRequest::where('id', $id)->first();
        if (!$leaverequest) {
           return back()->withErrors('error', 'Leave Request not found'); 
        }

        $leaverequest->update(['status' => 'Rejected']);
        $leaverequest->save();

        return redirect()->route('admin.index')->with('success', 'Leave request rejected successfully.');
    }

}

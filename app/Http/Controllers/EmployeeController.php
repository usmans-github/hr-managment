<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $employee = Employee::where('user_id', $user->id)->with('latestAttendence')->first();
        return view('employee.index', compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $departments = Department::all();
        $positions = Position::all();

        return view('admin.create-employee', compact('departments', 'positions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required',
            'phone' =>  'required',
            'position_id' => 'required',
            'department_id' => 'required',
            'join_date' => 'required',
            'salary' => 'required',
        ]);

        if (User::where('email', $credentials['email'])->exists()) {
            return back()->withErrors(['error', 'User already exists.']);
        }

        if (Employee::where('email', $credentials['email'])->exists()) {
            return back()->withErrors(['error', 'Employee already exists.']);
        }


        User::create([
            'email' => $credentials['email'],
            'password' => bcrypt($credentials['password']),
            'role' => 'employee'
        ]);


        Employee::create([
            'user_id'=>  User::latest()->first()->id,
            'first_name' => $credentials['first_name'],
            'last_name' => $credentials['last_name'],
            'email' => $credentials['email'],
            'password' => bcrypt($credentials['password']),
            'phone' => $request->phone,
            'position_id' => $credentials['position_id'],
            'department_id' => $credentials['department_id'],
            'join_date' => $credentials['join_date'],
            'salary' => $credentials['salary']
        ]);
        return redirect('employees')->with('success', 'Employee created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show() {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $departments = Department::all();
        $positions = Position::all();

        return view('admin.edit-employee', compact('employee', 'departments', 'positions'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $credentials = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
            'phone' => ['required'],
            'position_id' => ['required'],
            'department_id' => ['required'],
            'join_date' => ['required'],
            'salary' => ['required'],
        ]);

        $employee = Employee::findOrFail($id);

        $employee->update([
            'first_name' => $credentials['first_name'],
            'last_name' => $credentials['last_name'],
            'password' => bcrypt($credentials['password']),
            'phone' => $request->phone,
            'position_id' => $credentials['position_id'],
            'department_id' => $credentials['department_id'],
            'join_date' => $credentials['join_date'],
            'salary' => $credentials['salary']
        ]);

        return redirect('employees')->with('success', 'Employee updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the employee by ID
        $employee = Employee::find($id);

        $user = $employee->user;

        // Check if employee exists
        if (!$employee || !$user) {
            return redirect()->back()->with('error', 'Employee not found.');
        }
        
        $user->delete();
        // Delete the employee
        $employee->delete();

        

        // Redirect back with success message
        return redirect('employees')->with('success', 'Employee deleted successfully.');
    }
}

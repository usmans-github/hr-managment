<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use App\Models\Position;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('employee.index');
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
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
            'phone' => ['required'],
            'position_id' => ['required'],
            'department_id' => ['required'],
            'salary' => ['required'],
        ]);


        Employee::create([
            'name' => $credentials['name'],
            'email' => $credentials['email'],
            'password' => bcrypt($credentials['password']),
            'phone' => $request->phone,
            'position_id' => $credentials['position_id'],
            'department_id' => $credentials['department_id'],
            'salary' => $credentials['salary']
        ]);
        return redirect()->route('/employee')->with('success', 'Employee created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show() {
        
    }

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
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
            'phone' => ['required'],
            'position_id' => ['required'],
            'department_id' => ['required'],
            'salary' => ['required'],
        ]);

        $employee = Employee::findOrFail($id);

        $employee->update([
            'name' => $credentials['name'],
            'email' => $credentials['email'],
            'password' => bcrypt($credentials['password']),
            'phone' => $request->phone,
            'position_id' => $credentials['position_id'],
            'department_id' => $credentials['department_id'],
            'salary' => $credentials['salary']
        ]);

        return redirect('/admin')->with('success', 'Employee updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the employee by ID
        $employee = Employee::find($id);

        // Check if employee exists
        if (!$employee) {
            return redirect()->back()->with('error', 'Employee not found.');
        }

        // Delete the employee
        $employee->delete();

        // Redirect back with success message
        return redirect()->route('employee')->with('success', 'Employee deleted successfully.');
    }
}

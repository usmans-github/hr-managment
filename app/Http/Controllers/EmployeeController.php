<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.employees', [
            'employees' => Employee::with(['department', 'position'])->get()
        ]);
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
        $validated = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
            'phone' => ['required'],
            'position_id' => ['required'],
            'department_id' => ['required'],
            'salary' => ['required'],
        ]);


        Employee::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'position_id' => $request->position_id
        ]);
        // return dd($validated);
        return redirect('/employees')->with('success', 'Employee created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request) {}

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
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'password' => 'required',
            'phone' => 'required|string|max:15',
            'department_id' => 'required|exists:departments,id',
            'position_id' => 'required|exists:positions,id',
            'salary' => 'required',
        ]);

        $employee = Employee::findOrFail($id);
        $employee->update($validated);

        return redirect('/dashboard')->with('success', 'Employee updated successfully.');
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
        return redirect('/employees')->with('success', 'Employee deleted successfully.');
    }

    public function dashboard(Request $request)
    {
        // return dd($request->all());
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt($validated)) {
            return view('employee.index');
        }   


        return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
    }
}

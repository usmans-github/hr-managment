<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\LeaveRequest;
use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $employee = Employee::where('user_id', $user->id)->with('latestAttendence')->first();
        $upcomingleaves = LeaveRequest::where('employee_id', $employee->id)
            ->where('status', 'Approved')
            ->where('start_date', '>', today())
            ->orderBy('start_date', 'asc')
            ->get();

        return view('employee.index', compact('employee', 'upcomingleaves'));
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
        $credentials = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required',
            'address' => 'required',
            'phone' =>  'required',
            'position_id' => 'required',
            'department_id' => 'required',
            'join_date' => 'required',
            'salary' => 'required',
        ]);

        // Check if the user already exists
        if (User::where('email', $credentials['email'])->exists()) {
            return back()->withErrors(['error' => 'User already exists.']);
        }

        // Start a database transaction
        DB::beginTransaction();

        try {
            // Create the user
            $user = User::create([
                'email' => $credentials['email'],
                'password' => bcrypt($credentials['password']),
                'role' => 'employee'
            ]);

            // Create the employee linked to the user
            Employee::create([
                'user_id' => $user->id,
                'first_name' => $credentials['first_name'],
                'last_name' => $credentials['last_name'],
                'email' => $credentials['email'],
                'password' => bcrypt($credentials['password']),
                'address' => $credentials['address'],
                'phone' => $request->phone,
                'position_id' => $credentials['position_id'],
                'department_id' => $credentials['department_id'],
                'join_date' => $credentials['join_date'],
                'salary' => $credentials['salary']
            ]);

            // Commit the transaction if everything is successful
            DB::commit();

            return redirect('employees')->with('success', 'Employee created successfully.');
        } catch (\Exception $e) {
            // Rollback the transaction if anything goes wrong
            DB::rollBack();
            return back()->withErrors(['error' => 'An error occurred while creating the employee. Please try again.']);
        }
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
       
        return view('admin.edit-employee', compact('employee', 'departments', 'positions'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the request data
        $credentials = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'address' => 'required',
            'phone' => 'required',
            'department_id' => 'required|integer',
            'position_id' => 'required|integer',
            'join_date' => 'required|date',
            'salary' => 'required|numeric',
        ]);
        
        $existingEmployee = Employee::where('last_name', $credentials['last_name'])
            ->where('id', '!=', $id)
            ->first();

        if ($existingEmployee) {
            return redirect()->back()->withErrors('error', 'Last name already exists. Please choose another.');
        }

        // Find the employee by ID
        $employee = Employee::findOrFail($id);


        // Update the employee record
        $employee->update([
            'first_name' => $credentials['first_name'],
            'last_name' => $credentials['last_name'],
            'email' => $credentials['email'],
            'password' => $credentials['password'] ? bcrypt($credentials['password']) : $employee->password,
            'address' => $credentials['address'],
            'phone' => $credentials['phone'],
            'department_id' => $credentials['department_id'],
            'position_id' => $credentials['position_id'],
            'join_date' => $credentials['join_date'],
            'salary' => $credentials['salary'],
        ]);

        // Redirect with success message    
        return redirect('/employees')->with('success', 'Employee updated successfully.');
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

    public function profile()
    {
        $user = Auth::user();
        $employee = Employee::where('user_id', $user->id)->first();
        

        if (!$employee) {
            return redirect()->back()->with('error', 'Employee profile not found.');
        }

        return view('employee.profile', compact('employee'));
    }
}

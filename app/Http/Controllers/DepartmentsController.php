<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->role === 'admin') {
            return view('admin.departments', [
                'departments' => Department::with(['positions', 'employees'])->get()
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        if ($user->role === 'admin') {
            return view('admin.create-department');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $credentials = $request->validate([
            'department_name' => ['required'],

        ]);
        Department::create($credentials);
        return redirect('/department')->with('success', 'Department created successfully!');;
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $departments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $department = Department::findOrFail($id);

        return view('admin.edit-department', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $credentials = $request->validate([
            'department_name' => 'required|string|max:255'
        ]);

        $department = Department::findOrFail($id);
        $department->update($credentials);

        return redirect('department')->with('success', 'Department updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the department by ID
        $department = Department::find($id);

        // Check if department exists
        if (!$department) {
            return redirect()->back()->with('error', 'Department not found.');
        }

        // Delete the employee
        $department->delete();

        // Redirect back with success message
        return redirect('/department')->with('success', 'Department deleted successfully.');
    }
}

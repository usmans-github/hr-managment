<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartmentsController extends Controller
{

    public function getPositions($id)
    {
        $positions = Position::where('department_id', $id)->get();
        return response()->json($positions);
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->role === 'admin') {
            $departments = Department::with(['positions', 'employees'])->paginate(6);
            return view('admin.departments', compact('departments'));
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
            'department_name' => 'required',
        ]);
        if (Department::where('department_name', $credentials['department_name'])->exists()) {
            return redirect()->back()->with('error', 'Department already exists.');
        }
        Department::create($credentials);
        return redirect('/department')->with('success', 'Department created successfully!');;
    }

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
    public function edit($id)
    {
        $user = Auth::user();
        if ($user->role === 'admin') {
            $department = Department::findOrFail($id);

            return view('admin.edit-department', compact('department'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        if ($user->role === 'admin') {
            $credentials = $request->validate([
                'department_name' => 'required|string|max:255',
            ]);

            $department = Department::findOrFail($id);
            $department->update($credentials);

            return redirect('department')->with('success', 'Department updated successfully.');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = Auth::user();
        if ($user->role === 'admin') {
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
}

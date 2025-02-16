<?php

namespace App\Http\Controllers;

use App\Models\Attendence;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->role === 'admin') {

            $employees = Employee::with(['position', 'department'])->get();
            $totalemployees = Employee::all()->count();
            $presentemployees = Attendence::where('status', 'Present')
                ->whereDate('date', today())->count();

            return view('admin.index', compact('employees', 'totalemployees', 'presentemployees'));
        }
    }
    public function employees()
    {
        $user = Auth::user();
        if ($user->role === 'admin') {
            return view('admin.employees', [
                'employees' => Employee::with(['department', 'position'])->get()
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

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
}

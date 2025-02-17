<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // public function markAbsentEmployees()
    // {
    //     $deadline = Carbon::today()->setHour(9)->setMinute(0);

    //     // Mark employees absent if they haven't checked in by 9 AM
    //     Employee::whereNull('check_in_time')
    //         ->where('status', '!=', 'Present')
    //         ->update(['status' => 'Absent']);
    // }

    /**
     * Display a listing of the resource.
     */
    public function index() {}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Check for Admin Login
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->route('admin.index')->with('success', 'Admin logged in successfully!');
            }
        }

        // Check for Employee Login
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role === 'employee') {
                return redirect()->route('employee.index')->with('success', 'Employee logged in successfully!');
            }
        }

        return back()->withErrors(['error' => 'Invalid credentials']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

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

<?php

namespace App\Http\Controllers;

use App\Models\Attendence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->role === 'admin') {
            $attendences = Attendence::all();
            return view('attendence.attendences', compact('attendences'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employee.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $attendence = Attendence::findOrFail($id);
        return view('attendence.edit', compact('attendence'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $attendence = Attendence::findOrFail($id);
        return view('attendence.edit', compact('attendence'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'status' => 'required|in:Present,Absent,Leave',
        ]);

        $attendence = Attendence::findOrFail($id);
        $attendence->update([
            'status' => $request->status,
        ]);

        return redirect()->route('attendence.index')->with('success', 'Attendence updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $attendence = Attendence::findOrFail($id);
        $attendence->delete();

        return redirect()->route('attendence.index')->with('success', 'attendence deleted successfully.');
    }


    public function checkin(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'date' => 'required|date',
            'time' => 'required',
            'status' => 'required|in:checked_in',
        ]);

        Attendence::create([
            'employee_id' => $id,
            'date' => $request->date,
            'time' => $request->time,
            'status' => $request->status,
        ]);

        return redirect()->route('employee.index')->with('success', 'Checked In successfully.');
        

    }

    public function checkout(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'date' => 'required|date',
            'time' => 'required',
            'status' => 'required|in:checked_out'
        ]);

        Attendence::create([
            'employee_id' => $id,
            'date' => $request->date,
            'time' => $request->time,
            'status' => $request->status,
        ]);

        return redirect()->route('employee.index')->with('success', 'Checked Out successfully.');
        

    }


}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatepositionRequest;
use App\Models\Department;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        if ($user->role === 'admin') {

            return view('admin.create-position', [
                'departments' =>  Department::all()
            ]);
        }else{
            return redirect('/department')->with('error', 'Authorization error!');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            // Validate request data
            $credentials = $request->validate([
                'position_name' => "required|string",
                'department_id' => "required|exists:departments,id"
            ]);

            // Check if position already exists
            $existingPosition = Position::where('position_name', $credentials['position_name'])
                ->where('department_id', $credentials['department_id'])
                ->first();

            if ($existingPosition) {
                return redirect('/department')->with('error', 'Position already exists in this department!');
            }

            // Create a new position
            $position = Position::create($credentials);

            return redirect('/department')->with('success', 'Position created successfully!');
        } else {
            return redirect('/department')->with('error', 'You are not authorized to create a position!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(position $position)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(position $position)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatepositionRequest $request, position $position)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(position $position)
    {
        //
    }
}

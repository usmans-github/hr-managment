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


            $credentials = $request->validate([
                'position_name' => ['required'],
                'department_id' => ['required']
            ]);

            $position = Position::create($credentials);
            $position->save();

            return redirect('/department')->with('success', 'Position created successfully!');
        }else{
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

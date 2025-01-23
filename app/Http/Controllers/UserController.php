<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index () 
    {
        return view('auth.login');
    }


    public function login (Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        Auth::attempt($validated);

        return redirect('/user-dashboard');
    }   
  
}

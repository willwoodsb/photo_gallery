<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }
    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        if (auth()->attempt($attributes)) {
            return redirect('/admin')->with('success', 'Logged in successfully');
        }

        return back()
            ->withInput()
            ->withErrors(['name' => 'The provided details could not be verified']);
    }
    public function destroy()
    {
        auth()->logout();

        return redirect('/admin')->with('success', 'Logged out successfully');
    }
}

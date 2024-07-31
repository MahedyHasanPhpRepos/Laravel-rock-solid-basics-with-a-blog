<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{

    public function create()
    {

        return view('sessions.create');
    }

    public function store()
    {

        // dd(request()->all()) ; 

        $data = request()->validate([
            'email' => 'required',
            // exists:users,email
            'password' => 'required'
        ]);

        if (auth()->attempt($data)) {
            session()->regenerate() ; 
            return redirect('/')->with('success', 'Welcome Back!');
        }

        return back()->with('success', 'Something Went Wrong!');
    }






    public function destroy()
    {
        // auth()->guest()
        auth()->logout();
        return redirect('/')->with('success', 'Good Bye!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    //
    public function create()
    {
        # code...
        return view('sessions.create');
    }

    public function store()
    {
        # code...
        # validate the request
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' =>'required'
        ]);

        # attempt to authenticate and log in the user
        # based on the provided credentials
        if ( auth() -> attempt($attributes) ) {
            # redirect with a success flash message
            return redirect('/')->with('success','Welcome Back!');
        }

        # auth faild.

        // return back()->withErrors([
        //          'email' => 'Your provided credentials could not be verified.']);

        // throw ValidationException::withMessages([
        //     'email' => 'Your provided credentials could not be verified.'
        // ]);

    }

    public function destroy()
    {
        # code...
        auth()->logout();

        return redirect('/')->with('success','Goodbye');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function create()
    {
        # code...
        return view('register.create');
    }

    public function store()
    {
        # code... Create a user


        $attributes = request()->validate([
            'name'=> 'required|max:255',
            'username' => 'required|min:4|max:255|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:4|max:255',

        ]);


        $user = User::create($attributes);

        auth()->login($user);

        return redirect('/')->with('success','Your account has been created');

    }
}

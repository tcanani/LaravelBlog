<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
//        return request()->all();

        $attributes = request()->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users,username',
            'email' => 'required|max:255|email|unique:users,email',
            'password' => 'required|min:7|max:255'
        ]);

        $user = User::create($attributes);

        //Log the user
        auth()->login($user);

        return redirect('/')->with('success','Your account has been created.');
    }
}



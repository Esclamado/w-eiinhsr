<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function show()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request) 
    {
        $user = User::create($request->validated());

        auth()->login($user);
        
        $user_roles = $user->user_access;
        if ($user_roles == "2") {
            return redirect('/upload_grades/first_year/index')->with('success', ucwords($user->name) .' '. "Account successfully registered.");
        } else if ($user_roles == "3") {
            return redirect('/student')->with('success', ucwords($user->name) .' '. "Account successfully registered.");
        } else if ($user_roles == "4") {
            return redirect('/admin')->with('success', ucwords($user->name) .' '. " Succesfully Login.");
        } else {
            return redirect('/admin')->with('success', ucwords($user->name) .' '. "Account successfully registered.");
        }
    }
}

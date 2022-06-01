<?php

namespace App\Http\Controllers;

use auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //Create form 
    public function create() 
    {
        return view('register');
    }
    //store user
    public function store(Request $request) 
    {
        $validateForm = $request->validate(
            [
                'name' => 'required',
                'email' => ['required', 'email', Rule::unique('users', 'email')],
                'password' => 'required', 
            ]
        );
        //hashing 
        $validateForm['password'] = bcrypt($validateForm['password']);
        //create user
        $user = User::create($validateForm);
        //login 
        auth()->login($user);
        //redirect
        return redirect('/')->with('message', 'Your account has been created');
    }
    public function logout(Request $request) 
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out');
    }
    //login form 
    public function login() 
    {
        return view('login');
    }
    //authenticate
    public function authenticate(User $user, Request $request) 
    {
        $validateForm = $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required', 
            ]
        );
        if(auth()->attempt($validateForm)) {
            $request->session()->regenerate();
            return redirect('/')->with('message', 'You have been logged in');
        }
        return redirect('/login')->with('message', 'Your email or password is incorrect');
    }
}

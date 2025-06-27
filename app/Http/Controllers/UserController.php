<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    /**
     * Load the login view.
     */
    public function loadLogin()
    {
        return view('login'); // Correspond à resources/views/login.blade.php
    }

    /**
     * Load the registration view.
     */
    public function loadRegister()
    {
        return view('register');
    }
        /**
     * Handle user registration.
     */
    public function userRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password); 
        $user ->save();

        return redirect()->route('login')->with('success', 'Registration successful. You can now log in.');
    }
    /**
     * Handle user login.
     */
    public function userLogin (Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            return redirect()->route('todos.index')->with('success', 'Login successful.');
        }

        return redirect()->back()->withErrors(['email' => 'Invalid Email Or Password.']);
    }
}

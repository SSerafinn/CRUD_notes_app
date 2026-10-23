<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // LOGIN - show login page
    public function showLogin()
    {
        return view('auth.login');   
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))){
            $request->session()->regenerate();

            return redirect()->intended(route('notes.index'));
        }

        return back()
            ->withErrors(['email' => 'These credentials does not match our records'])
            ->onlyInput('email');
    }
    
    // REGISTER - show register page
    public function showRegister()
    {
        return view('auth.register');   
    }

    // REGISTER - create the account, then logs the user in 
    public function register(Request $request)
    {
     
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email'=> 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);
        
        Auth::login($user);
        $request->session()->regenerate();
        
        return redirect()->route('notes.index')->with('success', 'Welcome, '. $user->name . '!');
    }
 
    //LOGOUT - ends the session
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate(); // throws away the session data
        $request->session()->regenerateToken(); // regenerate CSRF tokens
        
        return redirect()->route('login')->with('success', 'You have been logged out');
        
    }
}
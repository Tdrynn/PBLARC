<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //Register 
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed'
        ]);

        User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'pengunjung',
        ]);

        return redirect()->route('login')->with('success', 'Account created successfully');
    }

    //login
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();
            
            if (!Auth::user()->is_active) {
                Auth::logout();
                return back()->with('error', 'Your account has been blocked');
            }

            session([
                'user_name' => Auth::user()->name,
                'user_phone' => Auth::user()->phone,
                'user_email' => Auth::user()->email,
                'user_id' => Auth::user()->id,
                'user_role' => Auth::user()->role,
            ]);

            return redirect()->intended('/home');

            if (Auth::user()->role === 'admin') {
                return redirect('/admin');
            }
        }

        return back()->with('error', 'Incorrect email or password');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
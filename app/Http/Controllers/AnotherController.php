<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnotherController extends Controller
{
    public function index()
    {
        return view('/dashboard'); 
    }

    public function login()
    {
        // if (Auth::check()) {
        //     return redirect()->route('dashboard');
        // }
        return view('login');
    }

    public function registration()
    {
        return view('registration');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function forg_password()
    {
        // if (Auth::check()) {
        //     return redirect()->route('dashboard');
        // }
        return view('forgottenPassword');
    }
    public function new_password_fun()
    {
        // if (Auth::check()) {
        //     return redirect()->route('dashboard');
        // }
        return view('newPassword');
    }

    public function otp_code_fun()
    {
        // if (Auth::check()) {
        //     return redirect()->route('dashboard');
        // }
        return view('otp');
    }

}

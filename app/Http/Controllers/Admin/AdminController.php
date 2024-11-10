<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login'); 
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 'admin'])) {
            
            return redirect()->route('admin.dashboard', [
                'user'=> $user
            ]); 
        }

        
        return back()->withErrors([
            'email' => 'Les identifiants fournis sont incorrects.',
        ]);
    }

    public function dashboard()
    {

        return view('admin.dashboard'); 
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login'); 
    }
}

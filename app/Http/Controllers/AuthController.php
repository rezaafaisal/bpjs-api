<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        if(Auth::user()){
            return redirect()->route('dashboard');
        }
        return view('login');
    }

    public function check(Request $req){
        $credentials = $req->validate([
            'nik' => 'required',
            'password' => 'required'
        ]);

        if($user = User::where('nik', $req->nik)->first()){
            if($user->role->name == 'admin'){
                if(Auth::attempt($credentials)){
                     $req->session()->regenerate();
                    return redirect()->route('dashboard');
                }
            }

            return "Kamu bukan admin";
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
        return $req;
    }

    public function logout(Request $req){
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
    
        return redirect()->route('login');
    }

    public function username(){
        return "nik";
    }
}

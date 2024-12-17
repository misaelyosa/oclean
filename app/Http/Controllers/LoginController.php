<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request){
        $data=$request->validate([
            'email'=>'required|email:dns',
            'password'=>'required',
        ]);

        if(Auth::attempt($data)){
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->role ==2) {
                return redirect()->intended('/banksampah');
            }
            return redirect()->intended('/home');
        }
        else {
            return back()->withErrors([
                'email'=>'Login Failed',
            ])->withInput();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}

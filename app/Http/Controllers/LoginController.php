<?php

namespace App\Http\Controllers;

use App\Models\Roles;
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
            switch (Roles::where('id', Auth::user()->role)->first()->role) {
                case 'peternak_maggot':
                    return redirect()->intended('/peternakmaggot');
                    break;
                default:
                    return redirect()->intended('/home');
            }
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

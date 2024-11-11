<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Roles;

class RegisterController extends Controller
{
    public function store(Request $request){
        dd('ballz');
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|confirmed',
            'alamat' => 'required|max:255',
            'no_telp' => 'required|max:12|min:11',
            'umur' => 'required|max:2',
            'gender' => 'required',
            'role' => 'required',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);
       
        $user = User::create($validatedData);

        Roles::create([
            'user_id' => $user->id,
            'role' => $validatedData['role'],
        ]);
        

        return redirect('/login')->with('success', 'User Berhasil Ditambahkan, Silahkan Login');
    }
}

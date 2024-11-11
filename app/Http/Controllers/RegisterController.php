<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Roles;

class RegisterController extends Controller
{
    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|confirmed',
            'alamat' => 'required|max:255',
            'no_telp' => 'required|max:14|min:11',
            'umur' => 'required|max:2',
            'gender' => 'required',
            'role' => 'required',
        ]);
        

        $validatedData['password'] = bcrypt($validatedData['password']);
       
        $user = User::create($validatedData);

        $role = null;

        if($validatedData['role'] === 'User'){
            $role = 'user';
        } elseif ($validatedData['role'] === 'Peternak Maggot'){
            $role = 'peternak_maggot';
        } elseif ($validatedData['role'] === 'Bank Sampah'){
            $role = 'admin_bank_sampah';
        }

        if($role!=null){
            Roles::create([
                'user_id' => $user->id,
                'role' => $role,
            ]);
        }
        // dd([$validatedData , $role]);

        return redirect('/login')->with('success', 'User Berhasil Ditambahkan, Silahkan Login');
    }
}

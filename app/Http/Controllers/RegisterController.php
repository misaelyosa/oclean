<?php

namespace App\Http\Controllers;
use DB;
use Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Roles;
use Illuminate\Validation\Rule;

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

    public function edit(Request $r){
        $validatedData = $r->validate([
            'uid' => 'required',
            'name' => 'required|max:255',
            'email' => [
                'required',
                'email:dns',
                Rule::unique('users')->ignore($r->uid),
            ],
            'alamat' => 'required|max:255',
            'no_telp' => 'required|max:14|min:11',
            'umur' => 'required|integer|min:1|max:99',
            'gender' => 'required',
        ]);
    
        $user = User::findOrFail($r->uid);
    
        // Update the user's details
        $user->name = $r->name;
        $user->email = $r->email;
        $user->alamat = $r->alamat;
        $user->no_telp = $r->no_telp;
        $user->umur = $r->umur;
        $user->gender = $r->gender;
    
        // Only update the password if a new password is provided
        if ($r->filled('password')) {
            $validatedPassword = $r->validate([
                'password' => 'required|confirmed',
            ]);
            $user->password = Hash::make($validatedPassword['password']);
        }
    
        $user->save();
    
        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }
}

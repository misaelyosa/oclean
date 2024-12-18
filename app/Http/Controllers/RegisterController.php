<?php

namespace App\Http\Controllers;
use App\Models\Ekosistem;
use DB;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Roles;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

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
            'id_lokasi'=>'required'
        ]);
        


        // $validatedData['password'] = bcrypt($validatedData['password']);
        // // dd($validatedData);
        // $user = User::create($validatedData);
        
        $validatedData['password'] = bcrypt($validatedData['password']);
        
        // Create a new user instance
        $user = new User;
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = $validatedData['password'];
        $user->alamat = $validatedData['alamat'];
        $user->no_telp = $validatedData['no_telp'];
        $user->umur = $validatedData['umur'];
        $user->gender = $validatedData['gender'];
        $role = null;
        
        if ($validatedData['role'] === 'User') {
            $role = 'user';
        } elseif ($validatedData['role'] === 'Peternak Maggot') {
            $role = 'peternak_maggot';
        } elseif ($validatedData['role'] === 'Bank Sampah') {
            $role = 'admin_bank_sampah';
        }
        
        $user->id_lokasi = $validatedData['id_lokasi'];
        $user->poin = 0; 
        $user->save(); 

        if ($role !== null) {
            $lore = new Roles;
            $lore->user_id = $user->id;
            $lore->role = $role;
            $lore->save();

            // Roles::create([
            //     'user_id' => $user->id,
            //     'role' => $role,
            // ]);
        }

        $user->role = $lore->id;
        $user->save();

        
        // Redirect with success message
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
            'no_telp' => 'required|max:20|min:11',
            'umur' => 'required|integer|min:1|max:99',
            'gender' => 'required',
        ]);
    
        $user = User::findOrFail($r->uid);
    
        
        $user->name = $r->name;
        $user->email = $r->email;
        $user->alamat = $r->alamat;
        $user->no_telp = $r->no_telp;
        $user->umur = $r->umur;
        $user->gender = $r->gender;
    
        
        if ($r->filled('password')) {
            $validatedPassword = $r->validate([
                'password' => 'required|confirmed',
            ]);
            $user->password = Hash::make($validatedPassword['password']);
        }
    
        $user->save();
    
        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }

    public function fetch(){

        $ekosistem = Ekosistem::get();
        return view('register.index')->with('id_lokasi', $ekosistem);
    }
}

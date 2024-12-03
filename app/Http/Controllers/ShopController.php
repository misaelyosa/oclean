<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Roles;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function buy(Produk $produk){
        // $userId = Auth::id();
            if(Auth::user()->poin < 150){
                return back()->with('poin',"Poin Tidak Cukup");
            }
            // $currentPoin = DB::table('users')->where('id', $userId);

            $user = Auth::user();
            $user->poin = $user->poin - 150;
 // Simpan perubahan ke database
 $user->save();
            return redirect()->route('user.shop')->with('success', "Berhasil!, Poin anda telah ditukarkan");
    }  
}

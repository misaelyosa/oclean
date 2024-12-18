<?php

namespace App\Http\Controllers;

use App\Models\TransaksiProduk;
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
            if(Auth::user()->poin < $produk->harga){
                return back()->with('poin',"Poin Tidak Cukup");
            }
            // $currentPoin = DB::table('users')->where('id', $userId);

            $user = Auth::user();
            $total = $produk->harga * $produk->jumlah;
            $user->poin = $user->poin - $total;
            // Simpan perubahan ke database
            $user->save();

            $transaksi = new TransaksiProduk;
            $transaksi->jumlah = $produk->jumlah;
            $transaksi->harga = $produk->harga;
            $transaksi->total = $produk->jumlah * $produk->harga;
            $transaksi->id_produk = $produk->id;
            $transaksi->id_user = $user->id;
            $transaksi->id_bnksmph = $produk->bank;
            $transaksi->save();

            return redirect()->route('user.shop')->with('success', "Berhasil!, Poin anda telah ditukarkan");
    }  
}

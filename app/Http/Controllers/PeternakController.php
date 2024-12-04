<?php

namespace App\Http\Controllers;

use App\Models\BankSampah;
use App\Models\CatatanProduk;
use App\Models\TransaksiSampah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeternakController extends Controller
{
    public function index(){
        return view('peternak_maggot.index', ['title'=>'Home']);
    }

    public function sampahs(){
        $banksampah = BankSampah::where('id_lokasi', Auth::user()->id_lokasi)->get();
        // $banksampah = BankSampah::where('id_lokasi', 1)->get();
        return view('peternak_maggot.jumlahSampah', ['title'=>'Bank Sampah', 'banks'=>$banksampah]);
    }

    
    public function bank($id)
    {
        $banksampah = BankSampah::where('id', $id)->first();
        return view('peternak_maggot.bankSampah', [
            'title' => $banksampah->nama,
            'bank' => $banksampah
        ]);
    }
    
    public function requestSampah(Request $request, $id_bank){
        $validatedData = $request->validate([
            'berat' => 'required|max:255'
        ]);
        
        $validatedData['id_user'] = Auth::user()->id;
        $validatedData['id_bnksmph'] = $id_bank;
        
        TransaksiSampah::create($validatedData);
        
        return redirect('/peternakmaggot/sampah')->with('success', 'Sampah Berhasil Direquest');
    }
    
    public function produks(){
        $history = CatatanProduk::where('id_user', Auth::user()->id)->get();
        $jumlah = CatatanProduk::where('id_user', Auth::user()->id)->sum('berat');
        return view('peternak_maggot.produks', ['title' => 'History Produk', 'history' => $history, 'jumlah_hasil' => $jumlah]);
    }

    public function catatanProduk(){
        $jumlah = CatatanProduk::where('id_user', Auth::user()->id)->sum('berat');
        return view('peternak_maggot.catatProduk', ['title' => 'Tambah Produk', 'jumlah_hasil' => $jumlah]);
    }

    public function catat(Request $request){
        $validatedData = $request->validate([
            'berat' => 'required|max:255',
            'detail' => 'max:255'
        ]);
        
        $validatedData['id_user'] = Auth::user()->id;
        
        CatatanProduk::create($validatedData);
        
        return redirect('/peternakmaggot/hasil')->with('success', 'Hasil Berhasil Ditambahkan');
    }
}
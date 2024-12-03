<?php

namespace App\Http\Controllers;

use App\Models\BankSampah;
use App\Models\TransaksiProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeternakController extends Controller
{
    public function sampahs(){
        $banksampah = BankSampah::all();
        return view('peternak_maggot.jumlahSampah', ['title'=>'Bank Sampah', 'banks'=>$banksampah]);
    }

    public function produks(){
        // $banksampah = BankSampah::where('admin', Auth::user()->id)->get();
        // return view('admin_bank_sampah.index', ['title' => 'home', 'banks' => $banksampah]);
    }

    public function bank($id)
    {
        $banksampah = BankSampah::where('id', $id)->first();
        // $mutasiSampah = TransaksiSampah::with('users')->where('id_bnksmph', $banksampah->id)->get();
        // $produks = Produk::where('bank', $banksampah->id)->get();
        // $penjualan = TransaksiProduk::with('users')->with('produks')->where('id_bnksmph', $banksampah->id)->get();
        // return view('admin_bank_sampah.bankSampah', [
        //     'title' => $banksampah->nama,
        //     'bank' => $banksampah,
        //     'mutasi' => $mutasiSampah,
        //     'produks' => $produks,
        //     'penjualan' => $penjualan,
        // ]);
    }
    public function updateStatus(Request $request, $id)
    {
        // $validated = $request->validate([
        //     'status' => 'required|boolean',
        // ]);
        // $transaksi = TransaksiSampah::find($id);
        // $bank = BankSampah::find($transaksi->id_bnksmph);
        // $user = User::find($transaksi->id_user);
        // if ($transaksi && $bank && $user) {
        //     $transaksi->status = $validated['status'];
        //     $transaksi->save();
        //     $bank->totalSampah = $bank->totalSampah + $transaksi->berat;
        //     $bank->save();
        //     $user->poin = $user->poin + ($transaksi->berat / 10);
        //     $user->save();
        //     return redirect()->route('bankSampah.byIndex', $transaksi->id_bnksmph)->with('success', 'Status updated successfully');
        // }
        // return redirect()->route('bankSampah.index')->with('error', 'Transaction not found');
    }
}
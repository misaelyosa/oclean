<?php

namespace App\Http\Controllers;

use App\Models\BankSampah;
use App\Models\Produk;
use App\Models\TransaksiProduk;
use App\Models\TransaksiSampah;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BankSampahController extends Controller
{
    public function index()
    {
        $banksampah = BankSampah::where('admin', Auth::user()->id)->get();
        return view('admin_bank_sampah.index', ['title' => 'home', 'banks' => $banksampah]);
    }
    public function BankID($id)
    {
        $banksampah = BankSampah::where('id', $id)->first();
        $mutasiSampah = TransaksiSampah::with('users')->where('id_bnksmph', $banksampah->id)->get();
        $produks = Produk::where('bank', $banksampah->id)->get();
        $penjualan = TransaksiProduk::with('users')->with('produks')->where('id_bnksmph', $banksampah->id)->get();
        return view('admin_bank_sampah.bankSampah', [
            'title' => $banksampah->nama,
            'bank' => $banksampah,
            'mutasi' => $mutasiSampah,
            'produks' => $produks,
            'penjualan' => $penjualan,
        ]);
    }
    public function updateStatus(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required|boolean',
        ]);
        $transaksi = TransaksiSampah::with('users')->where('id', $id)->first();
        $bank = BankSampah::where('id', $transaksi->id_bnksmph)->first();
        $user = User::find($transaksi->user_id);
        if ($transaksi && $bank && $user) {
            $transaksi->status = $validated['status'];
            $transaksi->save();
            $bank->totalSampah = $bank->totalSampah + $transaksi->berat;
            $bank->save();
            $user->poin = $user->poin + ($transaksi->berat / 10);
            $user->save();
            return redirect()->route('bankSampah.byIndex', $transaksi->id_bnksmph)->with('success', 'Status updated successfully');
        }
        return redirect()->route('bankSampah.index')->with('error', 'Transaction not found');
    }
}

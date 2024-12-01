<?php

namespace App\Http\Controllers;

use App\Models\BankSampah;
use App\Models\TransaksiSampah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BankSampahController extends Controller
{
    public function index(){
        $banksampah = BankSampah::where('admin', Auth::user()->id)->get();
        return view('admin_bank_sampah.index', ['title'=>'home', 'banks'=>$banksampah]);
    }
    public function BankID($id){
        $banksampah = BankSampah::where('id', $id)->first();
        $mutasi = TransaksiSampah::with('users')->where('id_bnksmph', $banksampah->id)->get();
        return view('admin_bank_sampah.bankSampah', ['title'=>$banksampah->nama, 'bank'=>$banksampah, 'mutasi'=>$mutasi]);
    }
    public function updateStatus(Request $request, $id){
        $validated = $request->validate([
            'status' => 'required|boolean',
        ]);
        $transaksi = TransaksiSampah::find($id);
        if ($transaksi) {
            $transaksi->status = $validated['status'];
            $transaksi->save();
            return redirect()->route('bankSampah.byIndex', $transaksi->id_bnksmph)->with('success', 'Status updated successfully');
        }
        return redirect()->route('bankSampah.index')->with('error', 'Transaction not found');
    }
}

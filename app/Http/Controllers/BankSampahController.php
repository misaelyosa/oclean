<?php

namespace App\Http\Controllers;

use App\Models\BankSampah;
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
        return view('admin_bank_sampah.bankSampah', ['title'=>$banksampah->nama, 'bank'=>$banksampah]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Sampah;
use App\Models\TransaksiSampah;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class SampahController extends Controller
{
    public function show(){
        $id = Auth::user()->id;
        $user = User::findOrFail($id);

        $sampah = $user->transaksiSampah;
        // dd($sampah);
        $title = "sampah";

        return view('user.sampah', compact('sampah', 'title'));
    }

    public function insert(Request $r){
        $id = Auth::user()->id;

        $r->validate([
            'berat' => 'required|numeric',
            'foto' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);

        $sampah = new TransaksiSampah;
        $sampah->user_id = $id;
        $sampah->id_bnksmph = 1;
        $sampah->berat = $r->berat;

        $imageName = time().'.'.$r->foto->extension();
        $r->foto->move(public_path('foto_sampah'), $imageName);
        $sampah->foto = 'foto_sampah/' . $imageName;

        $sampah->save();

        return redirect('/sampah')->with('success', 'Data inserted successfully!');
    }
}

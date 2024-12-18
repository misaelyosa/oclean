<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function update(Request $request, $id)
    {
        $request->validate([
            'jumlah' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
        ]);

        $produk = Produk::findOrFail($id);
        $produk->jumlah = $request->jumlah;
        $produk->harga = $request->harga;
        $produk->save();

        return redirect()->back()->with('success', 'Produk berhasil diperbarui.');
    }
}

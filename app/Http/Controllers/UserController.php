<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Roles;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use App\Models\Produk;

use function Laravel\Prompts\search;

class UserController extends Controller
{
    public function index(){
  
        return view('user.index', ['title'=>'home']);
    }
    public function indexShop(){
        // dd(request('search'));
        $produk = Produk::all();
        $query = Produk::query();
        if(request('search')){
            $query->where('namaProduk', 'like', '%' . request('search') . '%');
        }
        $produk = $query->get();
        // dd($produk);

        return view('user.shop', ['title'=>'shop', 'produk' => $produk]);
    }
    public function indexCustServ(){
  
        return view('user.customer_service', ['title'=>'custserv']);
    }
    public function indexPickUp(){
  
        return view('user.pickup_sampah', ['title'=>'pickup']);
    }

    public function showTransaksi(){
        $id = Auth::user()->id;
        $user = User::findOrFail($id);

        $transaksi = $user->TransaksiProduk;

        $title = "transaksi";

        return view('user.pickup_sampah', compact('transaksi', 'title'));

    }
    //===================================================================== SUPERADMIN ==========================================================================

    public function showUsers()
    {
        $users = User::where('role', 4)->get();
        return view('superadmin/tableuser', ['users' => $users]);
    }
    
    public function showPeternakMaggot()
    {
        $users = User::where('role', 3)->get();
        return view('superadmin/tableuser', ['users' => $users]);
    }

    public function showAdminBankSampah()
    {
        $users = User::where('role', 2)->get();
        return view('superadmin/tableuser', ['users' => $users]);
    }

    public function create()
    {
        $users = User::get();
        return view('superadmin/create')->with('users', $users);
    }

    public function insert(Request $r)
    {
        $validatedData = $r->validate([
            'name' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'umur' => 'required|integer',
            'gender' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'no_telp' => 'required|string',
            'poin' => 'required|integer',
            'id_lokasi' => 'required|integer', 
            'role' => 'required|integer',
        ]);

        $user = new User;
        $user->name = $validatedData['name'];
        $user->alamat = $validatedData['alamat'];
        $user->umur = $validatedData['umur'];
        $user->gender = $validatedData['gender'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']);
        $user->no_telp = $validatedData['no_telp'];
        $user->poin = $validatedData['poin'];
        $user->id_lokasi = $validatedData['id_lokasi'];
        $user->role = $validatedData['role'];
        $user->save();

        return redirect()->route("superadmin")->with("success", "Pengguna berhasil ditambahkan!");
    }

    public function edit($id)
    {
        $user = User::findOrFail($id); 
        return view('superadmin/edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id); 
        $user->name = $request->name;
        $user->alamat = $request->alamat;
        $user->umur = $request->umur;
        $user->gender = $request->gender;
        $user->email = $request->email;
        $user->no_telp = $request->no_telp;
        $user->poin = $request->poin;
        $user->role = $request->role;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();
        return redirect()->route("superadmin")->with("success", "Pengguna berhasil diupdate!");
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('superadmin')->with('success', 'Pengguna berhasil dihapus.');
    }

//===========================================================================================================================================================
}

<?php


use App\Http\Controllers\BankSampahController;
use App\Http\Controllers\SampahController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PeternakController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;

use function PHPUnit\Framework\returnSelf;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//LANDING PAGE
Route::get('/', function () {
    return view('home',[
        'title'=>'home'
    ]);
})->name('home');
Route::get('/home', function () {
    return view('home',[
        'title'=>'home'
    ]);
})->name('home');


Route::middleware('guest')->group(function(){
    //register
    Route::get('/register', function () {
        return view('register.index');
    });
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
    
    //login
    Route::get('/login', function() {
        return view('login.index');
    })->name('login.index');
    Route::post('/login', [LoginController::class, 'authenticate']);
});

Route::middleware('auth')->group(function(){
    Route::post('/logout', [LoginController::class, 'logout']);
});

//USER
Route::middleware('role:user')->group(function(){
    Route::get('/user/shop',[UserController::class,'indexShop'])->name('user.shop');
    Route::get('/user/pickup',[UserController::class,'showTransaksi'])->name('user.transaksi');
    Route::get('/user/custserv',[UserController::class,'indexCustServ'])->name('user.custserv');
    Route::get("/profile", function(){
        return view ('user.profile', ['title' =>'profile']);
    })->name('profile');
    Route::post('user/shop/{produk:id}',[ShopController::class,'buy'])->name('shop.beli');

    // Route::get("/sampah", function(){
    //     return view ('user.sampah');
    // })->name('sampah');
    Route::get("/sampah",[SampahController::class, 'show'])->name('user.sampah');
    Route::post('/inputSampah', [SampahController::class, 'insert'])->name('user.inputSampah');
    Route::get('/user',[UserController::class,'index'])->name('user.index');
    Route::post('/editProfile', [RegisterController::class, 'edit'])->name('editProfile');
});

//SUPERADMIN
Route::middleware('role:superadmin')->group(function(){
    Route::get('/superadmin', function() {
        return view('superadmin.index');
    });
});

//ADMIN BANK SAMPAH
Route::middleware('role:admin_bank_sampah')->group(function(){
    Route::get('/banksampah',[BankSampahController::class,'index'])->name('bankSampah.index');
    Route::get('/banksampah/{id}',[BankSampahController::class,'BankID'])->name('bankSampah.byIndex');
    Route::post('/banksampah/validate/{id}',[BankSampahController::class,'updateStatus'])->name('bankSampah.validasi');
});

//PETERNAK MAGGOT
Route::middleware('role:peternak_maggot')->group(function(){
    Route::get('/peternakmaggot',[PeternakController::class,'index'])->name('peternakmaggot.index');

    Route::get('/peternakmaggot/sampah',[PeternakController::class,'sampahs'])->name('jumlahSampah.index');
    Route::get('/peternakmaggot/sampah/{id}',[PeternakController::class,'bank'])->name('jumlahSampah.byIndex');
    Route::post('/peternakmaggot/sampah/{id}', [PeternakController::class, 'requestSampah'])->name('jumlahSampah.request');
    
    Route::get('/peternakmaggot/hasil',[PeternakController::class,'produks'])->name('produks.index');
    Route::get('/peternakmaggot/hasil/tambah',[PeternakController::class,'catatanProduk'])->name('catatanProduk.index');
    Route::post('/peternakmaggot/hasil/tambah',[PeternakController::class,'catat'])->name('catatProduk.create');
});

//======================================= SUPERADMIN ==================================================
Route::get('/tableuser', [UserController::class, 'showUsers'])->name('tableuser');
Route::get('/tablepeternak', [UserController::class, 'showPeternakMaggot'])->name('tablepeternak');
Route::get('/tableadmin', [UserController::class, 'showAdminBankSampah'])->name('tableadmin');

Route::get('/create', [UserController::class, 'create'])->name('user.create');
Route::post('user/insert', [UserController::class, 'insert'])->name('user.insert');

Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::put('user/update/{id}', [UserController::class, 'update'])->name('user.update');

Route::delete('user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');
//=====================================================================================================
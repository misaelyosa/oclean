<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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
    ])->name('home');
});
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
    });
    Route::post('/login', [LoginController::class, 'authenticate']);
});

Route::middleware('auth')->group(function(){
    Route::post('/logout', [LoginController::class, 'logout']);
});

//USER
Route::middleware('role:user')->group(function(){
    Route::get('/user/shop',[UserController::class,'indexShop'])->name('user.shop');
    Route::get('/user/pickup',[UserController::class,'indexPickUp'])->name('user.pickup');
    Route::get('/user/custserv',[UserController::class,'indexCustServ'])->name('user.custserv');

    Route::get("/profile", function(){
        return view ('user.profile');
    })->name('profile');
    Route::get('/user',[UserController::class,'index'])->name('user.index');
    Route::post('/editProfile', [RegisterController::class, 'edit'])->name('editProfile');
});

//SUPERADMIN
Route::middleware('role:superadmin')->group(function(){
    Route::get('superadmin', function() {
        return view('superadmin.index');
    });
});

//ADMIN BANK SAMPAH
Route::get('/banksampah', function () {
    return view('admin_bank_sampah.index');
});
Route::middleware('role: admin_bank_sampah')->group(function(){
});

//PETERNAK MAGGOT
Route::middleware('role:peternak_maggot')->group(function(){
    Route::get('/peternakmaggot' , function(){
        return view('peternak_maggot.index');
    });
});


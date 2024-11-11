<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', function () {
    return view('register.index');
});
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/login', function() {
    return view('login.index');
});
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/home', function () {
    return view('home');
});

// Route::middleware('role : user')->group((function () {

// }));
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BukuController;


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

// Grup middleware untuk rute yang hanya dapat diakses oleh guest
Route::middleware(['guest'])->group(function () {
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register');
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
});

// Grup middleware untuk rute yang hanya dapat diakses oleh pengguna yang sudah terautentikasi
Route::middleware(['auth'])->group(function () {
    Route::get('/table', [BukuController::class, 'show'])->name('table');
    Route::get('/form', [BukuController::class, 'create'])->name('form');
    Route::post('/submit-form', [BukuController::class, 'store'])->name('submit-form');
    Route::get('/kategori', [BukuController::class, 'kategory'])->name('kategori');
    Route::delete('/buku/{buku}', [BukuController::class, 'destroy'])->name('buku.destroy');
    Route::put('/buku/{buku}', [BukuController::class, 'update'])->name('buku.update');
    Route::get('/buku/{buku}/edit', [BukuController::class, 'edit'])->name('buku.edit');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

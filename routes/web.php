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

Route::get('/register', function(){
    return view('register');
});

Route::get('/login', function(){
    return view('login');
});

Route::get('/table', function(){
    return view('table');
});

Route::get('/form', function(){
    return view('form');
});

Route::get('/kategori', function(){
    return view('kategori');
});

Route::get('/register', [RegisterController::class, 'create'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->name('register')->middleware('guest');
Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login')->middleware('guest');

Route::post('/submit-form', [BukuController::class, 'store'])->name('submit-form');
Route::get('/form', [BukuController::class, 'create'])->name('form');
Route::get('/table', [BukuController::class, 'show'])->name('table');

Route::get('/kategori', [BukuController::class, 'kategory'])->name('kategori');
Route::delete('/buku/{buku}', [BukuController::class, 'destroy'])->name('buku.destroy');

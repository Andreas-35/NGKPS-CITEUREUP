<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResidentsController;
use App\Http\Controllers\KegiatanGerejaController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ForgotPasswordController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('pages.dashboard');
});

// ANGGOTA
Route::resource('resident', ResidentsController::class);
Route::get('/resident',[ResidentsController::class, 'index']);
Route::get('/resident/create',[ResidentsController::class, 'create']);
Route::get('/resident/{id}',[ResidentsController::class, 'edit']);
Route::post('/resident',[ResidentsController::class, 'store']);
Route::put('/resident/{id}',[ResidentsController::class, 'update']);
Route::delete('/resident/{id}',[ResidentsController::class, 'delete']);

// KEGIATAN
Route::resource('kegiatan', KegiatanGerejaController::class);

// TRANSAKSI
Route::resource('transaksi', TransaksiController::class);
Route::get('/laporan-transaksi', [TransaksiController::class, 'laporan'])->name('transaksi.laporan')->middleware('auth');

// lOGIN
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Contoh route dashboard (hanya bisa diakses jika sudah login)
Route::get('/dashboard', function () {
    return view('pages.dashboard');
})->middleware('auth');

// REGISTER
Route::get('/register', [RegisterController::class, 'showForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');   

// FORGOT PASSWORD
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VegetableController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;

// Rute untuk halaman home
Route::get('/', function () {
    return view('home');
});

// Rute untuk landing page
Route::get('/landing-page', function () {
    return view('landing-page');
});

// Rute untuk halaman index sayur dengan middleware auth
Route::prefix('vegetables')->middleware('auth')->group(function () {
    Route::get('/', [VegetableController::class, 'index'])->name('vegetable.index'); // Menampilkan daftar sayur
    Route::get('/create', [VegetableController::class, 'create'])->name('vegetable.create'); // Form untuk menambah sayur
    Route::post('/store', [VegetableController::class, 'store'])->name('vegetable.store'); // Menyimpan sayur baru
    Route::get('/{id}/edit', [VegetableController::class, 'edit'])->name('vegetable.edit'); // Form untuk mengedit sayur
    Route::put('/{id}', [VegetableController::class, 'update'])->name('vegetable.update'); // Memperbarui sayur
    Route::delete('/{id}', [VegetableController::class, 'destroy'])->name('vegetable.destroy'); // Menghapus sayur
});

// Rute untuk kelola akun pengguna dengan middleware auth
Route::prefix('users')->middleware('auth')->group(function () {
    Route::get('/', [UsersController::class, 'index'])->name('users.index'); // Menampilkan daftar akun pengguna
    Route::get('/create', [UsersController::class, 'create'])->name('users.create'); // Form untuk membuat akun baru
    Route::post('/', [UsersController::class, 'store'])->name('users.store'); // Menyimpan akun baru
    Route::get('/{id}/edit', [UsersController::class, 'edit'])->name('users.edit'); // Form untuk mengedit akun
    Route::put('/{id}', [UsersController::class, 'update'])->name('users.update'); // Memperbarui akun
    Route::delete('/{id}', [UsersController::class, 'destroy'])->name('users.destroy'); // Menghapus akun
});

// Rute untuk logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/'); // Kembali ke halaman login setelah logout
})->name('logout');

// Rute untuk menampilkan form login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Rute untuk memproses login
Route::post('/login', [LoginController::class, 'login']);
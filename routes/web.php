<?php

use App\Http\Controllers\Admin\AnggotaController as AdminAnggotaController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GaleriController as AdminGaleriController;
use App\Http\Controllers\Admin\ProkerController as AdminProkerController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\ProkerController;
use Illuminate\Support\Facades\Route;

// Halaman publik
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profil', [HomeController::class, 'profil'])->name('profil');

Route::get('/proker', [ProkerController::class, 'index'])->name('proker.index');
Route::get('/proker/{proker}', [ProkerController::class, 'show'])->name('proker.show');

Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');

Route::get('/anggota', [AnggotaController::class, 'index'])->name('anggota.index');
Route::get('/daftar-anggota', [PendaftaranController::class, 'create'])->name('anggota.daftar');
Route::post('/daftar-anggota', [PendaftaranController::class, 'store'])->name('anggota.daftar.store');

// Login admin
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);

    Route::get('/forgot-password', [ForgotPasswordController::class, 'create'])->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])->name('password.email');
    Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'edit'])->name('password.reset');
    Route::post('/reset-password', [ForgotPasswordController::class, 'update'])->name('password.update');
});
Route::post('/logout', [LoginController::class, 'destroy'])->middleware('auth')->name('logout');

// Panel admin
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/proker', [AdminProkerController::class, 'index'])->name('proker.index');
    Route::get('/proker/tambah', [AdminProkerController::class, 'create'])->name('proker.create');
    Route::post('/proker', [AdminProkerController::class, 'store'])->name('proker.store');
    Route::get('/proker/{proker}/ubah', [AdminProkerController::class, 'edit'])->name('proker.edit');
    Route::put('/proker/{proker}', [AdminProkerController::class, 'update'])->name('proker.update');
    Route::delete('/proker/{proker}', [AdminProkerController::class, 'destroy'])->name('proker.destroy');

    Route::get('/galeri', [AdminGaleriController::class, 'index'])->name('galeri.index');
    Route::get('/galeri/tambah', [AdminGaleriController::class, 'create'])->name('galeri.create');
    Route::post('/galeri', [AdminGaleriController::class, 'store'])->name('galeri.store');
    Route::get('/galeri/{galeri}/ubah', [AdminGaleriController::class, 'edit'])->name('galeri.edit');
    Route::put('/galeri/{galeri}', [AdminGaleriController::class, 'update'])->name('galeri.update');
    Route::delete('/galeri/{galeri}', [AdminGaleriController::class, 'destroy'])->name('galeri.destroy');

    Route::get('/anggota', [AdminAnggotaController::class, 'index'])->name('anggota.index');
    Route::get('/anggota/tambah', [AdminAnggotaController::class, 'create'])->name('anggota.create');
    Route::post('/anggota', [AdminAnggotaController::class, 'store'])->name('anggota.store');
    Route::get('/anggota/{anggota}/ubah', [AdminAnggotaController::class, 'edit'])->name('anggota.edit');
    Route::put('/anggota/{anggota}', [AdminAnggotaController::class, 'update'])->name('anggota.update');
    Route::patch('/anggota/{anggota}/verifikasi', [AdminAnggotaController::class, 'verify'])->name('anggota.verify');
    Route::delete('/anggota/{anggota}', [AdminAnggotaController::class, 'destroy'])->name('anggota.destroy');
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\SkemaSertifikasiController;
use App\Http\Controllers\UserProfileController;

// Halaman awal

Route::get('/', function () {
    return view('welcome');
});

// DASHBOARD DAN FITUR ADMIN
Route::middleware(['auth', 'admin'])->group(function () {

    // Dashboard Admin
    Route::get('/dashboard', function () {
        $totalPeserta = \App\Models\Peserta::count();
        $totalSkema = \App\Models\SkemaSertifikasi::count();

        return view('dashboard', compact(
            'totalPeserta',
            'totalSkema'
        ));
    })->name('dashboard');

    // CRUD Peserta
    Route::resource('peserta', PesertaController::class)
    ->parameters(['peserta' => 'peserta']);

    // CRUD Skema Sertifikasi
    Route::resource('skema', SkemaSertifikasiController::class);
});

// DASHBOARD DAN DATA DIRI USER
Route::middleware(['auth'])->prefix('user')->name('user.')->group(function () {

    // Dashboard User
    Route::get('/dashboard', [
        UserProfileController::class,
        'index'
    ])->name('dashboard');

    // Form Edit Data Diri
    Route::get('/profil/edit', [
        UserProfileController::class,
        'edit'
    ])->name('profile.edit');

    // Simpan Perubahan Data Diri
    Route::put('/profil', [
        UserProfileController::class,
        'update'
    ])->name('profile.update');
});

// Route Login dan Register
require __DIR__.'/auth.php';
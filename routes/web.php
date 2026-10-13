<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\SkemaSertifikasiController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {

    // DASHBOARD ADMIN
    Route::get('/dashboard', function () {
        $totalPeserta = \App\Models\Peserta::count();
        $totalSkema = \App\Models\SkemaSertifikasi::count();

        return view('dashboard', compact('totalPeserta', 'totalSkema'));
    })->name('dashboard');

    // DASHBOARD USER
    Route::get('/user/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');

    // PROFIL USER
    Route::get('/user/profile', function () {
        return view('user.profile');
    })->name('user.profile');

    // HALAMAN EDIT PROFIL
    Route::get('/user/profile/edit', function () {
        return view('user.editprofile');
    })->name('user.profile.edit');

    // SIMPAN PERUBAHAN PROFIL
    Route::patch('/user/profile', function (Request $request) {
        $user = $request->user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        ], [
            'name.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email tersebut sudah digunakan.',
        ]);

        $user->update($validated);

        return redirect()
            ->route('user.profile.edit')
            ->with('success', 'Profil berhasil diperbarui.');
    })->name('user.profile.update');

    // CRUD PESERTA
    Route::resource('peserta', PesertaController::class)
        ->parameters(['peserta' => 'peserta']);

    // CRUD SKEMA SERTIFIKASI
    Route::resource('skema', SkemaSertifikasiController::class);

    // PROFILE BAWAAN
    Route::get('/profile', function () {
        return redirect()->route('user.profile');
    })->name('profile.edit');

});

require __DIR__.'/auth.php';
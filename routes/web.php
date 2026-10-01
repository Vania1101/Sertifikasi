<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\SkemaSertifikasiController;

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        $totalPeserta = \App\Models\Peserta::count();
        $totalSkema = \App\Models\SkemaSertifikasi::count();

        return view('dashboard', compact('totalPeserta', 'totalSkema'));
    })->name('dashboard');

    Route::resource('peserta', PesertaController::class)
        ->parameters(['peserta' => 'peserta']);

    Route::resource('skema', SkemaSertifikasiController::class);
});

require __DIR__.'/auth.php';

Route::get('/profile', function () {
    return redirect()->route('dashboard');
})->name('profile.edit');
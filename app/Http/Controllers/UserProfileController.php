<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserProfileController extends Controller
{
    public function index(Request $request)
    {
        $peserta = $request->user()
        ->peserta()
        ->with('skema')
        ->firstOrFail();

        return view('user.dashboard',compact('peserta'));
    }

    public function edit(Request $request)
    {
        $peserta = $request->user()
        ->peserta()
        ->with('skema')
        ->firstOrFail();

        return view('user.edit',compact('peserta'));
    }

    public function update(Request $request)
    {
        $user = $request->user();

        // Ambil hanya peserta milik akun yang login.
        $peserta = $user->peserta()->firstOrFail();

        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
                Rule::unique('pesertas', 'email')->ignore($peserta->id),
            ],
            'jenis_kelamin' => [
                'required',
                Rule::in(['Laki-laki', 'Perempuan']),
            ],
            'no_hp' => ['required', 'string', 'max:20'],
            'tanggal_lahir' => ['required', 'date'],
            'alamat' => ['required', 'string'],
        ]);

        \Illuminate\Support\Facades\DB::transaction(
            function () use ($user, $peserta, $validated) {
                $peserta->update($validated);

                // Sinkronkan nama dan email akun login.
                $user->name = $validated['nama'];
                $user->email = $validated['email'];
                $user->save();
            }
        );

        return redirect()
            ->route('user.dashboard')
            ->with('success', 'Data diri berhasil diperbarui.');
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Peserta;
use App\Models\SkemaSertifikasi;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        $skemas = SkemaSertifikasi::orderBy('nama_skema')->get();

        return view('auth.register', compact('skemas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:50'],
            'nisn' => [
                'required',
                'string',
                'max:10',
                Rule::unique('pesertas', 'nisn'),
            ],
            'jenis_kelamin' => [
                'required',
                Rule::in(['Laki-laki', 'Perempuan']),
            ],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('pesertas', 'email'),
                Rule::unique('users', 'email'),
            ],
            'no_hp' => ['required', 'string', 'max:13'],
            'tanggal_lahir' => ['required', 'date', 'before_or_equal:today'],
            'alamat' => ['required', 'string'],
            'skema_sertifikasi_id' => [
                'required',
                'exists:skema_sertifikasis,id',
            ],
            'password' => ['required', 'confirmed', 'min:8'],
        ], [
            'nama.required' => 'Nama lengkap wajib diisi.',
            'nisn.required' => 'NISN wajib diisi.',
            'nisn.unique' => 'NISN tersebut sudah terdaftar.',
            'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih.',
            'jenis_kelamin.in' => 'Pilihan jenis kelamin tidak valid.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email tersebut sudah digunakan.',
            'no_hp.required' => 'Nomor HP wajib diisi.',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',
            'tanggal_lahir.before_or_equal' => 'Tanggal lahir tidak boleh melebihi hari ini.',
            'alamat.required' => 'Alamat wajib diisi.',
            'skema_sertifikasi_id.required' => 'Skema sertifikasi wajib dipilih.',
            'skema_sertifikasi_id.exists' => 'Skema sertifikasi yang dipilih tidak valid.',
            'password.required' => 'Password wajib diisi.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'password.min' => 'Password minimal 8 karakter.',
        ]);

        $user = DB::transaction(function () use ($request) {
            $user = User::create([
                'name' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'user',
            ]);

            Peserta::create([
                'user_id' => $user->id,
                'nama' => $request->nama,
                'nisn' => $request->nisn,
                'jenis_kelamin' => $request->jenis_kelamin,
                'email' => $request->email,
                'no_hp' => $request->no_hp,
                'tanggal_lahir' => $request->tanggal_lahir,
                'alamat' => $request->alamat,
                'skema_sertifikasi_id' => $request->skema_sertifikasi_id,
            ]);

            return $user;
        });

        event(new Registered($user));

        return redirect()->route('login')
            ->with('status', 'Registrasi berhasil! Silakan login menggunakan email dan password kamu.');
    }
}

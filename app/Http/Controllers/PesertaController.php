<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\SkemaSertifikasi;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PesertaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $pesertas = Peserta::with('skema')
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('nama', 'like', '%' . $search . '%')
                      ->orWhere('nisn', 'like', '%' . $search . '%')
                      ->orWhere('email', 'like', '%' . $search . '%');
                });
            })
            ->latest()
            ->get();

        return view('peserta.index', compact('pesertas', 'search'));
    }

    public function create()
    {
        $skemas = SkemaSertifikasi::all();

        return view('peserta.create', compact('skemas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nisn' => 'required|string|max:20',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'email' => 'required|email|max:255|unique:pesertas,email',
            'no_hp' => 'required|string|max:20',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'skema_sertifikasi_id' => 'required|exists:skema_sertifikasis,id',
        ], [
            'nama.required' => 'Nama peserta wajib diisi.',
            'nama.string' => 'Nama peserta harus berupa teks.',
            'nama.max' => 'Nama peserta maksimal 255 karakter.',
            'nisn.required' => 'NISN wajib diisi.',
            'nisn.max' => 'NISN maksimal 20 karakter.',
            'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih.',
            'jenis_kelamin.in' => 'Jenis kelamin harus Laki-laki atau Perempuan.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.max' => 'Email maksimal 255 karakter.',
            'email.unique' => 'Email tersebut sudah terdaftar.',
            'no_hp.required' => 'Nomor HP wajib diisi.',
            'no_hp.max' => 'Nomor HP maksimal 20 karakter.',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',
            'tanggal_lahir.date' => 'Format tanggal lahir tidak valid.',
            'alamat.required' => 'Alamat wajib diisi.',
            'skema_sertifikasi_id.required' => 'Skema sertifikasi wajib dipilih.',
            'skema_sertifikasi_id.exists' => 'Skema sertifikasi tidak ditemukan.',
        ]);

        Peserta::create($validated);

        return redirect()
            ->route('peserta.index')
            ->with('success', 'Data peserta berhasil ditambahkan.');
    }

    public function show(Peserta $peserta)
    {
        $peserta->load('skema');

        return view('peserta.show', compact('peserta'));
    }

    public function edit(Peserta $peserta)
    {
        $skemas = SkemaSertifikasi::all();

        return view('peserta.edit', compact('peserta', 'skemas'));
    }

    public function update(Request $request, Peserta $peserta)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nisn' => 'required|string|max:20',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('pesertas', 'email')->ignore($peserta->id),
            ],
            'no_hp' => 'required|string|max:20',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'skema_sertifikasi_id' => 'required|exists:skema_sertifikasis,id',
        ], [
            'nama.required' => 'Nama peserta wajib diisi.',
            'nama.string' => 'Nama peserta harus berupa teks.',
            'nama.max' => 'Nama peserta maksimal 255 karakter.',
            'nisn.required' => 'NISN wajib diisi.',
            'nisn.max' => 'NISN maksimal 20 karakter.',
            'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih.',
            'jenis_kelamin.in' => 'Jenis kelamin harus Laki-laki atau Perempuan.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.max' => 'Email maksimal 255 karakter.',
            'email.unique' => 'Email tersebut sudah digunakan oleh peserta lain.',
            'no_hp.required' => 'Nomor HP wajib diisi.',
            'no_hp.max' => 'Nomor HP maksimal 20 karakter.',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',
            'tanggal_lahir.date' => 'Format tanggal lahir tidak valid.',
            'alamat.required' => 'Alamat wajib diisi.',
            'skema_sertifikasi_id.required' => 'Skema sertifikasi wajib dipilih.',
            'skema_sertifikasi_id.exists' => 'Skema sertifikasi tidak ditemukan.',
        ]);

        $peserta->update($validated);

        return redirect()
            ->route('peserta.index')
            ->with('success', 'Data peserta berhasil diperbarui.');
    }

    public function destroy(Peserta $peserta)
    {
        $peserta->delete();

        return redirect()
            ->route('peserta.index')
            ->with('success', 'Data peserta berhasil dihapus.');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\SkemaSertifikasi;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pesertas = Peserta::with('skema')->latest()->get();

        return view('peserta.index', compact('pesertas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $skemas = SkemaSertifikasi::latest()->get();
        return view('peserta.create', compact('skemas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'nama' => 'required|string|max:255',
        'nisn' => 'required|string|max:20|unique:pesertas,nisn',
        'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        'email' => 'required|email|max:255|unique:pesertas,email',
        'no_hp' => 'required|string|max:20',
        'tanggal_lahir' => 'required|date',
        'alamat' => 'required|string',
        'skema_sertifikasi_id' => 'required|exists:skema_sertifikasis,id',
    ]);

    Peserta::create($validated);

    return redirect()
        ->route('peserta.index')
        ->with('success', 'Peserta berhasil disimpan.');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $peserta = Peserta::with('skema')->findOrFail($id);
        return view('peserta.show', compact('peserta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $peserta = Peserta::findOrFail($id);
        $skemas = SkemaSertifikasi::latest()->get();
        return view('peserta.edit', compact('peserta','skemas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pesertas = Peserta::findOrFail($id);
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nisn' => [
                'required',
                'string',
                'max:20',
                Rule::unique('pesertas','nisn')->ignore($pesertas->id),
            ],
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('pesertas','email')->ignore($pesertas->id),
            ],
            'no_hp' => 'required|string|max:20',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'skema_sertifikasi_id' => 'required|exists:skema_sertifikasis,id',
        ]);

        $pesertas->update($validated);
        return redirect()
            ->route('peserta.index')
            ->with('success','Data peserta berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pesertas = Peserta::findOrFail($id);
        $pesertas->delete();
        return redirect()
            ->route('peserta.index')
            ->with('success','Peserta berhasil dihapus,');
    }
}

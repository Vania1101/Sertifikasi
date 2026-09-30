<?php

namespace App\Http\Controllers;

use App\Models\SkemaSertifikasi;
use Illuminate\Http\Request;

class SkemaSertifikasiController extends Controller
{
    public function index()
    {
        $skemas = SkemaSertifikasi::latest()->get();

        return view('skema.index', compact('skemas'));
    }

    public function create()
    {
        return view('skema.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_skema' => 'required',
            'nama_skema' => 'required',
            'deskripsi' => 'nullable',
        ]);

        SkemaSertifikasi::create([
            'kode_skema' => $request->kode_skema,
            'nama_skema' => $request->nama_skema,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()
            ->route('skema.index')
            ->with('success', 'Skema sertifikasi berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $skema = SkemaSertifikasi::findOrFail($id);

        return view('skema.show', compact('skema'));
    }

    public function edit(string $id)
    {
        $skema = SkemaSertifikasi::findOrFail($id);

        return view('skema.edit', compact('skema'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_skema' => 'required',
            'nama_skema' => 'required',
            'deskripsi' => 'nullable',
        ]);

        $skema = SkemaSertifikasi::findOrFail($id);

        $skema->update([
            'kode_skema' => $request->kode_skema,
            'nama_skema' => $request->nama_skema,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()
            ->route('skema.index')
            ->with('success', 'Skema sertifikasi berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $skema = SkemaSertifikasi::findOrFail($id);

        $skema->delete();

        return redirect()
            ->route('skema.index')
            ->with('success', 'Skema sertifikasi berhasil dihapus.');
    }
}
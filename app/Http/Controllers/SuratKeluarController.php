<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use Illuminate\Http\Request;

class SuratKeluarController extends Controller
{
    // Menampilkan daftar surat keluar (terbaru di atas)
    public function index()
    {
        $suratKeluar = SuratKeluar::orderBy('id', 'desc')->get();
        return view('surat-keluar.index', compact('suratKeluar'));
    }

    // Menampilkan form tambah surat keluar
    public function create()
    {
        return view('surat-keluar.create');
    }

    // Memproses dan menyimpan data surat keluar baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'tujuan' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        SuratKeluar::create($validated);

        return redirect()->route('surat-keluar.index')
            ->with('success', 'Surat keluar berhasil ditambahkan.');
    }

    // Menampilkan detail surat keluar berdasarkan ID (404 jika tidak ada)
    public function show($id)
    {
        $surat = SuratKeluar::findOrFail($id);
        return view('surat-keluar.show', compact('surat'));
    }

    // Menampilkan form edit berisi data lama
    public function edit($id)
    {
        $surat = SuratKeluar::findOrFail($id);
        return view('surat-keluar.edit', compact('surat'));
    }

    // Memproses dan menyimpan perubahan data surat keluar
    public function update(Request $request, $id)
    {
        $surat = SuratKeluar::findOrFail($id);

        $validated = $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'tujuan' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $surat->update($validated);

        return redirect()->route('surat-keluar.index')
            ->with('success', 'Surat keluar berhasil diperbarui.');
    }

    // Menghapus data surat keluar
    public function destroy($id)
    {
        $surat = SuratKeluar::findOrFail($id);
        $surat->delete();

        return redirect()->route('surat-keluar.index')
            ->with('success', 'Surat keluar berhasil dihapus.');
    }
}

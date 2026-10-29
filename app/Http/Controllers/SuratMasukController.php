<?php

namespace App\Controllers; // atau namespace App\Http\Controllers; tergantung struktur awalmu

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use Illuminate\Http\Request;

class SuratMasukController extends Controller
{

    public function dashboard()
    {
        $suratMasuk = SuratMasuk::all();
        
        return view('layouts.dashboard', compact('suratMasuk'));
    }
    public function index()
    {
        $suratMasuk = SuratMasuk::orderBy('id', 'desc')->get();
        return view('surat-masuk.index', compact('suratMasuk'));
    }

    public function create()
    {
        return view('surat-masuk.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'pengirim' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        SuratMasuk::create($validated);

        return redirect()->route('surat-masuk.index')
            ->with('success', 'Surat berhasil ditambahkan.');
    }

    public function show($id)
    {
        $surat = SuratMasuk::findOrFail($id);
        return view('surat-masuk.show', compact('surat'));
    }

    public function edit($id)
    {
        $surat = SuratMasuk::findOrFail($id);
        return view('surat-masuk.edit', compact('surat'));
    }

    public function update(Request $request, $id)
    {
        $surat = SuratMasuk::findOrFail($id);

        $validated = $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'pengirim' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $surat->update($validated);

        return redirect()->route('surat-masuk.index')
            ->with('success', 'Surat berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $surat = SuratMasuk::findOrFail($id);
        $surat->delete();

        return redirect()->route('surat-masuk.index')
            ->with('success', 'Surat berhasil dihapus.');
    }
}

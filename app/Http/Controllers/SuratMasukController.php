<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuratMasukController extends Controller
{

    public function dashboard()
    {
        $suratMasuk = SuratMasuk::all();
        
        return view('layouts.dashboard', compact('suratMasuk'));
    }
    public function index(Request $request)
    {
        $query = SuratMasuk::with('category');

        // Pencarian: nomor surat, pengirim, atau perihal
        if ($request->filled('q')) {
            $q = $request->input('q');
            $query->where(function ($builder) use ($q) {
                $builder->where('nomor_surat', 'like', "%{$q}%")
                    ->orWhere('pengirim', 'like', "%{$q}%")
                    ->orWhere('perihal', 'like', "%{$q}%");
            });
        }

        // Filter kategori
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->input('category_id'));
        }

        // withQueryString(): pencarian/filter tidak hilang saat pindah halaman
        $suratMasuk = $query->latest('id')->paginate(5)->withQueryString();
        $categories = Category::orderBy('nama')->get();

        return view('surat-masuk.index', compact('suratMasuk', 'categories'));
    }

    public function create()
    {
        $categories = Category::orderBy('nama')->get();
        return view('surat-masuk.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'pengirim' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'category_id' => 'nullable|exists:categories,id',
            'lampiran' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('lampiran')) {
            $validated['lampiran'] = $request->file('lampiran')
                ->store('lampiran-surat', 'public');
        }

        SuratMasuk::create($validated);

        return redirect()->route('surat-masuk.index')
            ->with('success', 'Surat berhasil ditambahkan.');
    }

    public function show($id)
    {
        $surat = SuratMasuk::with('category')->findOrFail($id);
        return view('surat-masuk.show', compact('surat'));
    }

    public function edit($id)
    {
        $surat = SuratMasuk::findOrFail($id);
        $categories = Category::orderBy('nama')->get();
        return view('surat-masuk.edit', compact('surat', 'categories'));
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
            'category_id' => 'nullable|exists:categories,id',
            'lampiran' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('lampiran')) {
            // Simpan file baru, update data, baru hapus file lama
            $pathLama = $surat->lampiran;
            $validated['lampiran'] = $request->file('lampiran')
                ->store('lampiran-surat', 'public');
            $surat->update($validated);
            if ($pathLama) {
                Storage::disk('public')->delete($pathLama);
            }
        } else {
            // Tidak ada file baru: pertahankan lampiran lama
            unset($validated['lampiran']);
            $surat->update($validated);
        }

        return redirect()->route('surat-masuk.index')
            ->with('success', 'Surat berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $surat = SuratMasuk::findOrFail($id);
        $path = $surat->lampiran;
        $surat->delete();

        // Hapus file lampiran setelah record berhasil dihapus
        if ($path) {
            Storage::disk('public')->delete($path);
        }

        return redirect()->route('surat-masuk.index')
            ->with('success', 'Surat berhasil dihapus.');
    }
}

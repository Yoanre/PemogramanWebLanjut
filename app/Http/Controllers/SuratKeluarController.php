<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuratKeluarController extends Controller
{
    // Menampilkan daftar surat keluar: cari, filter kategori, dan halaman
    public function index(Request $request)
    {
        $query = SuratKeluar::with('category');

        // Pencarian: nomor surat, tujuan, atau perihal
        if ($request->filled('q')) {
            $q = $request->input('q');
            $query->where(function ($builder) use ($q) {
                $builder->where('nomor_surat', 'like', "%{$q}%")
                    ->orWhere('tujuan', 'like', "%{$q}%")
                    ->orWhere('perihal', 'like', "%{$q}%");
            });
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->input('category_id'));
        }

        $suratKeluar = $query->latest('id')->paginate(5)->withQueryString();
        $categories = Category::orderBy('nama')->get();

        return view('surat-keluar.index', compact('suratKeluar', 'categories'));
    }

    // Menampilkan form tambah surat keluar
    public function create()
    {
        $categories = Category::orderBy('nama')->get();
        return view('surat-keluar.create', compact('categories'));
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
            'category_id' => 'nullable|exists:categories,id',
            'lampiran' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('lampiran')) {
            $validated['lampiran'] = $request->file('lampiran')
                ->store('lampiran-surat-keluar', 'public');
        }

        SuratKeluar::create($validated);

        return redirect()->route('surat-keluar.index')
            ->with('success', 'Surat keluar berhasil ditambahkan.');
    }

    // Menampilkan detail surat keluar berdasarkan ID (404 jika tidak ada)
    public function show($id)
    {
        $surat = SuratKeluar::with('category')->findOrFail($id);
        return view('surat-keluar.show', compact('surat'));
    }

    // Menampilkan form edit berisi data lama
    public function edit($id)
    {
        $surat = SuratKeluar::findOrFail($id);
        $categories = Category::orderBy('nama')->get();
        return view('surat-keluar.edit', compact('surat', 'categories'));
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
            'category_id' => 'nullable|exists:categories,id',
            'lampiran' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('lampiran')) {
            $pathLama = $surat->lampiran;
            $validated['lampiran'] = $request->file('lampiran')
                ->store('lampiran-surat-keluar', 'public');
            $surat->update($validated);
            if ($pathLama) {
                Storage::disk('public')->delete($pathLama);
            }
        } else {
            unset($validated['lampiran']);
            $surat->update($validated);
        }

        return redirect()->route('surat-keluar.index')
            ->with('success', 'Surat keluar berhasil diperbarui.');
    }

    // Menghapus data surat keluar
    public function destroy($id)
    {
        $surat = SuratKeluar::findOrFail($id);
        $path = $surat->lampiran;
        $surat->delete();

        if ($path) {
            Storage::disk('public')->delete($path);
        }

        return redirect()->route('surat-keluar.index')
            ->with('success', 'Surat keluar berhasil dihapus.');
    }
}

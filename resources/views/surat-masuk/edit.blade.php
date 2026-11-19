@extends('layouts.app')

@section('title', 'Edit Surat Masuk')

@section('content')
    <div class="max-w-3xl mx-auto px-4 py-8">
        <h1 class="text-3xl font-extrabold tracking-tight text-slate-900 mb-6">Edit Surat Masuk</h1>

        <form action="{{ route('surat-masuk.update', $surat->id) }}" method="POST" enctype="multipart/form-data" class="glass rounded-3xl p-6 sm:p-8 space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-slate-700">Nomor Surat</label>
                <input type="text" name="nomor_surat" value="{{ old('nomor_surat', $surat->nomor_surat) }}" class="glass-input mt-1 block w-full">
                @error('nomor_surat') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700">Tanggal</label>
                <input type="date" name="tanggal" value="{{ old('tanggal', $surat->tanggal) }}" class="glass-input mt-1 block w-full">
                @error('tanggal') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700">Pengirim</label>
                <input type="text" name="pengirim" value="{{ old('pengirim', $surat->pengirim) }}" class="glass-input mt-1 block w-full">
                @error('pengirim') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700">Perihal</label>
                <input type="text" name="perihal" value="{{ old('perihal', $surat->perihal) }}" class="glass-input mt-1 block w-full">
                @error('perihal') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700">Keterangan</label>
                <textarea name="keterangan" rows="3" class="glass-input mt-1 block w-full">{{ old('keterangan', $surat->keterangan) }}</textarea>
                @error('keterangan') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700">Kategori</label>
                <select name="category_id" class="glass-input mt-1 block w-full">
                    <option value="">-- Tanpa kategori --</option>
                    @foreach ($categories as $kategori)
                        <option value="{{ $kategori->id }}" @selected(old('category_id', $surat->category_id) == $kategori->id)>{{ $kategori->nama }}</option>
                    @endforeach
                </select>
                @error('category_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700">Lampiran <span class="font-normal text-slate-400">(PDF/JPG/PNG, maks. 2 MB)</span></label>
                <input type="file" name="lampiran" accept=".pdf,.jpg,.jpeg,.png"
                       class="glass-input mt-1 block w-full file:mr-4 file:rounded-full file:border-0 file:bg-indigo-600 file:px-4 file:py-1.5 file:text-sm file:font-semibold file:text-white hover:file:bg-indigo-700">
                @if ($surat->lampiran)
                    <p class="mt-1 text-xs text-slate-500">
                        Lampiran saat ini:
                        <a href="{{ asset('storage/' . $surat->lampiran) }}" target="_blank" rel="noopener" class="font-semibold text-indigo-600 hover:underline">Lihat lampiran</a>.
                        Pilih file baru untuk menggantinya.
                    </p>
                @endif
                @error('lampiran') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="flex items-center gap-4 pt-4">
                <button type="submit" class="btn-primary">Simpan Perubahan</button>
                <a href="{{ route('surat-masuk.index') }}" class="text-sm font-medium text-slate-600 hover:text-indigo-700 hover:underline">Batal</a>
            </div>
        </form>
    </div>
@endsection
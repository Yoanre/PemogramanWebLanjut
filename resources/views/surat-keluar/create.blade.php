@extends('layouts.app')

@section('title', 'Tambah Surat Keluar')

@section('content')
    <div class="max-w-3xl mx-auto px-4 py-8">
        <h1 class="text-3xl font-extrabold tracking-tight text-slate-900 mb-6">Tambah Surat Keluar</h1>

        <form action="{{ route('surat-keluar.store') }}" method="POST" class="glass rounded-3xl p-6 sm:p-8 space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium text-slate-700">Nomor Surat</label>
                <input type="text" name="nomor_surat" value="{{ old('nomor_surat') }}" class="glass-input mt-1 block w-full">
                @error('nomor_surat') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700">Tanggal</label>
                <input type="date" name="tanggal" value="{{ old('tanggal') }}" class="glass-input mt-1 block w-full">
                @error('tanggal') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700">Tujuan</label>
                <input type="text" name="tujuan" value="{{ old('tujuan') }}" class="glass-input mt-1 block w-full">
                @error('tujuan') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700">Perihal</label>
                <input type="text" name="perihal" value="{{ old('perihal') }}" class="glass-input mt-1 block w-full">
                @error('perihal') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700">Keterangan</label>
                <textarea name="keterangan" rows="3" class="glass-input mt-1 block w-full">{{ old('keterangan') }}</textarea>
                @error('keterangan') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="flex items-center gap-4 pt-4">
                <button type="submit" class="btn-primary">Simpan</button>
                <a href="{{ route('surat-keluar.index') }}" class="text-sm font-medium text-slate-600 hover:text-indigo-700 hover:underline">Batal</a>
            </div>
        </form>
    </div>
@endsection
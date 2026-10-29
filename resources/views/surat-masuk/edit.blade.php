@extends('layouts.app')

@section('title', 'Edit Surat Masuk')

@section('content')
    <div class="max-w-3xl mx-auto px-4 py-12">
        <h1 class="text-2xl font-bold text-gray-900 mb-6">Edit Surat Masuk</h1>

        <form action="{{ route('surat-masuk.update', $surat->id) }}" method="POST" class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-700">Nomor Surat</label>
                <input type="text" name="nomor_surat" value="{{ old('nomor_surat', $surat->nomor_surat) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm border px-3 py-2">
                @error('nomor_surat') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Tanggal</label>
                <input type="date" name="tanggal" value="{{ old('tanggal', $surat->tanggal) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm border px-3 py-2">
                @error('tanggal') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Pengirim</label>
                <input type="text" name="pengirim" value="{{ old('pengirim', $surat->pengirim) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm border px-3 py-2">
                @error('pengirim') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Perihal</label>
                <input type="text" name="perihal" value="{{ old('perihal', $surat->perihal) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm border px-3 py-2">
                @error('perihal') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Keterangan</label>
                <textarea name="keterangan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm border px-3 py-2">{{ old('keterangan', $surat->keterangan) }}</textarea>
                @error('keterangan') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="flex items-center space-x-4 pt-4">
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-700">Simpan Perubahan</button>
                <a href="{{ route('surat-masuk.index') }}" class="text-gray-600 hover:underline">Batal</a>
            </div>
        </form>
    </div>
@endsection
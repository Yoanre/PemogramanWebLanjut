@extends('layouts.app')

@section('title', 'Detail Surat Masuk')

@section('content')
    <div class="max-w-3xl mx-auto px-4 py-12">
        <h1 class="text-2xl font-bold text-gray-900 mb-6">Detail Surat Masuk</h1>

        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 space-y-4">
            <div>
                <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Nomor Surat</span>
                <p class="text-lg font-mono font-semibold text-indigo-600">{{ $surat->nomor_surat }}</p>
            </div>

            <div>
                <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Tanggal</span>
                <p class="text-base text-gray-800">{{ $surat->tanggal }}</p>
            </div>

            <div>
                <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Pengirim</span>
                <p class="text-base text-gray-800 font-medium">{{ $surat->pengirim }}</p>
            </div>

            <div>
                <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Perihal</span>
                <p class="text-base text-gray-800">{{ $surat->perihal }}</p>
            </div>

            <div>
                <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Keterangan</span>
                <p class="text-base text-gray-600">{{ $surat->keterangan ?? '-' }}</p>
            </div>

            <div class="pt-4 border-t border-gray-100">
                <a href="{{ route('surat-masuk.index') }}" class="inline-flex items-center text-sm font-semibold text-indigo-600 hover:text-indigo-800">
                    &larr; Kembali ke Daftar Surat
                </a>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('title', 'Detail Surat Keluar')

@section('content')
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Tombol Kembali -->
        <div class="mb-6">
            <a href="{{ route('surat-keluar.index') }}" class="inline-flex items-center text-sm font-semibold text-indigo-600 hover:text-indigo-800">
                &larr; Kembali ke Daftar Surat Keluar
            </a>
        </div>

        <!-- Card Detail Surat Keluar -->
        <div class="glass rounded-3xl overflow-hidden">
            <div class="flex items-center justify-between bg-linear-to-r from-indigo-600 to-violet-600 px-6 py-4 text-white">
                <h1 class="text-lg font-bold">Detail Informasi Surat Keluar</h1>
                <span class="rounded-full border border-white/30 bg-white/20 px-3 py-1 text-xs font-semibold backdrop-blur">
                    ID Surat: {{ $surat->id }}
                </span>
            </div>

            <div class="p-6 sm:p-8 space-y-4">
                <div class="border-b border-white/60 pb-3">
                    <p class="text-xs font-medium text-slate-400 uppercase tracking-wider">Nomor Surat</p>
                    <p class="text-base font-semibold text-indigo-600 font-mono mt-1">{{ $surat->nomor_surat }}</p>
                </div>

                <div class="border-b border-white/60 pb-3">
                    <p class="text-xs font-medium text-slate-400 uppercase tracking-wider">Tanggal Keluar</p>
                    <p class="text-base font-medium text-slate-800 mt-1">{{ $surat->tanggal }}</p>
                </div>

                <div class="border-b border-white/60 pb-3">
                    <p class="text-xs font-medium text-slate-400 uppercase tracking-wider">Instansi Tujuan</p>
                    <p class="text-base font-medium text-slate-800 mt-1">{{ $surat->tujuan }}</p>
                </div>

                <div class="border-b border-white/60 pb-3">
                    <p class="text-xs font-medium text-slate-400 uppercase tracking-wider">Perihal</p>
                    <p class="text-base font-medium text-slate-800 mt-1">{{ $surat->perihal }}</p>
                </div>

                <div>
                    <p class="text-xs font-medium text-slate-400 uppercase tracking-wider">Keterangan</p>
                    <p class="text-base text-slate-600 mt-1">{{ $surat->keterangan ?? '-' }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
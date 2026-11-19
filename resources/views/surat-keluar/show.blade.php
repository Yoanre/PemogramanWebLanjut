@extends('layouts.app')

@section('title', 'Detail Surat Keluar')

@section('content')
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Tombol Kembali -->
        <div class="mb-6">
            <a href="{{ route('surat-keluar.index') }}" class="inline-flex items-center gap-1.5 rounded-full border border-white/70 bg-white/50 px-5 py-2.5 text-sm font-semibold text-slate-600 backdrop-blur transition hover:bg-white/80">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                <span>Kembali ke Daftar Surat Keluar</span>
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

                <div class="border-b border-white/60 pb-3">
                    <p class="text-xs font-medium text-slate-400 uppercase tracking-wider">Kategori</p>
                    <p class="text-base font-medium text-slate-800 mt-1">{{ $surat->category?->nama ?? 'Tanpa kategori' }}</p>
                </div>

                @if ($surat->lampiran)
                    <div class="border-b border-white/60 pb-3">
                        <p class="text-xs font-medium text-slate-400 uppercase tracking-wider">Lampiran</p>
                        <p class="text-base mt-1">
                            <a href="{{ asset('storage/' . $surat->lampiran) }}" target="_blank" rel="noopener" class="font-semibold text-indigo-600 hover:underline">Lihat lampiran</a>
                        </p>
                    </div>
                @endif

                <div>
                    <p class="text-xs font-medium text-slate-400 uppercase tracking-wider">Keterangan</p>
                    <p class="text-base text-slate-600 mt-1">{{ $surat->keterangan ?? '-' }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
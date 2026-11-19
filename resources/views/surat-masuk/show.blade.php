@extends('layouts.app')

@section('title', 'Detail Surat Masuk')

@section('content')
    <div class="max-w-3xl mx-auto px-4 py-8">
        <h1 class="text-3xl font-extrabold tracking-tight text-slate-900 mb-6">Detail Surat Masuk</h1>

        <div class="glass rounded-3xl p-6 sm:p-8 space-y-5">
            <div>
                <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Nomor Surat</span>
                <p class="text-lg font-mono font-semibold text-indigo-600">{{ $surat->nomor_surat }}</p>
            </div>

            <div>
                <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Tanggal</span>
                <p class="text-base text-slate-800">{{ $surat->tanggal }}</p>
            </div>

            <div>
                <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Pengirim</span>
                <p class="text-base text-slate-800 font-medium">{{ $surat->pengirim }}</p>
            </div>

            <div>
                <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Perihal</span>
                <p class="text-base text-slate-800">{{ $surat->perihal }}</p>
            </div>

            <div>
                <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Keterangan</span>
                <p class="text-base text-slate-600">{{ $surat->keterangan ?? '-' }}</p>
            </div>

            <div>
                <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Kategori</span>
                <p class="text-base text-slate-800">{{ $surat->category?->nama ?? 'Tanpa kategori' }}</p>
            </div>

            @if ($surat->lampiran)
                <div>
                    <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Lampiran</span>
                    <p class="text-base">
                        <a href="{{ asset('storage/' . $surat->lampiran) }}" target="_blank" rel="noopener" class="font-semibold text-indigo-600 hover:underline">Lihat lampiran</a>
                    </p>
                </div>
            @endif

            <div class="pt-4 border-t border-white/60">
                <a href="{{ route('surat-masuk.index') }}" class="inline-flex items-center gap-1.5 rounded-full border border-white/70 bg-white/50 px-5 py-2.5 text-sm font-semibold text-slate-600 backdrop-blur transition hover:bg-white/80">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    <span>Kembali ke Daftar Surat</span>
                </a>
            </div>
        </div>
    </div>
@endsection
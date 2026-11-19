@extends('layouts.app')

@section('title', 'Daftar Surat Masuk')

@section('content')
    <section id="tabel-data" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
            <div>
                <h2 class="text-3xl font-extrabold tracking-tight text-slate-900">Daftar Surat Masuk</h2>
                <p class="text-sm text-slate-500">Menampilkan seluruh rekaman surat masuk terbaru dalam sistem.</p>
            </div>
            <div class="flex items-center gap-3">
                @can('manage-letters')
                    <a href="{{ route('surat-masuk.create') }}" class="btn-primary gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        <span>Tambah Surat</span>
                    </a>
                @endcan

                <a href="/" class="inline-flex items-center gap-1.5 rounded-full border border-white/70 bg-white/50 px-4 py-2.5 text-sm font-semibold text-slate-600 backdrop-blur transition hover:bg-white/80">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    <span>Dashboard</span>
                </a>
            </div>
        </div>

        @if (session('success'))
            <div class="mb-6 flex items-center gap-3 rounded-2xl border border-emerald-200/70 bg-emerald-100/60 p-4 text-emerald-800 backdrop-blur">
                <svg class="w-5 h-5 text-emerald-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span class="text-sm font-medium">{{ session('success') }}</span>
            </div>
        @endif

        {{-- Cari dan filter kategori --}}
        <form method="GET" action="{{ route('surat-masuk.index') }}" class="glass mb-6 flex flex-col gap-3 rounded-3xl p-4 sm:flex-row sm:items-center">
            <input type="text" name="q" value="{{ request('q') }}" placeholder="Nomor, pengirim, atau perihal"
                   aria-label="Cari surat" class="glass-input block w-full sm:flex-1">
            <select name="category_id" aria-label="Filter kategori" class="glass-input block w-full sm:w-52">
                <option value="">Semua kategori</option>
                @foreach ($categories as $kategori)
                    <option value="{{ $kategori->id }}" @selected(request('category_id') == $kategori->id)>{{ $kategori->nama }}</option>
                @endforeach
            </select>
            <div class="flex items-center gap-3">
                <button type="submit" class="btn-primary">Cari / Filter</button>
                <a href="{{ route('surat-masuk.index') }}" class="text-sm font-medium text-slate-600 hover:text-indigo-700 hover:underline">Reset</a>
            </div>
        </form>

        <div class="glass rounded-3xl overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-white/30 border-b border-white/50 text-xs font-semibold text-slate-500 uppercase tracking-wider">
                            <th class="py-4 px-6">No</th>
                            <th class="py-4 px-6">Nomor Surat</th>
                            <th class="py-4 px-6">Tanggal</th>
                            <th class="py-4 px-6">Pengirim</th>
                            <th class="py-4 px-6">Perihal</th>
                            <th class="py-4 px-6">Kategori</th>
                            <th class="py-4 px-6 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/50 text-sm">
                        @forelse ($suratMasuk as $item)
                            <tr class="hover:bg-white/40 transition duration-150">
                                <td class="py-4 px-6 font-medium text-slate-900">{{ $suratMasuk->firstItem() + $loop->index }}</td>
                                <td class="py-4 px-6 font-mono text-indigo-600 font-semibold">{{ $item->nomor_surat }}</td>
                                <td class="py-4 px-6 text-slate-600">{{ $item->tanggal }}</td>
                                <td class="py-4 px-6 text-slate-800 font-medium">{{ $item->pengirim }}</td>
                                <td class="py-4 px-6 text-slate-600">{{ $item->perihal }}</td>
                                <td class="py-4 px-6">
                                    @if ($item->category)
                                        <span class="inline-flex rounded-full bg-indigo-50/80 px-3 py-1 text-xs font-semibold text-indigo-700">{{ $item->category->nama }}</span>
                                    @else
                                        <span class="text-xs text-slate-400">Tanpa kategori</span>
                                    @endif
                                </td>
                                <td class="py-4 px-6 text-center">
                                    <div class="inline-flex items-center gap-2">
                                        {{-- Detail (ikon saja) --}}
                                        <a href="{{ route('surat-masuk.show', $item->id) }}" title="Detail Surat" aria-label="Detail Surat"
                                           class="inline-flex h-9 w-9 items-center justify-center rounded-full border border-indigo-200 bg-indigo-50/80 text-indigo-700 transition hover:bg-indigo-600 hover:text-white">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                            </svg>
                                        </a>

                                        @can('manage-letters')
                                            {{-- Edit (ikon saja) --}}
                                            <a href="{{ route('surat-masuk.edit', $item->id) }}" title="Edit Surat" aria-label="Edit Surat"
                                               class="inline-flex h-9 w-9 items-center justify-center rounded-full border border-amber-200 bg-amber-50/80 text-amber-700 transition hover:bg-amber-500 hover:text-white">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                </svg>
                                            </a>

                                            {{-- Hapus (ikon saja) --}}
                                            <form action="{{ route('surat-masuk.destroy', $item->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus surat ini?')"
                                                        title="Hapus Surat" aria-label="Hapus Surat"
                                                        class="inline-flex h-9 w-9 items-center justify-center rounded-full border border-red-200 bg-red-50/80 text-red-700 transition hover:bg-red-600 hover:text-white">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="py-8 text-center text-slate-500">
                                    {{ request()->filled('q') || request()->filled('category_id') ? 'Tidak ada surat yang cocok dengan pencarian atau filter.' : 'Belum ada data surat masuk yang tersedia.' }}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Navigasi halaman --}}
        @if ($suratMasuk->total() > 0)
            <div class="mt-6 flex flex-col items-center justify-between gap-3 text-sm text-slate-600 sm:flex-row">
                <p>Menampilkan {{ $suratMasuk->firstItem() }}&ndash;{{ $suratMasuk->lastItem() }} dari {{ $suratMasuk->total() }} surat</p>
                <div class="flex items-center gap-2">
                    @if ($suratMasuk->previousPageUrl())
                        <a href="{{ $suratMasuk->previousPageUrl() }}" class="rounded-full border border-white/70 bg-white/50 px-4 py-2 font-semibold backdrop-blur transition hover:bg-white/80">Sebelumnya</a>
                    @endif
                    <span class="px-2">Halaman {{ $suratMasuk->currentPage() }} dari {{ $suratMasuk->lastPage() }}</span>
                    @if ($suratMasuk->nextPageUrl())
                        <a href="{{ $suratMasuk->nextPageUrl() }}" class="rounded-full border border-white/70 bg-white/50 px-4 py-2 font-semibold backdrop-blur transition hover:bg-white/80">Berikutnya</a>
                    @endif
                </div>
            </div>
        @endif
    </section>
@endsection
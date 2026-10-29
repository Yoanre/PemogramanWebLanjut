@extends('layouts.app')

@section('title', 'Daftar Surat Masuk')

@section('content')
    <!-- SECTION: Tabel Data Surat Masuk Saja -->
    <section id="tabel-data" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Daftar Surat Masuk</h2>
                <p class="text-sm text-gray-500">Menampilkan seluruh rekaman surat masuk terbaru dalam sistem.</p>
            </div>
            <div class="mt-4 md:mt-0 flex items-center space-x-3">
                <!-- Tombol Tambah Surat dengan Ikon -->
                <a href="{{ route('surat-masuk.create') }}" 
                   class="inline-flex items-center space-x-2 px-4 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold rounded-lg shadow-sm transition duration-150">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    <span>Tambah Surat</span>
                </a>

                <!-- Tombol Kembali ke Dashboard -->
                <a href="/" class="inline-flex items-center space-x-1.5 text-sm font-semibold text-gray-600 hover:text-gray-900 border border-gray-300 bg-white px-3.5 py-2.5 rounded-lg shadow-sm transition duration-150">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    <span>Dashboard</span>
                </a>
            </div>
        </div>

        <!-- Notifikasi Pesan Sukses -->
        @if (session('success'))
            <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl flex items-center space-x-3 shadow-sm">
                <svg class="w-5 h-5 text-emerald-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span class="text-sm font-medium">{{ session('success') }}</span>
            </div>
        @endif

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-200 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            <th class="py-4 px-6">No</th>
                            <th class="py-4 px-6">Nomor Surat</th>
                            <th class="py-4 px-6">Tanggal</th>
                            <th class="py-4 px-6">Pengirim</th>
                            <th class="py-4 px-6">Perihal</th>
                            <th class="py-4 px-6 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 text-sm">
                        @forelse ($suratMasuk as $item)
                            <tr class="hover:bg-gray-50/80 transition duration-150">
                                <td class="py-4 px-6 font-medium text-gray-900">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="py-4 px-6 font-mono text-indigo-600 font-semibold">
                                    {{ $item->nomor_surat }}
                                </td>
                                <td class="py-4 px-6 text-gray-600">
                                    {{ $item->tanggal }}
                                </td>
                                <td class="py-4 px-6 text-gray-800 font-medium">
                                    {{ $item->pengirim }}
                                </td>
                                <td class="py-4 px-6 text-gray-600">
                                    {{ $item->perihal }}
                                </td>
                                <td class="py-4 px-6 text-center">
                                    <div class="inline-flex items-center space-x-2">
                                        <!-- Tombol Detail -->
                                        <a href="{{ route('surat-masuk.show', $item->id) }}" 
                                           title="Detail Surat"
                                           class="inline-flex items-center space-x-1 px-2.5 py-1.5 bg-indigo-50 text-indigo-700 text-xs font-semibold rounded-lg border border-indigo-200 hover:bg-indigo-600 hover:text-white transition duration-200">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                            </svg>
                                            <span>Detail</span>
                                        </a>

                                        <!-- Tombol Edit -->
                                        <a href="{{ route('surat-masuk.edit', $item->id) }}" 
                                           title="Edit Surat"
                                           class="inline-flex items-center space-x-1 px-2.5 py-1.5 bg-amber-50 text-amber-700 text-xs font-semibold rounded-lg border border-amber-200 hover:bg-amber-600 hover:text-white transition duration-200">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                            </svg>
                                            <span>Edit</span>
                                        </a>

                                        <!-- Tombol Hapus -->
                                        <form action="{{ route('surat-masuk.destroy', $item->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus surat ini?')" 
                                                    title="Hapus Surat"
                                                    class="inline-flex items-center space-x-1 px-2.5 py-1.5 bg-red-50 text-red-700 text-xs font-semibold rounded-lg border border-red-200 hover:bg-red-600 hover:text-white transition duration-200">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                                <span>Hapus</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-8 text-center text-gray-500">
                                    Belum ada data surat masuk yang tersedia.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
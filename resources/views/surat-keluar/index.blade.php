@extends('layouts.app')

@section('title', 'Daftar Surat Keluar')

@section('content')
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Daftar Surat Keluar</h2>
                <p class="text-sm text-gray-500">Menampilkan seluruh rekaman surat keluar instansi.</p>
            </div>
            <div class="mt-4 md:mt-0 flex items-center space-x-3">
                @can('manage-letters')
                <!-- Tombol Tambah Surat -->
                <a href="{{ route('surat-keluar.create') }}"
                   class="inline-flex items-center space-x-2 px-4 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold rounded-lg shadow-sm transition duration-150">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    <span>Tambah Surat</span>
                </a>
                @endcan

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
                            <th class="py-4 px-6">Tanggal Keluar</th>
                            <th class="py-4 px-6">Tujuan</th>
                            <th class="py-4 px-6">Perihal</th>
                            <th class="py-4 px-6 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 text-sm">
                        @forelse ($suratKeluar as $item)
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
                                    {{ $item->tujuan }}
                                </td>
                                <td class="py-4 px-6 text-gray-600">
                                    {{ $item->perihal }}
                                </td>
                                <td class="py-4 px-6 text-center">
                                    <div class="inline-flex items-center space-x-2">
                                        <!-- Tombol Detail -->
                                        <a href="{{ route('surat-keluar.show', $item->id) }}"
                                           title="Detail Surat"
                                           class="inline-flex items-center px-2.5 py-1.5 bg-indigo-50 text-indigo-700 text-xs font-semibold rounded-lg border border-indigo-200 hover:bg-indigo-600 hover:text-white transition duration-200">
                                            Detail
                                        </a>

                                        @can('manage-letters')
                                        <!-- Tombol Edit -->
                                        <a href="{{ route('surat-keluar.edit', $item->id) }}"
                                           title="Edit Surat"
                                           class="inline-flex items-center px-2.5 py-1.5 bg-amber-50 text-amber-700 text-xs font-semibold rounded-lg border border-amber-200 hover:bg-amber-600 hover:text-white transition duration-200">
                                            Edit
                                        </a>

                                        <!-- Tombol Hapus -->
                                        <form action="{{ route('surat-keluar.destroy', $item->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus surat ini?')"
                                                    title="Hapus Surat"
                                                    class="inline-flex items-center px-2.5 py-1.5 bg-red-50 text-red-700 text-xs font-semibold rounded-lg border border-red-200 hover:bg-red-600 hover:text-white transition duration-200">
                                                Hapus
                                            </button>
                                        </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-8 text-center text-gray-500">
                                    Belum ada data surat keluar yang tersedia.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

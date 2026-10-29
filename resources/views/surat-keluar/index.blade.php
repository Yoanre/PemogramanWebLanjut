@extends('layouts.app')

@section('title', 'Daftar Surat Keluar')

@section('content')
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Daftar Surat Keluar</h2>
                <p class="text-sm text-gray-500">Menampilkan seluruh rekaman surat keluar instansi.</p>
            </div>
            <div class="mt-4 md:mt-0">
                <a href="/" class="inline-flex items-center text-sm font-semibold text-indigo-600 hover:text-indigo-800">
                    &larr; Kembali ke Dashboard
                </a>
            </div>
        </div>

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
                                    <a href="/surat-keluar/{{ $item->id }}" 
                                       class="inline-flex items-center px-3 py-1.5 bg-indigo-50 text-indigo-700 text-xs font-semibold rounded-md border border-indigo-200 hover:bg-indigo-600 hover:text-white transition duration-200">
                                        Detail
                                    </a>
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
@extends('layouts.app')

@section('title', 'Detail Surat Masuk')

@section('content')
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <!-- Tombol Kembali -->
        <div class="mb-6">
            <a href="/surat-masuk" class="inline-flex items-center text-sm font-semibold text-indigo-600 hover:text-indigo-800">
                &larr; Kembali ke Daftar Surat
            </a>
        </div>

        <!-- Card Detail Surat -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="bg-indigo-900 px-6 py-4 text-white flex justify-between items-center">
                <h1 class="text-lg font-bold">Detail Informasi Surat</h1>
                <span class="px-3 py-1 bg-indigo-700 text-indigo-100 text-xs font-semibold rounded-full">
                    ID Surat: {{ $surat['id'] }}
                </span>
            </div>

            <div class="p-6 space-y-4">
                <div class="border-b border-gray-100 pb-3">
                    <p class="text-xs font-medium text-gray-400 uppercase tracking-wider">Nomor Surat</p>
                    <p class="text-base font-semibold text-indigo-600 font-mono mt-1">{{ $surat['nomor_surat'] }}</p>
                </div>

                <div class="border-b border-gray-100 pb-3">
                    <p class="text-xs font-medium text-gray-400 uppercase tracking-wider">Tanggal Diterima</p>
                    <p class="text-base font-medium text-gray-800 mt-1">{{ $surat['tanggal'] }}</p>
                </div>

                <div class="border-b border-gray-100 pb-3">
                    <p class="text-xs font-medium text-gray-400 uppercase tracking-wider">Instansi Pengirim</p>
                    <p class="text-base font-medium text-gray-800 mt-1">{{ $surat['pengirim'] }}</p>
                </div>

                <div>
                    <p class="text-xs font-medium text-gray-400 uppercase tracking-wider">Perihal</p>
                    <p class="text-base font-medium text-gray-800 mt-1">{{ $surat['perihal'] }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
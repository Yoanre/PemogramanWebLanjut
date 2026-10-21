@extends('layouts.app')

@section('title', 'Dashboard - Sistem Surat Masuk')

@section('content')
    <!-- SECTION 1: Definisi / Hero Section & Statistik Ringkas -->
    <section class="bg-gradient-to-r from-indigo-900 via-indigo-800 to-indigo-900 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center md:text-left md:flex md:items-center md:justify-between">
            <div class="md:w-2/3 mb-8 md:mb-0">
                <span class="inline-block px-3 py-1 bg-indigo-700 text-indigo-200 text-xs font-semibold rounded-full uppercase tracking-wider mb-4">
                    Modul Manajemen Administrasi
                </span>
                <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight leading-tight mb-4">
                    Apa itu Surat Masuk?
                </h1>
                <p class="text-indigo-100 text-base sm:text-lg leading-relaxed mb-6">
                    <strong>Surat Masuk</strong> adalah semua jenis surat, dokumen, atau pemberitahuan tertulis yang diterima oleh suatu instansi, organisasi, atau perusahaan dari pihak luar (eksternal) maupun unit kerja lain secara resmi untuk ditindaklanjuti.
                </p>
                <div class="flex flex-wrap gap-4 justify-center md:justify-start">
                    <a href="/surat-masuk" class="bg-white text-indigo-900 font-semibold px-5 py-2.5 rounded-lg shadow hover:bg-indigo-50 transition duration-200">
                        Kelola Data Surat
                    </a>
                </div>
            </div>
            
            <!-- Card Statistik Ringkas -->
            <div class="md:w-1/4 bg-white/10 backdrop-blur-md border border-white/20 rounded-xl p-6 text-center shadow-lg">
                <p class="text-sm font-medium text-indigo-200">Total Surat Diterima</p>
                <p class="text-4xl font-extrabold text-white my-2">{{ count($suratMasuk) }}</p>
                <span class="text-xs text-emerald-400 font-medium">● Data Ter-update</span>
            </div>
        </div>
    </section>

    <!-- SECTION 2: Informasi Tambahan / Quick Overview di Dashboard -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-8">
            <h2 class="text-xl font-bold text-gray-900 mb-3">Selamat Datang di Sistem Pengelolaan Surat</h2>
            <p class="text-gray-600 leading-relaxed">
                Gunakan sistem ini untuk memantau, mencatat, dan melihat detail surat masuk instansi secara terstruktur. Silakan klik tombol di atas atau menu navigasi untuk melihat daftar lengkap surat yang masuk.
            </p>
        </div>
    </section>
@endsection
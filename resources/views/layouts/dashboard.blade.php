@extends('layouts.app')

@section('title', 'Dashboard - Sistem Surat Masuk')

@section('content')
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-6">
        <div class="glass rounded-[2rem] p-8 sm:p-12 md:flex md:items-center md:justify-between md:gap-10">
            <div class="md:w-2/3 mb-8 md:mb-0 text-center md:text-left">
                <span class="inline-block rounded-full border border-white/70 bg-white/60 px-3 py-1 text-xs font-semibold uppercase tracking-wider text-indigo-700 mb-4">
                    Modul Manajemen Administrasi
                </span>
                <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight leading-tight text-slate-900 mb-4">
                    E-Surat
                </h1>
                <p class="text-slate-600 text-base sm:text-lg leading-relaxed mb-6">
                    <strong class="text-slate-800">E-Surat</strong> adalah sistem pengelolaan surat masuk dan keluar yang membantu Anda mencatat, mengarsipkan, dan melacak setiap surat dalam satu tempat. Surat dapat diunggah beserta lampirannya, dicari dengan cepat, dan diatur sesuai kategori seperti pemberitahuan, permohonan, atau undangan, sehingga alur surat menjadi lebih rapi dan mudah dipantau.
                </p>
                <div class="flex flex-wrap gap-4 justify-center md:justify-start">
                    <a href="/surat-masuk" class="btn-primary">Kelola Data Surat</a>
                </div>
            </div>

            <div class="md:w-1/3 rounded-3xl border border-white/70 bg-white/50 p-6 text-center shadow-lg shadow-indigo-900/5 backdrop-blur-xl">
                <p class="text-sm font-medium text-slate-500">Total Surat Diterima</p>
                <p class="my-2 bg-linear-to-r from-indigo-600 to-violet-600 bg-clip-text text-6xl font-extrabold text-transparent">{{ count($suratMasuk) }}</p>
                <span class="text-xs font-medium text-emerald-600">● Data Ter-update</span>
            </div>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="glass rounded-3xl p-8">
            <h2 class="text-xl font-bold text-slate-900 mb-3">Selamat Datang di Sistem Pengelolaan Surat</h2>
            <p class="text-slate-600 leading-relaxed">
                Gunakan sistem ini untuk memantau, mencatat, dan melihat detail surat masuk instansi secara terstruktur. Silakan klik tombol di atas atau menu navigasi untuk melihat daftar lengkap surat yang masuk.
            </p>
        </div>
    </section>
@endsection
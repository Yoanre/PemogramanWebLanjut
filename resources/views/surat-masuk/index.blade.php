<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Kelola Surat Masuk</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans antialiased min-h-screen flex flex-col justify-between">

    <!-- Header / Navbar -->
    <header class="bg-white border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="p-2 bg-indigo-600 text-white rounded-lg font-bold text-xl">
                    ✉️
                </div>
                <span class="font-bold text-xl text-gray-900 tracking-tight">E-Surat Masuk</span>
            </div>
            <nav class="flex space-x-4">
                <a href="#" class="text-sm font-semibold text-gray-600 hover:text-indigo-600">Beranda</a>
                <a href="#tabel-data" class="text-sm font-semibold text-gray-600 hover:text-indigo-600">Data Surat</a>
            </nav>
        </div>
    </header>

    <main class="flex-grow">
        <!-- SECTION 1: Definisi / Hero Section -->
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
                        <a href="#tabel-data" class="bg-white text-indigo-900 font-semibold px-5 py-2.5 rounded-lg shadow hover:bg-indigo-50 transition duration-200">
                            Lihat Data Surat
                        </a>
                    </div>
                </div>
                <!-- Card Statistik Ringkas -->
                <div class="md:w-1/4 bg-white/10 backdrop-blur-md border border-white/20 rounded-xl p-6 text-center">
                    <p class="text-sm font-medium text-indigo-200">Total Surat Diterima</p>
                    <p class="text-4xl font-extrabold text-white my-2">{{ count($suratMasuk) }}</p>
                    <span class="text-xs text-emerald-400 font-medium">● Data Ter-update</span>
                </div>
            </div>
        </section>

        <!-- SECTION 2: Tabel Data Surat Masuk -->
        <section id="tabel-data" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900">Daftar Surat Masuk</h2>
                    <p class="text-sm text-gray-500">Menampilkan seluruh rekaman surat masuk terbaru dalam sistem.</p>
                </div>
            </div>

            <!-- Card Container Tabel -->
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
                                        {{ $item['nomor_surat'] }}
                                    </td>
                                    <td class="py-4 px-6 text-gray-600">
                                        {{ $item['tanggal'] }}
                                    </td>
                                    <td class="py-4 px-6 text-gray-800 font-medium">
                                        {{ $item['pengirim'] }}
                                    </td>
                                    <td class="py-4 px-6 text-gray-600">
                                        {{ $item['perihal'] }}
                                    </td>
                                    <td class="py-4 px-6 text-center">
                                        <a href="/surat-masuk/{{ $item['id'] }}" 
                                           class="inline-flex items-center px-3 py-1.5 bg-indigo-50 text-indigo-700 text-xs font-semibold rounded-md border border-indigo-200 hover:bg-indigo-600 hover:text-white transition duration-200">
                                            Detail
                                        </a>
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
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 py-6">
        <div class="max-w-7xl mx-auto px-4 text-center text-xs text-gray-500">
            &copy; {{ date('Y') }} Sistem Pengelolaan Surat Masuk. All rights reserved.
        </div>
    </footer>

</body>
</html>
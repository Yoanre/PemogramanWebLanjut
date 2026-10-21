<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Surat Masuk')</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans antialiased min-h-screen flex flex-col justify-between">

    <!-- NAVBAR UTAMA (Otomatis tampil di semua halaman yang pakai layout ini) -->
    <header class="bg-white border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="p-2 bg-indigo-600 text-white rounded-lg font-bold text-xl">
                    ✉️
                </div>
                <span class="font-bold text-xl text-gray-900 tracking-tight">E-Surat Masuk</span>
            </div>
            <nav class="flex space-x-6">
                <a href="/surat-masuk" class="text-sm font-semibold text-gray-600 hover:text-indigo-600">Beranda</a>
                <a href="/surat-masuk" class="text-sm font-semibold text-gray-600 hover:text-indigo-600">Data Surat</a>
                <a href="/surat-keluar" class="text-sm font-semibold text-gray-600 hover:text-indigo-600">Surat Keluar</a>
            </nav>
        </div>
    </header>

    <!-- AREA KONTEN UTAMA -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 py-6 mt-12">
        <div class="max-w-7xl mx-auto px-4 text-center text-xs text-gray-500">
            &copy; {{ date('Y') }} Sistem Pengelolaan Surat Masuk. All rights reserved.
        </div>
    </footer>

</body>
</html>
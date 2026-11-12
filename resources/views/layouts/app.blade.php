<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Surat Masuk')</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased min-h-screen flex flex-col justify-between">

    <!-- NAVBAR FLOATING PILL -->
    <header class="fixed top-4 inset-x-0 z-50 px-4 flex justify-center pointer-events-none">
        <nav class="glass-pill pointer-events-auto flex max-w-full items-center gap-1 rounded-full p-1.5 sm:gap-2">
            <a href="/" class="flex items-center gap-2 pl-1.5 pr-2">
                <span class="flex h-9 w-9 items-center justify-center rounded-full bg-linear-to-br from-indigo-600 to-violet-600 text-base text-white shadow-md shadow-indigo-600/30">✉️</span>
                <span class="hidden text-sm font-bold tracking-tight text-slate-900 md:inline">E-Surat</span>
            </a>

            <div class="flex items-center gap-0.5">
                <a href="/" class="nav-link {{ request()->is('/') ? 'nav-link-active' : '' }}">Beranda</a>
                <a href="/surat-masuk" class="nav-link {{ request()->is('surat-masuk*') ? 'nav-link-active' : '' }}">Surat Masuk</a>
                <a href="/surat-keluar" class="nav-link {{ request()->is('surat-keluar*') ? 'nav-link-active' : '' }}">Surat Keluar</a>
            </div>

            @auth
                <div class="flex items-center gap-2 pl-1">
                    <span class="hidden items-center gap-2 rounded-full bg-white/50 py-1 pl-1 pr-3 text-xs text-slate-600 lg:flex">
                        <span class="flex h-7 w-7 items-center justify-center rounded-full bg-indigo-100 font-bold text-indigo-700">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
                        <span class="font-semibold">{{ auth()->user()->name }}</span>
                        <span class="text-slate-400">({{ auth()->user()->role }})</span>
                    </span>
                    <form method="POST" action="{{ route('logout') }}" style="display:inline">
                        @csrf
                        <button type="submit"
                                class="rounded-full border border-white/70 bg-white/60 px-3.5 py-2 text-xs font-semibold text-slate-700 transition hover:bg-white hover:text-red-600">
                            Keluar
                        </button>
                    </form>
                </div>
            @endauth
        </nav>
    </header>

    <!-- KONTEN (pt-24 supaya tidak tertutup navbar) -->
    <main class="flex-grow pt-24">
        @yield('content')
    </main>

    <footer class="px-4 pb-6 pt-12">
        <div class="glass mx-auto max-w-md rounded-full px-5 py-2.5 text-center text-xs text-slate-500">
            &copy; {{ date('Y') }} Sistem Pengelolaan Surat Masuk. All rights reserved.
        </div>
    </footer>

</body>

</html>
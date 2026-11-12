<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login SIM-Surat</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased min-h-screen flex items-center justify-center px-4">
    <div class="glass w-full max-w-sm rounded-[2rem] p-8">
        <h1 class="text-3xl font-extrabold tracking-tight text-slate-900 mb-6">Login SIM-Surat</h1>

        <form method="POST" action="{{ route('login.submit') }}" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium text-slate-700">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="glass-input mt-1 block w-full">
                @error('email') <p style="color:red" class="text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700">Password</label>
                <input type="password" name="password" class="glass-input mt-1 block w-full">
                @error('password') <p style="color:red" class="text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <button type="submit" class="btn-primary w-full">Masuk</button>
        </form>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Stuffus</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-zinc-50 text-zinc-950 font-sans antialiased h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-sm bg-white border border-zinc-200 rounded-2xl p-6 shadow-sm">
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold tracking-tight">Stuffus Admin Login</h1>
            <p class="text-xs text-zinc-400 mt-1">Masuk untuk mengelola produk & pesanan</p>
        </div>

        <!-- Alert Error Global -->
        @if(session('error'))
            <div class="mb-4 text-xs font-medium bg-red-50 text-red-600 p-3 rounded-lg border border-red-100">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('login.process') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="email" class="block text-xs font-semibold text-zinc-600 mb-1.5">Email Address</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                    class="w-full px-3 py-2 bg-white border border-zinc-300 rounded-lg text-sm focus:outline-none focus:border-zinc-900 transition-colors">
                @error('email')
                    <p class="text-[11px] text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-xs font-semibold text-zinc-600 mb-1.5">Password</label>
                <input type="password" name="password" id="password" required
                    class="w-full px-3 py-2 bg-white border border-zinc-300 rounded-lg text-sm focus:outline-none focus:border-zinc-900 transition-colors">
            </div>

            <button type="submit" class="w-full bg-zinc-950 hover:bg-zinc-800 text-white font-medium py-2 rounded-lg text-sm transition-colors cursor-pointer text-center">
                Sign In
            </button>
        </form>
    </div>

</body>
</html>
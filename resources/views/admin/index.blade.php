<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Stuffus</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-zinc-50 text-zinc-950 font-sans antialiased h-screen flex flex-col justify-between">

    <header class="bg-white border-b border-zinc-200 py-5 px-8 flex justify-between items-center max-w-7xl w-full mx-auto mt-4 rounded-xl shadow-sm">
        <div>
            <span class="text-xl font-bold tracking-tight text-zinc-900">Stuffus <span class="text-xs font-normal text-zinc-400 bg-zinc-100 px-2 py-0.5 rounded ml-1">Admin Panel</span></span>
        </div>
        <div class="flex items-center gap-4">
            <span class="text-xs text-zinc-500 font-medium">Halo, {{ auth()->user()->name }}</span>
            <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Yakin ingin keluar?');">
                @csrf
                <button type="submit" class="text-xs font-semibold text-red-600 hover:text-red-700 bg-red-50 hover:bg-red-100/80 px-3 py-1.5 rounded-lg transition-colors cursor-pointer">
                    Log Out ⎋
                </button>
            </form>
        </div>
    </header>

    <main class="max-w-4xl w-full mx-auto my-auto px-4 py-8">
        <div class="text-center mb-10">
            <h1 class="text-3xl font-extrabold tracking-tight text-zinc-900">Selamat Datang di Kendali Toko</h1>
            <p class="text-sm text-zinc-500 mt-2">Pilih modul navigasi di bawah untuk mengelola operasional Stuffus.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            
            <a href="{{ route('admin.products.index') }}" class="group block p-6 bg-white border border-zinc-200 rounded-2xl shadow-sm hover:border-zinc-900 transition-all hover:-translate-y-0.5">
                <div class="h-12 w-12 bg-zinc-950 text-white rounded-xl flex items-center justify-center text-xl font-bold mb-4 group-hover:bg-zinc-800 transition-colors">
                    📦
                </div>
                <h2 class="text-lg font-bold text-zinc-900">Manajemen Produk</h2>
                <p class="text-sm text-zinc-500 mt-1.5">Tambah produk baru, edit detail harga, perbarui jumlah stok gudang, atau hapus item katalog.</p>
                <div class="text-xs font-semibold text-zinc-900 mt-4 inline-flex items-center gap-1 group-hover:underline">
                    Buka Pengaturan &rarr;
                </div>
            </a>

            <a href="{{ route('admin.orders.index') }}" class="group block p-6 bg-white border border-zinc-200 rounded-2xl shadow-sm hover:border-zinc-900 transition-all hover:-translate-y-0.5">
                <div class="h-12 w-12 bg-zinc-100 text-zinc-900 border border-zinc-200 rounded-xl flex items-center justify-center text-xl font-bold mb-4 group-hover:bg-zinc-200 transition-colors">
                    📜
                </div>
                <h2 class="text-lg font-bold text-zinc-900">Riwayat Transaksi</h2>
                <p class="text-sm text-zinc-500 mt-1.5">Pantau pesanan masuk secara real-time, lihat alamat pengiriman pelanggan, dan rekap total omset penjualan.</p>
                <div class="text-xs font-semibold text-zinc-900 mt-4 inline-flex items-center gap-1 group-hover:underline">
                    Lihat Semua Pesanan &rarr;
                </div>
            </a>

        </div>
    </main>

    <footer class="py-6 text-center text-xs text-zinc-400 border-t border-zinc-100 w-full max-w-7xl mx-auto">
        &copy; 2026 Stuffus E-Commerce. All rights reserved.
    </footer>

</body>
</html>
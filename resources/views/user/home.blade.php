<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stuffus - Essential Lifestyle Gear</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-white text-zinc-950 font-sans antialiased">

    <!-- Navbar -->
    <nav class="border-b border-zinc-100 py-6 px-8 flex justify-between items-center max-w-7xl mx-auto">
        <span class="text-xl font-bold tracking-tight">Stuffus</span>
        <div class="space-x-6 text-sm font-medium text-zinc-600">
            <a href="{{ route('home') }}" class="text-zinc-950 underline underline-offset-4">Beranda</a>
            <a href="{{ route('products.index') }}" class="hover:text-zinc-950">Shop</a>
            <a href="#" class="hover:text-zinc-950">Blog</a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center bg-zinc-50 rounded-3xl p-8 lg:p-16">
            <div>
                <span class="text-xs font-semibold uppercase tracking-widest text-zinc-400">New Generation Essentials</span>
                <h1 class="text-4xl sm:text-6xl font-extrabold tracking-tight text-zinc-900 mt-3 mb-6 leading-tight">
                    Give All <br>You Need.
                </h1>
                <p class="text-zinc-500 text-sm sm:text-base max-w-md mb-8 leading-relaxed">
                    Menghadirkan kurasi produk harian dengan desain fungsional, material premium, dan estetika minimalis modern untuk mendukung setiap produktivitas Anda.
                </p>
                <a href="{{ route('products.index') }}" class="inline-block bg-zinc-950 hover:bg-zinc-800 text-white text-sm font-medium px-8 py-3.5 rounded-xl transition-colors shadow-sm">
                    Jelajahi Produk &rarr;
                </a>
            </div>
            <div class="hidden lg:flex justify-center items-center h-full bg-zinc-200/50 rounded-2xl overflow-hidden min-h-[350px]">
                <!-- Placeholder Icon Estetik pengganti gambar hero utama -->
                <span class="text-8xl select-none filter grayscale opacity-40">📦</span>
            </div>
        </div>
    </section>

    <!-- Featured Products Section -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-24">
        <div class="flex justify-between items-end border-b border-zinc-100 pb-5 mb-10">
            <div>
                <h2 class="text-xl font-bold tracking-tight text-zinc-900">Featured Products</h2>
                <p class="text-xs text-zinc-400 mt-1">Koleksi barang terbaru yang baru saja mendarat di gudang kami.</p>
            </div>
            <a href="{{ route('products.index') }}" class="text-xs font-semibold text-zinc-900 hover:underline flex items-center gap-1">
                Lihat Semua Toko &rarr;
            </a>
        </div>

        <!-- Grid Produk (Menampilkan maksimal 4 item terbaru) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-10">
            @forelse($featuredProducts as $product)
                <div class="group relative flex flex-col justify-between border border-zinc-100 rounded-xl p-4 transition-all hover:shadow-md bg-white">
                    <div>
                        <!-- Gambar Produk -->
                        <div class="aspect-square w-full overflow-hidden rounded-lg bg-zinc-100 group-hover:opacity-85 transition-opacity">
                            @if($product->image)
                                <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" class="h-full w-full object-cover object-center">
                            @else
                                <div class="h-full w-full flex items-center justify-center text-zinc-400 text-xs">No Image</div>
                            @endif
                        </div>
                        
                        <!-- Informasi Produk -->
                        <h3 class="mt-4 text-sm font-semibold text-zinc-900">
                            <a href="{{ route('products.show', $product->slug) }}">
                                <span class="absolute inset-0"></span>
                                {{ $product->name }}
                            </a>
                        </h3>
                        <p class="mt-1 text-sm font-bold text-zinc-950">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    </div>
                    
                    <!-- Tombol Aksi Cepat -->
                    <div class="mt-4 flex gap-2 relative z-10">
                        <form action="{{ route('cart.add', $product->id) }}" method="POST" class="w-1/2">
                            @csrf
                            <button type="submit" class="w-full border border-zinc-300 text-zinc-800 text-xs font-medium py-2 rounded-lg hover:bg-zinc-50 transition-colors cursor-pointer">
                                Add to Cart
                            </button>
                        </form>
                        
                        <form action="{{ route('products.buy_now', $product->id) }}" method="POST" class="w-1/2">
                            @csrf
                            <button type="submit" class="w-full bg-zinc-950 text-white text-xs font-medium py-2 rounded-lg hover:bg-zinc-800 transition-colors cursor-pointer">
                                Buy Now
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12 text-zinc-400 text-sm">
                    Belum ada produk unggulan yang tersedia saat ini.
                </div>
            @endforelse
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-zinc-50 border-t border-zinc-200/60 py-12 mt-12">
        <div class="max-w-7xl mx-auto px-4 text-center text-xs text-zinc-400 space-y-2">
            <p class="font-semibold text-zinc-700">Stuffus E-Commerce Platform</p>
            <p>&copy; 2026 Stuffus. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>
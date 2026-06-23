<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} - Stuffus</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-white text-zinc-950 font-sans antialiased">

    <nav class="border-b border-zinc-100 py-6 px-8 flex justify-between items-center max-w-7xl mx-auto">
        <span class="text-xl font-bold tracking-tight">Stuffus</span>
        <div class="space-x-6 text-sm font-medium text-zinc-600">
            <a href="#" class="hover:text-zinc-950">Beranda</a>
            <a href="{{ route('products.index') }}" class="text-zinc-950 underline underline-offset-4">Shop</a>
            <a href="#" class="hover:text-zinc-950">Blog</a>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        
        <div class="mb-8">
            <a href="{{ route('products.index') }}" class="text-sm font-medium text-zinc-500 hover:text-zinc-950 transition-colors flex items-center gap-2">
                &larr; Kembali ke Katalog
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-12 gap-y-10 items-start">
            
            <div class="aspect-square w-full overflow-hidden rounded-2xl bg-zinc-50 border border-zinc-100 p-8 flex items-center justify-center">
                @if($product->image)
                    <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" class="max-h-full max-w-full object-contain rounded-lg">
                @else
                    <div class="text-zinc-400 text-sm">No Image Available</div>
                @endif
            </div>

            <div class="flex flex-col justify-between h-full space-y-6">
                <div>
                    <h1 class="text-3xl lg:text-4xl font-bold tracking-tight text-zinc-900">{{ $product->name }}</h1>
                    
                    <p class="mt-4 text-2xl font-extrabold text-zinc-950">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </p>
                    <p class="mt-2 text-lg font-semibold text-zinc-900">
                        Stok Tersedia: <span class="font-semibold text-zinc-900">{{ $product->stock }}</span>
                    </p>
                    <hr class="my-6 border-zinc-100">

                    <h3 class="text-sm font-semibold text-zinc-900 mb-2">Deskripsi Produk</h3>
                    <div class="text-zinc-600 text-sm leading-relaxed whitespace-pre-line">
                        {{ $product->description }}
                    </div>
                </div>

                <div class="space-y-3 pt-6">
                    <button class="w-full bg-zinc-950 text-white font-medium py-3.5 rounded-xl hover:bg-zinc-800 transition-colors cursor-pointer shadow-sm text-sm">
                        Beli Sekarang (Buy Now)
                    </button>
                    <button class="w-full border border-zinc-300 text-zinc-800 font-medium py-3.5 rounded-xl hover:bg-zinc-50 transition-colors cursor-pointer text-sm">
                        Masukkan Keranjang (Add to Cart)
                    </button>
                </div>
            </div>

        </div>
    </main>

</body>
</html>
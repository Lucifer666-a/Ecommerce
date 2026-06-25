<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stuffus - Shop</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-white text-zinc-950 font-sans antialiased">

    <nav class="border-b border-zinc-100 py-6 px-8 flex justify-between items-center max-w-7xl mx-auto">
        <span class="text-xl font-bold tracking-tight">Stuffus</span>
        <div class="space-x-6 text-sm font-medium text-zinc-600">
            <a href="{{ route('home') }}" class="hover:text-zinc-950">Beranda</a>
            <a href="{{ route('products.index') }}" class="text-zinc-950 underline underline-offset-4">Shop</a>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        
        <div class="text-center py-20 bg-gradient-to-r from-zinc-900 via-zinc-800 to-zinc-950 rounded-2xl mb-12 shadow-sm">
            <h1 class="text-4xl font-extrabold tracking-tight text-white uppercase sm:text-5xl">
                Shop
            </h1>
            <p class="mt-2 text-xs font-semibold tracking-widest text-zinc-400 uppercase">
                Give All You Need
            </p>
        </div>

        <div class="max-w-7xl mx-auto mb-8">
            <form action="{{ route('products.index') }}" method="GET" class="flex gap-2 max-w-md">
                <div class="relative flex-1">
                    <input type="text" name="search" value="{{ $search ?? '' }}" 
                        placeholder="Cari produk impian Anda..." 
                        class="w-full pl-4 pr-10 py-2.5 bg-white border border-zinc-200 rounded-xl text-sm focus:outline-none focus:border-zinc-900 transition-colors">
                            
                    @if(!empty($search))
                        <a href="{{ route('products.index') }}" class="absolute right-3 top-1/2 -translate-y-1/2 text-zinc-400 hover:text-zinc-900 text-xs">
                            ✕
                        </a>
                    @endif
                </div>
                <button type="submit" class="bg-zinc-950 hover:bg-zinc-800 text-white text-sm font-medium px-5 py-2.5 rounded-xl transition-colors cursor-pointer">
                    Cari
                </button>
            </form>

            @if(!empty($search))
                <p class="text-xs text-zinc-500 mt-2">
                    Menampilkan hasil pencarian untuk: <span class="font-semibold text-zinc-900">"{{ $search }}"</span>
                </p>
            @endif
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-10">
            
            @forelse($products as $product)
                <div class="group relative flex flex-col justify-between border border-zinc-100 rounded-xl p-4 transition-all hover:shadow-md bg-white">
                    <div>
                        <div class="aspect-square w-full overflow-hidden rounded-lg bg-zinc-100 group-hover:opacity-85 transition-opacity">
                            @if($product->image)
                                <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" class="h-full w-full object-cover object-center">
                            @else
                                <div class="h-full w-full flex items-center justify-center text-zinc-400 text-xs">No Image</div>
                            @endif
                        </div>
                        
                        <h3 class="mt-4 text-sm font-semibold text-zinc-900">
                            <a href="{{ route('products.show', $product->slug) }}">
                                <span class="absolute inset-0"></span>
                                {{ $product->name }}
                            </a>
                        </h3>
                        <p class="mt-1 text-sm font-bold text-zinc-950">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    </div>
                    
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
                <div class="col-span-full text-center py-16 bg-zinc-50 rounded-2xl border border-dashed border-zinc-200">
                    <p class="text-zinc-400 text-sm">Produk yang Anda cari tidak ditemukan.</p>
                    <a href="{{ route('products.index') }}" class="text-xs font-semibold text-zinc-950 underline mt-2 inline-block hover:text-zinc-800">
                        Lihat Semua Produk
                    </a>
                </div>
            @endforelse

        </div>
    </main>

</body>
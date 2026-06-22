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
            <a href="#" class="hover:text-zinc-950">Beranda</a>
            <a href="{{ route('products.index') }}" class="text-zinc-950 underline underline-offset-4">Shop</a>
            <a href="#" class="hover:text-zinc-950">Blog</a>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        
        <div class="text-center py-16 bg-zinc-50 rounded-2xl mb-12">
            <h1 class="text-5xl lg:text-7xl font-extrabold tracking-tight text-zinc-900 mb-4">Shop</h1>
            <p class="text-sm text-zinc-500 tracking-wide uppercase">Give All You Need</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-10">
            
            @foreach($products as $product)
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
                    <button class="w-1/2 border border-zinc-300 text-zinc-800 text-xs font-medium py-2 rounded-lg hover:bg-zinc-50 transition-colors cursor-pointer">
                        Add to Cart
                    </button>
                    <button class="w-1/2 bg-zinc-950 text-white text-xs font-medium py-2 rounded-lg hover:bg-zinc-800 transition-colors cursor-pointer">
                        Buy Now
                    </button>
                </div>
            </div>
            @endforeach

        </div>
    </main>

</body>
</html>
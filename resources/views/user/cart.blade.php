<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja - Stuffus</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-zinc-50 text-zinc-950 font-sans antialiased">

    <nav class="border-b border-zinc-100 bg-white py-6 px-8 flex justify-between items-center max-w-7xl mx-auto">
        <span class="text-xl font-bold tracking-tight">Stuffus</span>
        <div class="space-x-6 text-sm font-medium text-zinc-600">
            <a href="{{ route('products.index') }}" class="hover:text-zinc-950">Shop / Kembali Belanja</a>
        </div>
    </nav>

    <main class="max-w-4xl mx-auto my-12 px-4">
        <h1 class="text-2xl font-bold tracking-tight mb-8">Keranjang Belanja Anda</h1>

        @if(session('success'))
            <div class="mb-6 p-4 bg-zinc-950 text-white text-sm rounded-lg shadow-sm">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="mb-6 p-4 bg-red-600 text-white text-sm rounded-lg shadow-sm">{{ session('error') }}</div>
        @endif

        @if(!empty($cart))
            <div class="space-y-4">
                @php $total = 0; @endphp
                @foreach($cart as $id => $details)
                    @php $total += $details['price'] * $details['quantity']; @endphp
                    
                    <div class="bg-white border border-zinc-200 rounded-xl p-4 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 shadow-sm">
                        <div class="flex items-center gap-4">
                            <div class="h-16 w-16 rounded-lg bg-zinc-100 overflow-hidden border border-zinc-200 shrink-0">
                                @if($details['image'])
                                    <img src="{{ asset('images/' . $details['image']) }}" class="h-full w-full object-cover">
                                @endif
                            </div>
                            <div>
                                <h3 class="font-semibold text-sm text-zinc-900">{{ $details['name'] }}</h3>
                                <p class="text-xs text-zinc-500 mt-0.5">Harga Satuan: Rp {{ number_format($details['price'], 0, ',', '.') }}</p>
                            </div>
                        </div>

                        <div class="flex items-center justify-between sm:justify-end w-full sm:w-auto gap-6">
                            <form action="{{ route('cart.update', $id) }}" method="POST" class="flex items-center gap-2">
                                @csrf
                                <input type="number" name="quantity" value="{{ $details['quantity'] }}" min="1" max="{{ $details['max_stock'] }}"
                                    class="w-16 px-2 py-1 border border-zinc-300 rounded-md text-center text-sm focus:outline-none focus:border-zinc-900">
                                <button type="submit" class="text-xs font-medium text-zinc-600 hover:text-zinc-950 underline cursor-pointer">Update</button>
                            </form>

                            <p class="text-sm font-bold text-zinc-950 min-w-[100px] text-right">
                                Rp {{ number_format($details['price'] * $details['quantity'], 0, ',', '.') }}
                            </p>

                            <form action="{{ route('cart.remove', $id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 text-xs cursor-pointer">Hapus</button>
                            </form>
                        </div>
                    </div>
                @endforeach

                <div class="mt-8 bg-white border border-zinc-200 rounded-xl p-6 shadow-sm flex flex-col sm:flex-row justify-between items-center gap-4">
                    <div>
                        <p class="text-xs text-zinc-500 uppercase tracking-wider font-semibold">Total Pembayaran</p>
                        <p class="text-2xl font-black text-zinc-950 mt-1">Rp {{ number_format($total, 0, ',', '.') }}</p>
                    </div>
                    
                    <form action="{{ route('cart.checkout') }}" method="POST" class="w-full sm:w-auto">
                        @csrf
                        <button type="submit" class="w-full sm:w-auto bg-zinc-950 hover:bg-zinc-800 text-white font-medium py-3 px-8 rounded-xl text-sm transition-colors cursor-pointer shadow-sm">
                            Lakukan Checkout Sekarang &larr;
                        </button>
                    </form>
                </div>
            </div>
        @else
            <div class="text-center py-16 bg-white border border-zinc-200 rounded-xl shadow-sm">
                <p class="text-zinc-400 text-sm">Tidak ada produk di dalam keranjang belanja belanjaan Anda.</p>
                <a href="{{ route('products.index') }}" class="mt-4 inline-block text-sm font-semibold text-zinc-900 underline">Ayo Berbelanja</a>
            </div>
        @endif
    </main>

</body>
</html>
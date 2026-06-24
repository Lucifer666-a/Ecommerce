<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Stuffus</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-zinc-50 text-zinc-950 font-sans antialiased">

    <nav class="border-b border-zinc-100 bg-white py-6 px-8 flex justify-between items-center max-w-7xl mx-auto">
        <span class="text-xl font-bold tracking-tight">Stuffus</span>
        <a href="{{ route('cart.view') }}" class="text-sm font-medium text-zinc-500 hover:text-zinc-950">&larr; Kembali ke Keranjang</a>
    </nav>

    <main class="max-w-5xl mx-auto my-12 px-4">
        <h1 class="text-3xl font-bold tracking-tight mb-8">Informasi Pengiriman</h1>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <form action="{{ route('cart.checkout.process') }}" method="POST" class="lg:col-span-7 bg-white border border-zinc-200 rounded-2xl p-6 space-y-6 shadow-sm">
                @csrf
                
                <div>
                    <label for="customer_name" class="block text-sm font-medium text-zinc-700 mb-2">Nama Lengkap Penerima</label>
                    <input type="text" name="customer_name" id="customer_name" required
                        class="w-full px-4 py-2.5 bg-white border border-zinc-300 rounded-lg text-sm focus:outline-none focus:border-zinc-900 transition-colors"
                        placeholder="Contoh: Fernando Hasiholan">
                </div>

                <div>
                    <label for="phone" class="block text-sm font-medium text-zinc-700 mb-2">Nomor Telepon / WhatsApp</label>
                    <input type="number" name="phone" id="phone" required
                        class="w-full px-4 py-2.5 bg-white border border-zinc-300 rounded-lg text-sm focus:outline-none focus:border-zinc-900 transition-colors"
                        placeholder="Contoh: 08123456789">
                </div>

                <div>
                    <label for="address" class="block text-sm font-medium text-zinc-700 mb-2">Alamat Lengkap Pengiriman</label>
                    <textarea name="address" id="address" rows="4" required
                        class="w-full px-4 py-2.5 bg-white border border-zinc-300 rounded-lg text-sm focus:outline-none focus:border-zinc-900 transition-colors resize-none"
                        placeholder="Tuliskan jalan, nomor rumah, RT/RW, kecamatan, dan kota..."></textarea>
                </div>

                <div class="pt-4">
                    <button type="submit" 
                        class="w-full bg-zinc-900 hover:bg-zinc-800 text-white font-medium py-3.5 px-4 rounded-xl text-sm transition-colors shadow-sm cursor-pointer text-center">
                        Konfirmasi & Selesaikan Pembayaran
                    </button>
                </div>
            </form>

            <div class="lg:col-span-5 bg-white border border-zinc-200 rounded-2xl p-6 shadow-sm space-y-4">
                <h3 class="text-sm font-bold text-zinc-900 uppercase tracking-wider border-b border-zinc-100 pb-3">Ringkasan Barang</h3>
                
                @php $total = 0; @endphp
                <div class="divide-y divide-zinc-100 max-h-60 overflow-y-auto pr-2">
                    @foreach($cart as $id => $details)
                        @php $total += $details['price'] * $details['quantity']; @endphp
                        <div class="flex items-center justify-between py-3 text-sm">
                            <div class="truncate pr-4">
                                <p class="font-medium text-zinc-900 truncate">{{ $details['name'] }}</p>
                                <p class="text-xs text-zinc-500 mt-0.5">{{ $details['quantity'] }} unit x Rp {{ number_format($details['price'], 0, ',', '.') }}</p>
                            </div>
                            <span class="font-semibold text-zinc-950 shrink-0">
                                Rp {{ number_format($details['price'] * $details['quantity'], 0, ',', '.') }}
                            </span>
                        </div>
                    @endforeach
                </div>

                <div class="border-t border-zinc-200 pt-4 flex justify-between items-center">
                    <span class="text-sm font-medium text-zinc-600">Total Tagihan:</span>
                    <span class="text-xl font-black text-zinc-950">Rp {{ number_format($total, 0, ',', '.') }}</span>
                </div>
            </div>

        </div>
    </main>

</body>
</html>
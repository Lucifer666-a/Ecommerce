<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Transaksi - Admin Stuffus</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-zinc-50 text-zinc-950 font-sans antialiased">

    <div class="max-w-6xl mx-auto my-12 px-4">
        <div class="border-b border-zinc-200 pb-5 mb-8 flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold tracking-tight text-zinc-900">Riwayat Pesanan Masuk</h1>
                <p class="text-sm text-zinc-500 mt-1">Daftar rekaman transaksi penjualan toko Stuffus.</p>
            </div>
            <a href="{{ route('admin.products.index') }}" class="text-sm font-medium text-zinc-600 hover:text-zinc-950">&larr; Dashboard Utama</a>
        </div>

        <div class="bg-white border border-zinc-200 rounded-xl overflow-hidden shadow-sm">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-zinc-50 border-b border-zinc-200 text-xs font-semibold text-zinc-600 uppercase tracking-wider">
                        <th class="px-6 py-4">Tanggal</th>
                        <th class="px-6 py-4">Pelanggan</th>
                        <th class="px-6 py-4">Alamat Pengiriman</th>
                        <th class="px-6 py-4">Produk yang Dibeli</th>
                        <th class="px-6 py-4">Total Bayar</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-100 text-sm">
                    @forelse($orders as $order)
                        <tr class="hover:bg-zinc-50/50 transition-colors">
                            <td class="px-6 py-4 text-xs text-zinc-500 whitespace-nowrap">
                                {{ $order->created_at->format('d M Y, H:i') }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-medium text-zinc-900">{{ $order->customer_name }}</div>
                                <div class="text-xs text-zinc-400 mt-0.5">{{ $order->phone }}</div>
                            </td>
                            <td class="px-6 py-4 text-zinc-600 max-w-xs truncate">{{ $order->address }}</td>
                            <td class="px-6 py-4 text-zinc-700">
                                <ul class="list-disc list-inside space-y-0.5 text-xs">
                                    @foreach(json_decode($order->items, true) as $item)
                                        <li>{{ $item['name'] }} <span class="text-zinc-400">({{ $item['quantity'] }}x)</span></li>
                                    @endforeach
                                </ul>
                            </td>
                            <td class="px-6 py-4 font-bold text-zinc-950">
                                Rp {{ number_format($order->total_price, 0, ',', '.') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-10 text-center text-sm text-zinc-400 bg-zinc-50/30">
                                Belum ada riwayat penjualan yang tercatat.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
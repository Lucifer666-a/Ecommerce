<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Stuffus</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-zinc-50 text-zinc-950 font-sans antialiased">

    <div class="max-w-6xl mx-auto my-12 px-4">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center border-b border-zinc-200 pb-5 mb-8 gap-4">
            <div>
                <h1 class="text-2xl font-bold tracking-tight text-zinc-900">Dashboard Admin</h1>
                <p class="text-sm text-zinc-500 mt-1">Kelola katalog barang toko Stuffus dari satu halaman terpusat.</p>
            </div>
            <a href="{{ route('admin.products.create') }}" 
                class="bg-zinc-900 hover:bg-zinc-800 text-white text-sm font-medium py-2.5 px-4 rounded-lg transition-colors shadow-sm cursor-pointer">
                + Tambah Produk Baru
            </a>
        </div>

        @if(session('success'))
            <div class="mb-6 p-4 bg-zinc-950 text-white text-sm rounded-lg shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white border border-zinc-200 rounded-xl overflow-hidden shadow-sm">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-zinc-50 border-b border-zinc-200 text-xs font-semibold text-zinc-600 uppercase tracking-wider">
                        <th class="px-6 py-4">Gambar</th>
                        <th class="px-6 py-4">Nama Produk</th>
                        <th class="px-6 py-4">Harga</th>
                        <th class="px-6 py-4">Stok</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-100 text-sm">
                    @forelse($products as $product)
                        <tr class="hover:bg-zinc-50/50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="h-12 w-12 rounded-lg bg-zinc-100 overflow-hidden border border-zinc-200">
                                    @if($product->image)
                                        <img src="{{ asset('images/' . $product->image) }}" class="h-full w-full object-cover">
                                    @else
                                        <div class="h-full w-full flex items-center justify-center text-zinc-400 text-[10px]">No Img</div>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4 font-medium text-zinc-900">{{ $product->name }}</td>
                            <td class="px-6 py-4 text-zinc-600">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                            <td class="px-6 py-4">
                                <span class="{{ $product->stock == 0 ? 'text-red-600 font-semibold' : 'text-zinc-600' }}">
                                    {{ $product->stock }} unit
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right space-x-3">
                                <a href="{{ route('admin.products.edit', $product->id) }}" class="text-zinc-600 hover:text-zinc-950 font-medium hover:underline">Edit</a>
                                
                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini secara permanen?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 font-medium hover:underline cursor-pointer">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-10 text-center text-sm text-zinc-400 bg-zinc-50/30">
                                Belum ada produk yang didaftarkan ke dalam database.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
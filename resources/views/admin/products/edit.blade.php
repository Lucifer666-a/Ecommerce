<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Edit Produk</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-zinc-50 text-zinc-900 font-sans antialiased">

    <div class="max-w-2xl mx-auto my-12 px-4">
        <div class="border-b border-zinc-200 pb-4 mb-8 flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold tracking-tight text-zinc-900">Edit Data Produk</h1>
                <p class="text-sm text-zinc-500 mt-1">Perbarui rincian informasi produk pilihan Anda.</p>
            </div>
            <a href="{{ route('admin.products.index') }}" class="text-sm text-zinc-500 hover:text-zinc-900 font-medium">&larr; Batal</a>
        </div>

        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT') <div>
                <label for="name" class="block text-sm font-medium text-zinc-700 mb-2">Nama Produk</label>
                <input type="text" name="name" id="name" required value="{{ $product->name }}"
                    class="w-full px-4 py-2.5 bg-white border border-zinc-300 rounded-lg text-sm focus:outline-none focus:border-zinc-900 transition-colors">
            </div>

            <div>
                <label for="price" class="block text-sm font-medium text-zinc-700 mb-2">Harga (Rupiah)</label>
                <input type="number" name="price" id="price" required value="{{ $product->price }}"
                    class="w-full px-4 py-2.5 bg-white border border-zinc-300 rounded-lg text-sm focus:outline-none focus:border-zinc-900 transition-colors">
            </div>

            <div>
                <label for="stock" class="block text-sm font-medium text-zinc-700 mb-2">Jumlah Stok Barang</label>
                <input type="number" name="stock" id="stock" required min="0" value="{{ $product->stock }}"
                    class="w-full px-4 py-2.5 bg-white border border-zinc-300 rounded-lg text-sm focus:outline-none focus:border-zinc-900 transition-colors">
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-zinc-700 mb-2">Deskripsi Produk</label>
                <textarea name="description" id="description" rows="5" required
                    class="w-full px-4 py-2.5 bg-white border border-zinc-300 rounded-lg text-sm focus:outline-none focus:border-zinc-900 transition-colors resize-none">{{ $product->description }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-zinc-700 mb-2">Gambar Produk (Biarkan kosong jika tidak diganti)</label>
                
                @if($product->image)
                    <div class="mb-3 flex items-center gap-3">
                        <img src="{{ asset('images/' . $product->image) }}" class="h-16 w-16 rounded-lg object-cover border border-zinc-200">
                        <span class="text-xs text-zinc-500">Gambar saat ini yang sedang aktif</span>
                    </div>
                @endif

                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-zinc-300 border-dashed rounded-lg hover:border-zinc-400 transition-colors bg-white">
                    <div class="space-y-1 text-center">
                        <div class="flex text-sm text-zinc-600 justify-center">
                            <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-zinc-900 hover:underline">
                                <span>Unggah file gambar baru</span>
                                <input id="image" name="image" type="file" class="sr-only" accept="image/*">
                            </label>
                        </div>
                        <p class="text-xs text-zinc-500">PNG, JPG, JPEG sampai dengan 2MB</p>
                    </div>
                </div>
            </div>

            <div class="pt-4">
                <button type="submit" 
                    class="w-full bg-zinc-900 hover:bg-zinc-800 text-white font-medium py-3 px-4 rounded-lg text-sm transition-colors shadow-sm cursor-pointer">
                    Perbarui Rincian Data Produk
                </button>
            </div>
        </form>
    </div>

</body>
</html>
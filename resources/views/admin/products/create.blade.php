<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Tambah Produk</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-zinc-50 text-zinc-900 font-sans antialiased">

    <div class="max-w-2xl mx-auto my-12 px-4">
        <div class="border-b border-zinc-200 pb-4 mb-8">
            <h1 class="text-2xl font-bold tracking-tight text-zinc-900">Tambah Produk Baru</h1>
            <p class="text-sm text-zinc-500 mt-1">Isi formulir di bawah untuk menambahkan produk ke katalog utama.</p>
        </div>

        @if(session('success'))
            <div class="mb-6 p-4 bg-zinc-900 text-white text-sm rounded-lg shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-zinc-700 mb-2">Nama Produk</label>
                <input type="text" name="name" id="name" required
                    class="w-full px-4 py-2.5 bg-white border border-zinc-300 rounded-lg text-sm focus:outline-none focus:border-zinc-900 transition-colors"
                    placeholder="Contoh: Phone Holder Sakti">
            </div>

            <div>
                <label for="price" class="block text-sm font-medium text-zinc-700 mb-2">Harga (Rupiah)</label>
                <input type="number" name="price" id="price" required
                    class="w-full px-4 py-2.5 bg-white border border-zinc-300 rounded-lg text-sm focus:outline-none focus:border-zinc-900 transition-colors"
                    placeholder="Contoh: 450000">
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-zinc-700 mb-2">Deskripsi Produk</label>
                <textarea name="description" id="description" rows="5" required
                    class="w-full px-4 py-2.5 bg-white border border-zinc-300 rounded-lg text-sm focus:outline-none focus:border-zinc-900 transition-colors resize-none"
                    placeholder="Tuliskan spesifikasi detail mengenai produk..."></textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-zinc-700 mb-2">Gambar Produk</label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-zinc-300 border-dashed rounded-lg hover:border-zinc-400 transition-colors bg-white">
                    <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-zinc-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                            <path d="M28 8H12a4 4 0 00-4 4v20a4 4 0 004 4h16a4 4 0 004-4V12a4 4 0 00-4-4z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M14 26l7-7 7 7M16 10l4 4-4 4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex text-sm text-zinc-600 justify-center">
                            <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-zinc-900 hover:underline">
                                <span>Unggah file gambar</span>
                                <input id="image" name="image" type="file" class="sr-only" required accept="image/*">
                            </label>
                        </div>
                        <p class="text-xs text-zinc-500">PNG, JPG, JPEG sampai dengan 2MB</p>
                    </div>
                </div>
            </div>

            <div class="pt-4">
                <button type="submit" 
                    class="w-full bg-zinc-900 hover:bg-zinc-800 text-white font-medium py-3 px-4 rounded-lg text-sm transition-colors shadow-sm cursor-pointer">
                    Simpan Produk ke Database
                </button>
            </div>
        </form>
    </div>

</body>
</html>
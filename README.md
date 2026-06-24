# Stuffus - Minimalist E-Commerce Platform

Stuffus adalah aplikasi platform e-commerce (toko online) modern yang dirancang dengan antarmuka minimalis namun memiliki fitur manajemen inventaris dan transaksi yang kuat. Aplikasi ini ditujukan untuk mempermudah operasional pemilik toko (Admin) dalam mengelola katalog produk serta memantau pesanan masuk secara real-time dari pelanggan.

## 📺 Video Demo Aplikasi
[![Tonton Video Demo](https://img.shields.io/badge/YouTube-Video%20Demo-red?style=for-the-badge&logo=youtube)](TARUH_LINK_VIDEO_YOUTUBE_ATAU_LOOM_DI_SINI)
*Klik badge di atas untuk melihat demonstrasi alur fitur lengkap dari sisi User maupun Admin.*

## 🚀 Fitur Utama

### 🛒 Sisi Pelanggan (User Interface)
* **Pencarian Produk Interaktif:** Memudahkan pengguna menyaring produk impian berdasarkan kecocokan nama dan deskripsi produk secara instan.
* **Sistem Keranjang Belanja Kilat:** Fitur penambahan produk ke keranjang belanja (Add to Cart) berbasis session yang stabil.
* **Instan Checkout (Buy Now):** Alur transaksi super cepat untuk membeli produk tunggal tanpa harus melewati antrean keranjang.
* **Proteksi Pengisian Alamat:** Validasi formulir pengiriman (Nama, No. Telepon, Alamat) sebelum pesanan diproses oleh sistem.

### 💼 Sisi Pemilik Toko (Admin Panel)
* **Portal Utama Kendali Kontrol (`/admin`):** Halaman Hub pusat navigasi yang bersih untuk mengarahkan Admin ke manajemen produk atau laporan penjualan.
* **Autentikasi Keamanan Kustom (Middleware):** Mengunci seluruh rute dapur operasional admin sehingga hanya akun dengan peran `admin` yang diizinkan masuk.
* **CRUD Manajemen Produk Lengkap:** Fitur menambah produk baru, mengunggah gambar, mengubah harga, mengedit detail, hingga menghapus item dari katalog.
* **Pengaman Stok Otomatis (Race Condition Protection):** Sistem pengecekan stok berlapis (*double-validation*) sebelum checkout untuk mencegah stok minus akibat dibeli bersamaan.
* **Riwayat Transaksi Digital (Order History):** Buku nota digital otomatis di database yang mencatat detail pembeli, alamat, produk yang dipesan, waktu presisi, dan total omset pendapatan.

## 🛠️ Tech Stack

Aplikasi ini dibangun menggunakan kombinasi teknologi modern:

* **Back-End Framework:** Laravel 11
* **Database Management:** MySQL (Eloquent ORM & Migrations)
* **Front-End Styling:** Tailwind CSS v4 (Desain Minimalis Monokrom)
* **Environment Tool:** Laravel Tinker (Manajemen Akun Administratif)

## 📦 Cara Menjalankan Proyek di Lokal

1. **Clone Repositori:**
   git clone [https://github.com/USERNAME_KAMU/Ecommerce.git](https://github.com/USERNAME_KAMU/Ecommerce.git)
   cd Ecommerce

```

2. **Instalasi Dependensi Dependencies:**

```bash
   composer install

```

3. **Konfigurasi Environment:**
Salin file `.env.example` menjadi `.env` lalu sesuaikan konfigurasi database MySQL Anda.

```bash
   cp .env.example .env
   php artisan key:generate

```

4. **Migrasi Database:**

```bash
   php artisan migrate

```

5. **Membuat Akun Admin Perdana (Via Tinker):**

```bash
   php artisan tinker

```

Di dalam shell Tinker, jalankan:

```php
   \App\Models\User::create(['name' => 'Admin Pro', 'email' => 'admin@stuffus.com', 'password' => bcrypt('password123'), 'role' => 'admin']);

```

Ketik `exit` untuk keluar.

6. **Jalankan Aplikasi:**

```bash
   php artisan serve

```

Buka `http://127.0.0.1:8000` di browser Anda.

---

© 2026 Stuffus E-Commerce. Built with logic and clean code.

```

---

### 💡 Tips Tambahan Sebelum Kamu Commit:
* Ganti teks `TARUH_LINK_VIDEO_YOUTUBE_ATAU_LOOM_DI_SINI` dengan link video rekaman tokomu yang asli.
* Ganti URL `[https://github.com/USERNAME_KAMU/Ecommerce.git](https://github.com/USERNAME_KAMU/Ecommerce.git)` dengan link repositori GitHub kamu yang sebenarnya. 

README yang rapi seperti ini bakal ngasih impresi pertama kalau kamu adalah developer yang terstruktur dan peduli sama dokumentasi kodingan. Tinggal kamu taruh di file `README.md` utama kamu!

```
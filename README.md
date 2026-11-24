# Aplikasi Data Buku (UTS PBO)

Aplikasi sederhana untuk mengelola data buku perpustakaan, dibuat dengan Laravel 13 memakai alur Route, Controller, dan Blade.
Data disimpan di session (tanpa database) sesuai aturan ujian.

- Nama: Ariya Wijaya
- NIM: 20251020035
- Mata kuliah: Pemrograman Berorientasi Objek (TI033015)

## Fitur

- Lihat daftar buku
- Lihat detail buku
- Tambah buku (ada validasi dan cek kode kembar)
- Edit buku (kode tidak bisa diubah)
- Hapus buku (ada konfirmasi)
- Pesan sukses atau error, termasuk kalau kode buku tidak ditemukan

## Yang dibutuhkan

- PHP 8.3 atau lebih baru
- Composer

## Cara menjalankan

1. Clone repository ini lalu masuk ke foldernya:
   ```
   git clone https://github.com/aryawzzyy-source/pbo-buku.git
   cd pbo-buku
   ```
2. Pasang dependensi:
   ```
   composer install
   ```
3. Buat file `.env` dan app key:
   ```
   copy .env.example .env
   php artisan key:generate
   ```
   (di Linux atau macOS pakai `cp` sebagai ganti `copy`)
4. Buka `.env`, pastikan isinya:
   ```
   SESSION_DRIVER=file
   ```
5. Jalankan:
   ```
   php artisan config:clear
   php artisan serve
   ```
6. Buka `http://127.0.0.1:8000/buku` di browser.

Catatan: folder `storage/framework/sessions` harus bisa ditulisi. Data awal (BK001 dan BK002) ditulis di Controller, dan data yang ditambah akan hilang kalau session dibersihkan.

## Route

| Method    | URI               | Nama Route   | Aksi    |
|-----------|-------------------|--------------|---------|
| GET       | /buku             | buku.index   | index   |
| GET       | /buku/create      | buku.create  | create  |
| POST      | /buku             | buku.store   | store   |
| GET       | /buku/{kode}      | buku.show    | show    |
| GET       | /buku/{kode}/edit | buku.edit    | edit    |
| PUT/PATCH | /buku/{kode}      | buku.update  | update  |
| DELETE    | /buku/{kode}      | buku.destroy | destroy |

Bisa dicek dengan `php artisan route:list --path=buku`.

## File utama

- `routes/web.php` : daftar route
- `app/Http/Controllers/BukuController.php` : logika CRUD
- `resources/views/layouts/app.blade.php` : layout utama
- `resources/views/buku/` : halaman index, show, create, edit, dan `_form`

File `.env`, folder `vendor`, dan `node_modules` tidak ikut diunggah.
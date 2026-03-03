# Syndicate Boosting

## Panduan Instalasi Lokal (Windows)

### Persyaratan Sistem

1. **Composer** (untuk manajemen dependensi PHP).
2. **PHP minimal versi 8.2**.
    - Jika XAMPP Anda menggunakan versi PHP di bawah 8.2, silakan perbarui.
    - Cara termudah: **Uninstall** XAMPP versi lama Anda, lalu unduh dan **install** XAMPP versi terbaru.
    - Pastikan PHP sudah terhubung ke _Environment Variables_ (Path) Windows Anda.

### Langkah-langkah Instalasi

1. _Clone repository_ proyek:
    ```bash
    git clone https://github.com/WageFolabessy/syndicate-boosting.git
    ```
2. Buka terminal/command prompt di dalam folder proyek, lalu jalankan instalasi dependensi:
    ```bash
    composer install
    ```
3. Salin file `.env.example` dan ubah namanya menjadi `.env`:
    ```bash
    copy .env.example .env
    ```
    _(atau bisa diklik copy dan paste secara manual)_
4. Buka file `.env` dan atur nama database (`DB_DATABASE`). Kemudian, buka **phpMyAdmin** XAMPP dan buat sebuah database baru dengan nama yang sama persis seperti yang diatur di `.env`.
5. _Generate_ kunci enkripsi aplikasi:
    ```bash
    php artisan key:generate
    ```
6. Jalankan migrasi beserta _seeder_ ke database:
    ```bash
    php artisan migrate --seed
    ```
7. Jalankan _local development server_:
    ```bash
    php artisan serve
    ```
    _(Aplikasi kini sudah bisa diakses di browser melalui URL http://localhost:8000)_

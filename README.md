# Reservasi Kereta

Aplikasi **Reservasi Kereta** adalah sebuah aplikasi web sederhana untuk melakukan reservasi tiket kereta. Aplikasi ini menggunakan PHP dengan arsitektur MVC dan menggunakan Laragon sebagai server lokal. Aplikasi ini juga mendukung penggunaan **Pretty URL**.

## Persyaratan

- [Laragon](https://laragon.org/download/)
- PHP 7.x atau lebih baru
- Composer
- MySQL atau PostgreSQL (bisa disesuaikan di `.env`)

## Instalasi

1. **Clone repository ini ke folder `www` di Laragon:**
   ```
   git clone https://github.com/username/repository.git ReservasiKereta
   ```
2. **Masuk ke folder proyek:**
   ```
   cd ReservasiKereta
   ```
3. **Instal dependensi menggunakan Composer:**
   ```
   composer install
   ```
4. **Salin file .env.example menjadi .env dan sesuaikan konfigurasi database di dalamnya:**

   ```
   cp .env.example .env

   ```

5. **Setup database:**
   - Buat database baru di MySQL dengan nama yang sesuai (reservasi_kereta sesuai di atas).
   - Jalankan migration atau import database SQL jika tersedia.

## Mengatur Pretty URL di Laragon

1. **Aktifkan mod_rewrite di Apache:**
   - Buka Menu Laragon → Apache → httpd.conf.
   - Pastikan baris berikut tidak dikomentari:
   ```
   LoadModule rewrite_module modules/mod_rewrite.so
   ```
2. **Tambahkan Virtual Host (opsional, untuk akses via domain kustom):**

   - Buka Menu Laragon → Apache → sites-enabled → tambahkan file .conf untuk domain kustom Anda:

   ```
   <VirtualHost *:80>
       DocumentRoot "C:/laragon/www/ReservasiKereta/public"
       ServerName reservasi-kereta.test
   </VirtualHost>
   ```

   - Tambahkan reservasi-kereta.test ke file C:\Windows\System32\drivers\etc\hosts

   ```
   127.0.0.1  reservasi-kereta.test

   ```

3. **Tambahkan file .htaccess di folder public: Pastikan file .htaccess sudah ada dan memiliki isi seperti ini:**
   ```
   RewriteEngine On
   RewriteCond %{REQUEST_FILENAME} !-f
   RewriteCond %{REQUEST_FILENAME} !-d
   RewriteRule ^(.*)$ index.php?url=$1 [QSA,L]
   ```

## Menjalankan Aplikasi

1. Jalankan Laragon dan buka browser ke alamat:
   - Jika menggunakan domain kustom: http://reservasi-kereta.test
2. Mulai menggunakan aplikasi dengan mengakses halaman-halaman berikut:
   - / - Halaman utama untuk mencari tiket.
   - /user/login - Halaman login pengguna.
   - /user/register - Halaman registrasi pengguna.

## Struktur Folder

    ```
    └── ReservasiKereta
    └── config/ # Konfigurasi aplikasi
    └── public/ # Akses publik, berisi file assets dan .htaccess
    └── src/ # Sumber kode aplikasi
    └── controllers/ # Controller aplikasi
    └── core/ # Core framework sederhana
    └── models/ # Model untuk database
    └── views/ # Tampilan untuk aplikasi
    └── .env # Konfigurasi lingkungan
    └── composer.json # Konfigurasi dependensi Composer
    ```

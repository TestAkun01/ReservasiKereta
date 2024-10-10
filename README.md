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

   - Tambahkan reservasikereta.test ke file C:\Windows\System32\drivers\etc\hosts

   ```
   127.0.0.1  reservasikereta.test
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
   - Jika menggunakan domain kustom: http://reservasikereta.test
2. Mulai menggunakan aplikasi dengan mengakses halaman-halaman berikut:
   - / - Halaman utama untuk mencari tiket.

## Cara Berkontribusi

Kami menyambut baik kontribusi dari Anda! Berikut adalah panduan untuk berkontribusi pada proyek ini:

### Langkah-langkah Kontribusi

1. **Fork Proyek Ini:**

   - Klik tombol "Fork" di bagian kanan atas halaman GitHub untuk membuat salinan repositori di akun GitHub Anda.

2. **Clone Repositori:**

   - Clone repositori yang telah Anda fork ke mesin lokal Anda:
     ```
     git clone https://github.com/TestAkun01/ReservasiKereta.git
     ```

3. **Buat Branch Baru:**

   - Sebelum melakukan perubahan, buat branch baru untuk fitur atau perbaikan yang akan Anda buat:
     ```
     git checkout -b nama-branch
     ```

4. **Lakukan Perubahan:**

   - Lakukan perubahan yang diinginkan pada kode.

5. **Commit Perubahan:**

   - Setelah selesai, lakukan commit terhadap perubahan yang telah Anda buat:
     ```
     git add .
     git commit -m "Deskripsi singkat mengenai perubahan"
     ```

6. **Push ke Repository Anda:**

   - Kirim branch yang telah Anda buat ke repositori Anda:
     ```
     git push origin nama-branch
     ```

7. **Buat Pull Request:**
   - Kunjungi halaman repositori asli dan Anda akan melihat opsi untuk membuat Pull Request. Klik tombol "Compare & pull request" dan tambahkan deskripsi tentang perubahan Anda.

### Panduan Kode

- Pastikan untuk mengikuti konvensi penulisan kode yang ada di proyek ini.
- Selalu lakukan pengujian untuk memastikan bahwa perubahan Anda tidak merusak fungsi yang ada.

### Laporan Masalah

Jika Anda menemukan bug atau memiliki saran untuk fitur baru, silakan buka [issue](https://github.com/TestAkun01/ReservasiKereta/issues) baru di repositori ini. Sertakan deskripsi yang jelas dan langkah-langkah untuk mereproduksi masalah yang Anda temui.

Kami sangat menghargai setiap kontribusi dan masukan yang Anda berikan!

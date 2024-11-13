# Reservasi Kereta

Aplikasi **Reservasi Kereta** adalah sebuah aplikasi web sederhana untuk melakukan reservasi tiket kereta. Aplikasi ini menggunakan PHP dengan arsitektur MVC dan menggunakan Laragon sebagai server lokal.

## Persyaratan

- [Laragon](https://laragon.org/download/)
- PHP 7.x atau lebih baru
- [Composer](https://getcomposer.org)
- MySQL

## Instalasi

1. **Instal dependensi menggunakan Composer:**
   ```
   composer install
   ```
2. **Salin file .env.example menjadi .env dan sesuaikan konfigurasi database di dalamnya:**

   ```
   cp .env.example .env
   ```

3. **Setup database:**
   - Buat database baru di MySQL dengan nama yang sesuai (train_reservation sesuai di atas).
   - Buka Terminal atau Command Prompt.
   - Jalankan perintah berikut untuk eksport atau import database. pastikan terminal dapat mengakses command php dengan cara memasukkan D:\path\to\your\php-version di path environment variable account.
   ```
   php manageDB.php [export|import] [filename = backup.sql]
   ```

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

## Menjalankan Aplikasi

1. Jalankan Laragon dan buka browser ke alamat:
   - Jika menggunakan domain kustom: http://reservasikereta.test
2. Mulai menggunakan aplikasi dengan mengakses halaman-halaman berikut:
   - / - Halaman utama untuk mencari tiket.

## Cara Berkontribusi

1. **Fork Proyek Ini:**

   - Klik tombol "Fork" di bagian kanan atas halaman GitHub untuk membuat salinan repositori di akun GitHub Anda.

2. **Clone Repositori:**

   - Clone repositori yang telah Anda fork ke mesin lokal Anda:
     ```
     git clone https://github.com/username/repository.git
     ```
   - Gantilah `username` dengan username GitHub Anda dan `repository` dengan nama repositori.

3. **Buat Branch Baru:**

   - Sebelum melakukan perubahan, buat branch baru untuk fitur atau perbaikan yang akan Anda buat:
     ```
     git checkout -b nama-branch
     ```

4. **Lakukan Perubahan:**

   - Lakukan instalasi dan rubah kode yang di inginkan.

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

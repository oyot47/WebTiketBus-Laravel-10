# Sistem Informasi Manajemen Tiket Bus

## Deskripsi
Proyek ini adalah sistem manajemen tiket elektronik untuk layanan bus. Sistem ini memungkinkan pengguna untuk memesan tiket bus, melihat detail tiket, data penumpang, dan mencetak tiket mereka dengan kode QR. Fitur lainnya termasuk mengelola jadwal keberangkatan, tujuan, dan informasi bus.


## Demo
### Tampilan Halaman Dashboard Admin
![Tampilan Halaman Dashboard Admin](https://github.com/rizkimulyawann/WebTiketBus-Laravel-10/blob/main/public/images/admin.png)

### Tampilan Halaman Home User
![Tampilan Halaman Home User](https://github.com/rizkimulyawann/WebTiketBus-Laravel-10/blob/main/public/images/home_user.png)

### Tampilan Halaman Tiket Yang Sudah Di Beli
![Tampilan Halaman Tiket Yang Sudah Di Beli](https://github.com/rizkimulyawann/WebTiketBus-Laravel-10/blob/main/public/images/tampilan_tiket.png)

### Tampilan Tiket Jadwal
![Tampilan Tiket Jadwal](https://github.com/rizkimulyawann/WebTiketBus-Laravel-10/blob/main/public/images/tiket.png)


## Fitur
- Pemesanan tiket bus online
- Melihat detail tiket
- Melihat data penumpang
- Mencetak tiket dengan kode QR
- Mengelola jadwal keberangkatan dan tujuan
- Mengelola informasi bus (nomor plat, kelas, fasilitas, jumlah kursi, format kursi)

## Prasyarat
Sebelum menginstal proyek ini, pastikan Anda memiliki:
- PHP >= 8.0
- Composer
- Laravel >= 10
- Database MySQL
- XAMPP

## Instalasi
Ikuti langkah-langkah di bawah ini untuk menginstal dan menjalankan proyek ini di lingkungan lokal Anda.

1. **Clone Repository**
   -git clone https://github.com/username/WebTiketBus-Laravel-10.git
   -cd WebTiketBus-Laravel-10

2. **Install dependencies**
   -composer install
   -npm install

3. **Generate Key Aplikasi**
   -php artisan key:generate
   -php artisan storage:link

4. **Migrasi dan Seed Database**
   -php artisan migrate --seed

5. **Jalankan serve**
   -php artisan serve



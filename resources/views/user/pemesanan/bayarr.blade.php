<!DOCTYPE html>
<html>
    <head>
      <title>Tiket</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway&display=swap">
        <script src="{{ asset('..\js\sidebar.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('..\css\admin2.css') }}">
        <style>
         body {
    background-color: #f2f2f2;
    font-family: 'Arial', sans-serif;
}

#nav-checkbox, .nav-toggle {
    display: none;
}

/* -----------------*/
.hero a:hover {
    background: #c00101;
}

.hero {
    position: relative; /* Menetapkan posisi relatif */
    z-index: 1; /* Menetapkan z-index lebih rendah dari header */
}

.hero img {
    position: absolute; /* Menetapkan posisi absolut */
    top: 0; /* Menempatkan gambar di bagian atas */
    left: 0; /* Menempatkan gambar di bagian kiri */
    width: 100%; /* Menyesuaikan lebar gambar dengan lebar layar */
    height: auto; /* Menyesuaikan tinggi gambar secara otomatis */
    z-index: 0; /* Menetapkan z-index lebih rendah dari header */
}

header {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    color: #000; /* Warna teks header */
    padding: 20px 0;
    display: flex;
    align-items: center;
    justify-content: space-around;
    transition: background-color 0.5s ease;
    background-color: white; /* Tambahkan background putih untuk header */
    z-index: 999;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    height: 50px;
}

.logo h2 {
    color: #000000;
    text-transform: uppercase;
    font-weight: normal;
}

.nav-menu li {
    display: inline-block;
}

.nav-menu li a {
    color: #000000;
    text-decoration: none;
    font-size: 20px;
    padding: 0 15px;
}

.nav-menu li a:hover {
    color: #ffffff;
}

.active {
    background: #ffffff;
}

.active a:hover {
    color: #cf1d1d !important;
}

.active .nav-menu li a {
    color: #030000;
    text-decoration: none;
    font-size: 20px;
    padding: 0 15px;
}

.nav-menu li a:hover {
    color: #7a12d4;
}

.active .logo h2 {
    color: #000000;
    text-transform: uppercase;
    font-weight: normal;
}

.nav-menu p {
    display: inline-block;
    margin-right: 15px;
    font-size: 16px; /* Atur ukuran font sesuai kebutuhan */
    font-weight: bold; /* Atur ketebalan font sesuai kebutuhan */
    color: #000000; /* Atur warna teks sesuai kebutuhan */
}

.nav-menu {
    display: flex;
    align-items: center; /* Menengahkan vertikal */
    height: 40px; /* Tambahkan tinggi sesuai kebutuhan */
}

.horizontal-line {
    border: none; /* Menghapus border default */
    border-top: 1px solid #000000; /* Menambahkan garis horizontal */
    width: 10px; /* Menyesuaikan lebar garis dengan lebar konten */
    margin: 10px 0; /* Menentukan jarak dari konten */
}

.circle {
    width: 20px;
    height: 20px;
    border-radius: 50%; /* Membuat lingkaran dengan border-radius setengah dari lebar/tinggi */
    background-color: #007bff; /* Warna latar belakang */
    color: #fff; /* Warna teks */
    text-align: center; /* Teks di tengah */
    line-height: 20px; /* Memastikan angka berada di tengah */
    font-size: 14px; /* Ukuran teks */
}

.sidebar {
    position: fixed; /* Tetap di tempat saat di-scroll */
    top: 0; /* Letakkan di bagian atas */
    left: 0; /* Letakkan di bagian kiri */
    width: 250px; /* Lebar sidebar */
    height: 100%; /* Tinggi maksimum sidebar */
    background-image: url('../images/banner4.png'); /* URL gambar untuk latar belakang */
    background-size: cover; /* Menyesuaikan gambar agar sesuai dengan ukuran sidebar */
    background-position: center; /* Posisi gambar di tengah sidebar */
    z-index: 999; /* Z-index agar di atas konten lain */
    padding-top: 50px; /* Ruang untuk header jika diperlukan */
}

.sidebar-content {
    padding: 20px; /* Ruang di dalam sidebar */
    color: #fff; /* Warna teks */
}

.main-content {
    margin-left: 250px; /* Menggeser konten utama ke kanan agar tidak tertutup oleh sidebar */
    padding: 20px; /* Ruang di dalam konten utama */
}

.container {
    background-color: #fff; /* Warna latar belakang putih */
    padding: 20px; /* Ruang di dalam container */
    border-radius: 5px; /* Mengatur sudut bulat */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Efek bayangan */
    margin-bottom: 20px; /* Jarak antar container */
    max-width: 600px; /* Maksimum lebar kontainer */
    margin: 5px; /* Posisi kontainer di tengah */
}

.passenger-info {
    margin-bottom: 20px; /* Jarak antar info penumpang */
}

.form-group {
    margin-bottom: 10px; /* Jarak antara form group */
}

label {
    display: block; /* Mengubah label menjadi blok */
    font-weight: bold; /* Mengatur tebal font */
}

input[type="text"], select {
    width: 100%; /* Lebar penuh */
    padding: 8px; /* Ruang di dalam input */
    border: 1px solid #ccc; /* Garis tepi */
    border-radius: 5px; /* Sudut bulat */
}

button[type="submit"] {
    padding: 10px 20px; /* Ruang di dalam tombol */
    background-color: #007bff; /* Warna latar belakang */
    color: #fff; /* Warna teks */
    border: none; /* Menghapus border */
    border-radius: 5px; /* Sudut bulat */
    cursor: pointer; /* Mengubah kursor saat diarahkan ke tombol */
}

button[type="submit"]:hover {
    background-color: #0056b3; /* Warna latar belakang saat dihover */
}

.button-row {
    display: flex;
    justify-content: space-between; /* Mengatur jarak yang sama di antara tombol */
    margin-top: 20px; /* Jarak antara baris tombol dan elemen lain di dalam container */
}

.button-row form,
.button-row button {
    margin-right: 10px; /* Jarak kanan antara tombol */
}

.payment-methods {
    display: flex;
    justify-content: space-between;
}

.payment-method {
    text-align: center;
    cursor: pointer;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.payment-method:hover {
    background-color: #f2f2f2;
}

.payment-method.selected {
    background-color: #ccc; /* Warna latar belakang yang berbeda saat dipilih */
}

.jadwal-info {
    display: flex;
    flex-wrap: wrap;
}

.jadwal-card {
    width: calc(50% - 20px);
    margin: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

.jadwal-card-header {
    background-color: #f2f2f2;
    padding: 10px;
    text-align: center;
}

.jadwal-card-body {
    padding: 10px;
    text-align: center;
}

h3 {
    margin: 0;
    font-size: 18px;
    color: #333;
}

p {
    margin: 0;
    font-size: 16px;
    color: #666;
}

label {
    outline: none;
}

a {
    outline: none;
    text-decoration: none; /* Menonaktifkan garis bawah default pada tautan */
}

.logo {
    outline: none;
}

/* Styles for the new sections */
#credit-card-info, #wallet-info, #bank-transfer-info {
    display: none;
}

#credit-card-info h2, #wallet-info h2, #bank-transfer-info h2 {
    margin-top: 0;
}

.input-field {
    margin-bottom: 15px;
}

.input-field label {
    display: block;
    margin-bottom: 5px;
}

.input-field input {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
}







      
      
        </style>
    </head>
    <body>
    
      <!-- Akhir sidebar -->
  
      <!-- Konten utama -->
      <div class="main-content">
          <header>
            <a href="#" onclick="document.getElementById('cancelForm').submit(); return false;">
                <div class="logo">
                    <h2>Busify</h2>
                </div>
            </a>
            <form id="cancelForm" action="{{ route('pemesanan.batalkan') }}" method="POST" style="display: none;">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id_transaksi" value="{{ $transaksi->id_transaksi }}">
            </form>
            
          
              <div class="navigation">
                  <input type="checkbox" id="nav-checkbox">
                  <label for="nav-checkbox" class="nav-toggle">
                      <img src="open.png" alt="open menu" class="open">
                      <img src="close.png" alt="close menu" class="close">
                  </label>
          
                  <div class="nav-menu" style="margin-left:300px">
                      <div class="circle" style="margin-left: 10px; background-color: #007bff;">1</div>
                      <p class="raleway-font" style="font-weight: 700; opacity: 0.7; font-size: 14px; margin-right: 10px; margin-left: 8px"> Pesanan</p>
                      <hr class="horizontal-line">
          
                      <div class="circle" style="margin-left: 10px; background-color: #007bff;">2</div>
                      <p class="raleway-font" style="font-weight: 700; opacity: 0.7; font-size: 14px; margin-right: 10px; margin-left: 8px"> Pembayaran</p>
                      <hr class="horizontal-line">
          
                      <div class="circle" style="margin-left: 10px; background-color: #0000009a;">3</div>
                      <p class="raleway-font" style="font-weight: 700; opacity: 0.7; font-size: 14px; margin-right: 10px; margin-left: 8px "> E-Ticket</p>
                  </div>
              </div>
          </header>
          <br><br><br><br><br>
          @foreach($namaTitelPenumpang as $index => $penumpang)
    <div class="container">
        <h2>Data Penumpang {{ $index + 1 }}</h2>
        <div class="passenger-info">
            <div class="form-group">
                <label for="titel{{ $index + 1 }}">Titel:</label>
                <input type="text" id="titel{{ $index + 1 }}" name="titel[]" class="form-control" value="{{ $penumpang['titel'] }}" readonly>
            </div>
            <div class="form-group">
                <label for="nama{{ $index + 1 }}">Nama Penumpang:</label>
                <input type="text" id="nama{{ $index + 1 }}" name="nama[]" class="form-control" value="{{ $penumpang['nama'] }}" readonly>
            </div>
        </div>
    </div>
    <br>
@endforeach

<div class="container">
    <h2>Data Jadwal</h2>
    <div class="jadwal-info">
        <div class="jadwal-card">
            <div class="jadwal-card-header">
                <h3>Tanggal Keberangkatan</h3>
            </div>
            <div class="jadwal-card-body">
                <p>{{ \Carbon\Carbon::parse($transaksi->jadwal->tanggal_keberangkatan)->format('d M Y') }}</p>
            </div>
        </div>

        <div class="jadwal-card">
            <div class="jadwal-card-header">
                <h3>Kota Asal</h3>
            </div>
            <div class="jadwal-card-body">
                <p>{{ $transaksi->jadwal->kotaAsal->nama }}</p>
            </div>
        </div>

        <div class="jadwal-card">
            <div class="jadwal-card-header">
                <h3>Kota Tujuan</h3>
            </div>
            <div class="jadwal-card-body">
                <p>{{ $transaksi->jadwal->kotaTujuan->nama }}</p>
            </div>
        </div>

        <div class="jadwal-card">
            <div class="jadwal-card-header">
                <h3>Harga Tiket</h3>
            </div>
            <div class="jadwal-card-body">
                <p>Rp {{ $transaksi->jadwal->harga_tiket }}</p>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <h2>Total Harga Tiket</h2>
    <div class="total-harga-tiket">
        <input type="text" id="total_harga_tiket" name="total_harga_tiket" class="form-control" value="{{ $totalHargaTiketFormatted }}" readonly>
    </div>
</div>
<div class="container">
    <h2>Pilih Cara Pembayaran</h2>
    <div class="payment-methods">
        <div class="payment-method" id="credit-card" name="metode_pembayaran">
            <i class="fas fa-credit-card"></i>
            <span>Kartu Kredit</span>
        </div>
        <div class="payment-method" id="wallet" name="metode_pembayaran">
            <i class="fas fa-wallet"></i>
            <span>Dompet Digital</span>
        </div>
        <div class="payment-method" id="bank-transfer" name="metode_pembayaran">
            <i class="fas fa-money-bill-wave"></i>
            <span>Transfer Bank</span>
        </div>
    </div>
</div>


<div class="container" id="credit-card-info" style="display: none;">
    <h2>Informasi Kartu Kredit</h2>
    <p>Masukkan detail kartu kredit Anda untuk melanjutkan pembayaran:</p>
    <div class="input-field">
        <label for="card-number">Nomor Kartu</label>
        <input type="text" id="card-number" name="card-number" placeholder="Masukkan nomor kartu kredit">
    </div>
    <div class="input-field">
        <label for="card-name">Nama Pemegang Kartu</label>
        <input type="text" id="card-name" name="card-name" placeholder="Masukkan nama pemegang kartu">
    </div>
    <div class="input-field">
        <label for="card-expiry">Tanggal Kedaluwarsa</label>
        <input type="text" id="card-expiry" name="card-expiry" placeholder="MM/YY">
    </div>
    <div class="input-field">
        <label for="card-cvv">Kode CVV</label>
        <input type="text" id="card-cvv" name="card-cvv" placeholder="Masukkan kode CVV">
    </div>
</div>

<div class="container" id="wallet-info" style="display: none;">
    <h2>Informasi Dompet Digital</h2>
    <p>Pilih dompet digital yang Anda gunakan dan ikuti langkah-langkahnya:</p>
    <ul>
        <li>OVO</li>
        <li>DANA</li>
        <li>GoPay</li>
        <li>LinkAja</li>
    </ul>
</div>

<div class="container" id="bank-transfer-info" style="display: none;">
    <h2>Tata Cara Transfer Bank</h2>
    <p>Langkah-langkah untuk melakukan transfer bank:</p>
    <ol>
        <li>Masukkan nomor rekening <strong>7206144027</strong> A/N <strong>MUHAMMAD RIZQI MULYAWAN</strong></li>
        <li>Lakukan transfer sesuai dengan nominal yang tertera</li>
        <li>Simpan bukti transfer sebagai referensi</li>
    </ol>
    <form action="{{ route('pembayaran2') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="jadwal_id" value="{{ $transaksi->jadwal_id }}">
        <input type="hidden" name="user_id" value="{{ $transaksi->user_id }}">
        <input type="hidden" name="jadwal_id" value="{{ $transaksi->jadwal_id }}">
        <div class="input-field">
            <label for="screenshot">Unggah Bukti Transfer</label>
            <input type="file" id="screenshot" name="screenshot" accept="image/*" onchange="checkFile()">
        </div>
        <!-- Input field lainnya -->
        <!-- Tombol Submit -->
        <button id="submit-button" type="submit" disabled>Kirim Bukti Transfer</button>
    </form>
        
    
</div>


<div class="container">
    <div class="button-row">
        <form action="{{ route('pemesanan.batalkan') }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="hidden" name="id_transaksi" value="{{ $transaksi->id_transaksi }}">
            <button type="submit">Batal Transaksi</button>
        </form>
        
    </div>
</div>

<script>


    function checkFile() {
        var fileInput = document.getElementById('screenshot');
        var submitButton = document.getElementById('submit-button');

        if (fileInput.files.length > 0) {
            submitButton.disabled = false; // Aktifkan tombol jika file dipilih
        } else {
            submitButton.disabled = true; // Nonaktifkan tombol jika tidak ada file yang dipilih
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
        var paymentMethods = document.querySelectorAll(".payment-method");
        var eticketButton = document.getElementById("eticket-button");
        var screenshotInput = document.getElementById("screenshot");

        paymentMethods.forEach(function(method) {
            method.addEventListener("click", function() {
                var selectedMethod = document.querySelector(".payment-method.selected");
                if (selectedMethod) {
                    selectedMethod.classList.remove("selected");
                }
                this.classList.add("selected");

                // Menampilkan atau menyembunyikan kontainer informasi pembayaran
                var creditCardInfo = document.getElementById("credit-card-info");
                var walletInfo = document.getElementById("wallet-info");
                var bankTransferInfo = document.getElementById("bank-transfer-info");

                creditCardInfo.style.display = this.id === "credit-card" ? "block" : "none";
                walletInfo.style.display = this.id === "wallet" ? "block" : "none";
                bankTransferInfo.style.display = this.id === "bank-transfer" ? "block" : "none";

                // Atur status tombol "Lanjut ke E-Ticket"
                if (this.id === "bank-transfer") {
                    eticketButton.disabled = true;
                } else {
                    eticketButton.disabled = false;
                }
            });
        });

        screenshotInput.addEventListener("change", function() {
            if (screenshotInput.files.length > 0) {
                eticketButton.disabled = false;
            } else {
                eticketButton.disabled = true;
            }
        });
    });
</script>
        
      </div>
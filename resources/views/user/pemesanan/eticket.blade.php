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
          body{
            background-color: #f2f2f2;
            
        font-family: 'Arial', sans-serif;
    
          }

          #nav-checkbox, .nav-toggle{
          display: none;
          }
          /* -----------------*/
          .hero a:hover{
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
      
          .logo h2{
          color: #000000;
          text-transform: uppercase;
          font-weight: normal;
          }
      
          .nav-menu li{
          display: inline-block;
          }
      
          .nav-menu li a{
          color: #000000;
          text-decoration: none;
          font-size: 20px;
          padding: 0 15px;
          }
      
          .nav-menu li a:hover{
          color: #ffffff;
          }
      
          .active{
          background: #ffffff;
          }
      
          .active a:hover{
          color: #cf1d1d !important;
      
          }
      
          .active .nav-menu li a{
          color: #030000;
          text-decoration: none;
          font-size: 20px;
          padding: 0 15px;
          }
      
          .nav-menu li a:hover{
          color: #7a12d4;
          }
      
          .active .logo h2{
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


          /* Gaya konten di dalam sidebar */
          .sidebar-content {
              padding: 20px; /* Ruang di dalam sidebar */
              color: #fff; /* Warna teks */
          }

          /* Gaya untuk konten utama */
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
    margin: 5px ;/* Posisi kontainer di tengah */
}


.passenger-info {
    margin-bottom: 20px; /* Jarak antar info penumpang */
}

/* Gaya untuk form group */
.form-group {
    margin-bottom: 10px; /* Jarak antara form group */
}

/* Gaya untuk label */
label {
    display: block; /* Mengubah label menjadi blok */
    font-weight: bold; /* Mengatur tebal font */
}

/* Gaya untuk input dan select */
input[type="text"],
select {
    width: 100%; /* Lebar penuh */
    padding: 8px; /* Ruang di dalam input */
    border: 1px solid #ccc; /* Garis tepi */
    border-radius: 5px; /* Sudut bulat */
}

/* Gaya untuk tombol Kirim */
button[type="submit"] {
    padding: 10px 20px; /* Ruang di dalam tombol */
    background-color: #007bff; /* Warna latar belakang */
    color: #fff; /* Warna teks */
    border: none; /* Menghapus border */
    border-radius: 5px; /* Sudut bulat */
    cursor: pointer; /* Mengubah kursor saat diarahkan ke tombol */
}

/* Gaya untuk tombol Kirim saat dihover */
button[type="submit"]:hover {
    background-color: #0056b3; /* Warna latar belakang saat dihover */
}

.container-eticket {
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    padding: 20px;
    width: 550px; /* Atur lebar e-ticket */
    margin: 50px 20px; /* Atur margin di atas dan kiri */
}

.ticket-info p {
    margin: 5px 0;
    font-size: 14px;
    color: #555555;
}

.passenger-info h2,
.total-price h2,
.qr-code h2 {
    color: #333333;
    margin-bottom: 10px;
    font-size: 18px;
}

.passenger-info ul {
    list-style-type: none;
    padding: 0;
}

.passenger-info li {
    margin-bottom: 10px;
    font-size: 14px;
    color: #555555;
}

.status {
    color: #007bff;
    font-weight: bold;
    font-size: 16px;
}

.qr-code img {
    margin-top: 20px;
    max-width: 150px;
    height: auto;
    display: block;
    margin-left: auto;
    margin-right: auto;
}

.passenger-info {
    margin-bottom: 20px;
}

.passenger-table {
    width: 100%;
    border-collapse: collapse;
}

.passenger-table th, .passenger-table td {
    border: 1px solid #ddd;
    padding: 8px;
}

.passenger-table th {
    background-color: #f2f2f2;
    color: #333;
}

.passenger-table tr:nth-child(even) {
    background-color: #f9f9f9;
}

.passenger-table tr:hover {
    background-color: #f2f2f2;
}








      
      
        </style>
    </head>
    <body>
      <!-- Sidebar -->
    <div class="sidebar">
        
    </div>
    
      <!-- Akhir sidebar -->
  
      <!-- Konten utama -->
      <div class="main-content">
          <header>
              <div class="logo">
                  <h2>Busify</h2>
              </div>
          
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
          
                      <div class="circle" style="margin-left: 10px; background-color: #007bff;">3</div>
                      <p class="raleway-font" style="font-weight: 700; opacity: 0.7; font-size: 14px; margin-right: 10px; margin-left: 8px "> E-Ticket</p>
                  </div>
              </div>
          </header>
          <!-- Konten utama -->
          <br><br><br><br><br><br>

        <!-- Konten E-Ticket -->
        <div class="container-eticket">
          <div class="ticket-info">
              <p><strong>E-Ticket ID:</strong> {{ $e_ticket_id }}</p>
              <p><strong>User ID:</strong> {{ $transaksi->user_id }}</p>
              <p><strong>Jadwal ID:</strong> {{ $transaksi->jadwal_id }}</p>
          </div>
          <div class="passenger-info">
            <h2>Informasi Penumpang</h2>
            <table class="passenger-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Title</th>
                        <th>No Kursi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($namaTitelPenumpang as $index => $penumpang)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $penumpang['nama'] }}</td>
                            <td>{{ $penumpang['titel'] }}</td>
                            <td>{{ $nomorKursi[$index] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        
          <div class="total-price">
              <h2>Total Harga</h2>
              <p>{{ $totalHargaTiketFormatted }}</p>
          </div>
          <div class="qr-code">
              <h2>Status Pembayaran</h2>
              @if($status_pembayaran == 'pending')
                  <p class="status">Menunggu Konfirmasi Admin</p>
              @else
                  <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=menunggu_konfirmasi_admin" alt="Menunggu Konfirmasi QR Code">
              @endif
          </div>
        </div>
        <style>
          .back-button {
    margin-top: 20px;
}

.button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.button:hover {
    background-color: #0056b3;
}

        </style>
        <div class="back-button">
          <a href="{{ route('home2') }}" class="button">Kembali ke Menu</a>
      </div>
      </div>
    
</div>


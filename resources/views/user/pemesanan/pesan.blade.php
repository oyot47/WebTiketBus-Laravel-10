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
          
                      <div class="circle" style="margin-left: 10px; background-color: #0000009a;">2</div>
                      <p class="raleway-font" style="font-weight: 700; opacity: 0.7; font-size: 14px; margin-right: 10px; margin-left: 8px"> Pembayaran</p>
                      <hr class="horizontal-line">
          
                      <div class="circle" style="margin-left: 10px; background-color: #0000009a;">3</div>
                      <p class="raleway-font" style="font-weight: 700; opacity: 0.7; font-size: 14px; margin-right: 10px; margin-left: 8px "> E-Ticket</p>
                  </div>
              </div>
          </header>
          <br><br><br><br>
          <H1>Detail Traveler</H1>
          
          <!-- Form -->
          <form action="{{ route('kirim.form') }}" method="POST">
            @csrf
            <input type="hidden" name="jadwal_id" value="{{ $jadwal_id }}">
            <input type="hidden" name="seats" value="{{ $seats }}">
            
            @for ($i = 1; $i <= $seats; $i++)
            <br>
            <div class="container">
                <div class="passenger-info">
                    <h2>Penumpang {{ $i }}</h2>
                    <!-- Dropdown untuk memilih titel -->
                    <div class="form-group">
                        <label for="title{{ $i }}">Titel:</label>
                        <select id="title{{ $i }}" name="title[]" class="form-control" required>
                            <option value="Tuan">Tuan</option>
                            <option value="Nyonya">Nyonya</option>
                            <option value="Nona">Nona</option>
                        </select>
                    </div>
                    <!-- Input field untuk nama -->
                    <div class="form-group">
                        <label for="nama{{ $i }}">Nama Lengkap:</label>
                        <input type="text" id="nama{{ $i }}" name="nama[]" class="form-control" required>
                    </div>
                </div>
            </div>
            
            @endfor
            <br>
            <button type="submit">Kirim</button>
        </form>
        
          
      </div>
      <!-- Akhir konten utama -->
  </body>
</html>

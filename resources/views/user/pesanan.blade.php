<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tiket</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/summernote/summernote-bs4.min.css') }}">
  <!-- Memuat font Montserrat dari Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
  <script src="{{ asset('..\js\sidebar.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('..\css\admin2.css') }}">

  <style>

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
    background-color: rgb(196, 170, 170); /* Tambahkan background putih untuk header */
    z-index: 999;
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

    .foto{
        margin-top: 70px;
    }
    .ticket-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.ticket {
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        border-radius: 5px;
        margin-bottom: 20px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .ticket-header {
        background-color: #007bff;
        color: #fff;
        padding: 10px;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
    }

    .ticket-header h3 {
        margin: 0;
    }

    .ticket-details {
        padding: 20px;
    }

    .ticket-details p {
        margin: 0;
        margin-bottom: 5px;
        font-weight: bold; /* Judul memiliki tebal */
    }

    .ticket-details .detail-value {
        margin-left: 10px; /* Memberi ruang antara judul dan isi data */
        font-weight: normal; /* Isi data menggunakan font biasa */
    }

    .status-button {
        display: inline;
        background-color: #f0f0f0;
        color: #333;
        padding: 2px 5px;
        border: 1px solid #ccc;
        border-radius: 3px;
        cursor: default;
    }



  </style>
</head>
<body>
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

            <ul class="nav-menu">
                <li><a href="#">Beli Tiket</a></li>
                <li><a href="#">Bantuan</a></li>
                <li><a href="#">Pesanan</a></li>
                <li><a href="/user/homepage">Home</a></li>
            </ul>
        </div>
    </header>
    <br><br><br><br>

    

    <div class="container">
        <h1>Tiket Anda</h1>
    <br>
        @if($pesanan->isEmpty())
        <div class="empty-ticket-text">
            <p>Tidak ada tiket yang dipesan</p>
        </div>
        @else
        <div class="ticket-container">
            @foreach($pesanan as $pembayaran)
                <div class="ticket">
                    <div class="ticket-header">
                        <h3>Tiket</h3>
                        <p>Kode : {{$pembayaran->e_ticket_id}}</p>
                    </div>
                    <div class="ticket-details">
                        <p>Destinasi:<span class="detail-value">{{ $pembayaran->jadwal->kotaAsal->nama }} - {{ $pembayaran->jadwal->kotaTujuan->nama }}</span></p>
                        <p>Keberangkatan:<span class="detail-value">{{ $pembayaran->jadwal->tanggal_keberangkatan->format('d F Y') }}</span></p>
                        <p>Status:<span class="status-button detail-value">{{ $pembayaran->status }}</span></p>
                        <br>
                        @if($pembayaran->status == 'accepted')
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=menunggu_konfirmasi_admin" alt="Menunggu Konfirmasi QR Code">
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    
        @endif
    </div>
           
    
    
</body>
</html>

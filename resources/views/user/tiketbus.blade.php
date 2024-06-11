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
    background-color: white; /* Tambahkan background putih untuk header */
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
      <img class="foto" src="{{ asset('..\images\board.jpg') }}" alt="Foto" width=100% height="150">

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header"> 
      <div class="container-fluid">
        
        <div class="row mb-2">
            <div class="col-sm-6" style="margin-top: 10px">
                <div class="col-sm-6" style="display: flex; align-items: center;">
                    <p class="raleway-font" style="font-weight: 700; opacity: 1; font-size: 16px; margin-right: 10px;">{{ $from }}</p>
                    <p><i class="fas fa-arrow-right" style="margin-right: 20px; margin-left:10px"></i></p>
                    <p class="raleway-font" style="font-weight: 700; opacity: 1; font-size: 16px;">{{ $to }}</p>
                </div>
                <div class="col-sm-6" style="display: flex; align-items: center; margin-top:-10px">
                    <p class="raleway-font" style="font-weight: 700; opacity: 0.5; font-size: 16px;">{{ $tanggal_keberangkatan }}</p>
                    <div class="garis-vertical"></div>
                    <p class="raleway-font" style="font-weight: 700; opacity: 0.5; font-size: 16px; margin-left: 25px">{{ $seats }} Kursi</p>
                </div>
            </div><!-- /.col -->
            <div class="col-sm-6" style="margin-top: 10px; ">
                <div class="col-sm-6" style="display: flex; justify-content: center; align-items: center; height: 55px; margin-left: 300px;">
                    <a href="/pesan" class="btn btn-primary" style="width: 150px; height: 100%; display: flex; justify-content: center; align-items: center;">
                        <p class="raleway-font" style="font-weight: 700; opacity: 1; font-size: 16px; margin: 0;">Ubah Pencarian</p>
                    </a>
                </div>
                
            </div>

        </div><!-- /.row -->
        <hr style="height :1px; background-color:#00000054; border:none">
        
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
            <div class="">
                
                @php
                $jadwalFiltered = $jadwal->where('status', 1);
                @endphp
            
                @if($jadwalFiltered->isEmpty())
                    <div style="text-align: center; font-size:30px; margin-top: 250px;">
                        <p>--Tiket Tidak Tersedia--</p>
                    </div>
                @else
                
              <!-- /.card-header -->
              @foreach($jadwal as $jadwalitem)
                  <div class="jadwal-container" style="width : 920px">
                      <div class="bus-info" style="height: 60px">
                          <h3 class="nama-bus">{{ $jadwalitem->bus->nama }}</h3>
                          <p class="jenis-bus">{{ $jadwalitem->bus->jenis }}</p> <!-- Tambahkan jenis bus di bawah nama bus -->
                      </div>
                      <div class="jadwal-item">
                          <div class="row2" style="height: 130px;">
                              <div class="column2" style=" width:135px; ">
                                  <h3 class="nama-bus">{{ substr($jadwalitem->jam_keberangkatan, 0, 5) }}</h3>
                                  <p class="jenis-bus">{{ $jadwalitem->terminalAsal->nama }}</p>
                              </div>
                              <div class="column2" style=" width:30px;">
                                  <i class="fas fa-arrow-right"></i> <!-- Tambahkan ikon panah di sini -->
                              </div>
                              <div class="column2" style="width:145px;">
                                  <h3 class="nama-bus">{{ substr($jadwalitem->jam_sampai, 0, 5) }}</h3>
                                  <p class="jenis-bus">{{ $jadwalitem->terminalTujuan->nama }}</p>
                              </div>
                              <div class="column2" style="width:150px;">
                                  <div class="row2">
                                      <div class="column2" style="width:40px;">
                                          <div class="garis_verikal"></div>
                                      </div>
                                      <div class="column2" style="width:90px;">
                                          <h3 class="nama-bus">{{ ($jadwalitem->destinasi_waktu) }}</h3>
                                      </div>
                                      <div class="column2" style="width:20px;">
                                          <div class="garis_verikal"></div>
                                      </div>
                                  </div>
                              </div>
                              <div class="column2" style="width: 127px;">
                                  <div class="column2" style="width: auto;">
                                  <div class='fasilitas_container2 d-flex flex-row' style="width: 100%;" id="fasilitas_container">
                                      @foreach($jadwalitem->fasilitasArray as $fasilitas)
                                      <!-- Tampilkan ikon fasilitas -->
                                          @if($fasilitas === 'WiFi')
                                              <i class="fas fa-wifi mr-2"></i> <!-- Tambahkan class 'mr-2' untuk memberikan margin kanan -->
                                          @elseif($fasilitas === 'AC')
                                              <i class="fas fa-snowflake mr-2"></i>
                                          @elseif($fasilitas === 'Toilet')
                                              <i class="fas fa-toilet mr-2"></i>
                                          @elseif($fasilitas === 'USB')
                                              <i class="fas fa-bolt mr-2"></i>
                                          @elseif($fasilitas === 'Bagasi')
                                              <i class="fas fa-suitcase mr-2"></i>
                                          @endif
                                      @endforeach
                                  </div>
                                  </div>
                              </div>
                              <div class="column2" style="width:90px;"></div>
                              <div class="column2" style="width:auto;">
                                  <h3 class="harga">Rp {{ number_format($jadwalitem->harga_tiket, 0, ',', '.') }} /kursi</h3>
                                <form action="{{ route('pesan.form') }}" method="GET">
                                    @csrf
                                    <input type="hidden" name="jadwal_id" value="{{ $jadwalitem->id }}">
                                    <input type="hidden" name="seats" value="{{ $seats }}">
                                    <button type="submit" class="btn-pilih">Pilih</button>
                                </form>
                              </div>
                              
                          </div>
                          <div class="row2">
                              <div data-target="fitur" class="column2 fitur" style="width: 90px; height: 30px; cursor: pointer">
                                  <p>Fitur</p>
                              </div>
                              <div data-target="rute" class="column2 rute" style="width: 90px; height: 30px; cursor: pointer">
                                  <p>Rute</p>
                              </div>
                          </div>
                          
                          <div class="fitur-container" style="display: none;">
                              <hr style="border: none; height: 1px; color: #333; background-color: #333;">
                              <div class="row2">
                                  <div class="columndetail" style="width: auto;">
                                      <p class="raleway-font" style="font-weight:700; opacity: 1; font-size:15px; ">Spesifikasi Kendaraan</p>
                                      <div class="form-group gray-container2" id="bus_image_container" style="box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.2); width: 350px; ">
                                          <div class="flex-container">
                                              <div class="bus-container" style="width: auto">
                                                  <p class="raleway-font" style="font-weight:600; opacity: 1; font-size:15px; margin: 5px 0; ">Kapasitas Kursi : <span class="raleway-font" style="font-size:15px; font-weight:500">{{ $jadwalitem->bus->jumlah_kursi }} Kursi</span></p>
                                                  <p class="raleway-font" style="font-weight:600; opacity: 1; font-size:15px; margin: 5px 0;">Format Kursi : <span class="raleway-font" style="font-size:15px; font-weight:500">{{ $jadwalitem->bus->format_kursi }}</span></p>
                                                  <p class="raleway-font" style="font-weight:600; opacity: 1; font-size:15px; margin: 5px 0; margin-bottom: 10px">Fasilitas : </p>
                                                  <div class="fasilitas-container3">
                                                      @foreach($jadwalitem->fasilitasArray as $index => $fasilitas)
                                                          <!-- Tampilkan ikon fasilitas -->
                                                          <div class="fasilitas-item">
                                                              @if($fasilitas === 'WiFi')
                                                                  <i class="fas fa-wifi"></i><span>WiFi</span>
                                                              @elseif($fasilitas === 'AC')
                                                                  <i class="fas fa-snowflake"></i><span>AC</span>
                                                              @elseif($fasilitas === 'Toilet')
                                                                  <i class="fas fa-toilet"></i><span>Toilet</span>
                                                              @elseif($fasilitas === 'USB')
                                                                  <i class="fas fa-bolt"></i><span>USB</span>
                                                              @elseif($fasilitas === 'Bagasi')
                                                                  <i class="fas fa-suitcase"></i><span>Bagasi</span>
                                                              @endif
                                                          </div>
                                                      @endforeach
                                                  </div>
                                                  
                                              </div>
                                          </div>
                                      </div>
  
                                      <p class="raleway-font" style="font-weight:700; opacity: 1; font-size:15px; margin-top:10px ">Kebijakan Refund</p>
                                      <div class="form-group gray-container2" id="bus_image_container" style="box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.2); width: 350px; margin-top:3px ">
                                          <div class="flex-container">
                                              <div class="bus-container" style="width: auto">
                                                  <div class="refund-info">
                                                      <p class="raleway-font" style="font-weight:700; opacity: 0.5; font-size:15px; margin-top:10px ">
                                                          <i class="fa-solid fa-xmark" style="margin-right: 10px; opacity:0.5;"></i>Tidak Bisa Refund
                                                      </p>
                                                      <p class="other-info raleway-font" style="font-weight:700; opacity: 0.5; font-size:15px; margin-top:0px;">Tiket bus yang sudah dibeli tidak bisa dibatalkan</p>
                                                  </div>                                                
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="columndetail" style="width: 40%;">
                                      <img src="{{ asset('storage/photo-bus/' . $jadwalitem->bus->image) }}" alt="Foto Bus" id="bus_image" style="width: 100%; height: 100%; border-radius: 5px; margin-left: 100px; margin-right:15px; margin-top:15%; ">
                                  </div>
  
                              </div>
                          </div>
                          
                          <div class="rute-container" style="display: none;">
                              <hr style="border: none; height: 1px; color: #333; background-color: #333;">
                              <div class="form-group gray-container2" id="bus_image_container" style="box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.2); width: auto; margin-top:3px; height:auto">
                                  <div class="blue-gradient position-relative px-3 py-5 my-1 overflow-auto">
                                      <div class="timeline-frame">
                                          <div class="timeline-contain left">
                                              <div class="konten">
                                                  <div class="h1 font-weight-bold text-info poppins" style="font-size: 15px"><span>{{ \Carbon\Carbon::parse($jadwalitem->tanggal_keberangkatan)->format('d-F') }}</span></div>
                                                  <p class="raleway-font" style="font-weight:700; opacity: 0.5; font-size:13px; margin: 0px 0;">{{ substr($jadwalitem->jam_keberangkatan, 0, 5) }} WIB</p>
                                                  <p class="raleway-font" style="font-weight:700; opacity: 1; font-size:15px; margin: 5px 0;">{{ $jadwalitem->terminalAsal->nama }}</p>
                                                  <p class="raleway-font" style="font-weight:500; opacity: 1; font-size:14px; margin: 5px 0;">{{ $jadwalitem->terminalAsal->address ?? 'Alamat tidak tersedia' }}</p>
                                                  <a href="{{ $jadwalitem->terminalAsal->maps_link ?? 'https://maps.google.com/' }}" target="_blank">LIHAT DI PETA</a>
  
                                              </div>
                                          </div>
                                          <div class="timeline-contain right">
                                              <div class="konten">
                                                  <div class="h1 font-weight-bold text-info poppins" style="font-size: 15px"><span>{{ \Carbon\Carbon::parse($jadwalitem->tanggal_sampai)->format('d-F') }}</span></div>
                                                  <p class="raleway-font" style="font-weight:700; opacity: 0.5; font-size:13px; margin: 0px 0;">{{ substr($jadwalitem->jam_sampai, 0, 5) }} WIB</p>
                                                  <p class="raleway-font" style="font-weight:700; opacity: 1; font-size:15px; margin: 5px 0;">{{ $jadwalitem->terminalTujuan->nama }}</p>
                                                  <p class="raleway-font" style="font-weight:500; opacity: 1; font-size:14px; margin: 5px 0;">{{ $jadwalitem->terminalTujuan->address ?? 'Alamat tidak tersedia' }}</p>
                                                  <a href="{{ $jadwalitem->terminalTujuan->maps_link ?? 'https://maps.google.com/' }}" target="_blank">LIHAT DI PETA</a>
  
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              
                          </div>
                          
                          
                          <!-- Tambahkan informasi lainnya sesuai kebutuhan -->
                      </div>
                      
                  </div>
                  
              @endforeach
              @endif
  
          
  
  
  
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
  <script>
      document.addEventListener("DOMContentLoaded", function() {
          document.querySelectorAll('.fitur').forEach(function(fitur) {
              fitur.addEventListener('click', function() {
                  toggleContent(fitur.dataset.target, fitur.closest('.jadwal-item'));
              });
          });
  
          document.querySelectorAll('.rute').forEach(function(rute) {
              rute.addEventListener('click', function() {
                  toggleContent(rute.dataset.target, rute.closest('.jadwal-item'));
              });
          });
  
          function toggleContent(target, jadwalItem) {
              var content = jadwalItem.querySelector('.' + target + '-container');
              var otherContents = jadwalItem.querySelectorAll('.fitur-container, .rute-container');
              
              if (content.style.display === 'none' || content.style.display === '') {
                  content.style.display = 'block';
                  otherContents.forEach(function(container) {
                      if (container !== content) {
                          container.style.display = 'none';
                      }
                  });
              } else {
                  content.style.display = 'none';
              }
          }
      });
      
  </script>



<!-- jQuery -->
<script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('lte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('lte/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('lte/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('lte/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('lte/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('lte/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('lte/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('lte/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('lte/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('lte/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('lte/dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('lte/dist/js/pages/dashboard.js') }}"></script>

</body>
</html>
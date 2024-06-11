@extends('admin.sidebar.main')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Kota</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Bus</a></li>
            <li class="breadcrumb-item active">Data Kota</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <a href=" {{ route('kota.halcreate') }} " class="btn btn-primary mb-3">Tambah Data</a>
          <div class="">
            <!-- /.card-header -->
            @foreach($jadwal as $jadwal)
                <div class="jadwal-container" style="width : 920px">
                    <div class="bus-info" style="height: 60px">
                        <h3 class="nama-bus">{{ $jadwal->bus->nama }}</h3>
                        <p class="jenis-bus">{{ $jadwal->bus->jenis }}</p> <!-- Tambahkan jenis bus di bawah nama bus -->
                    </div>
                    <div class="jadwal-item">
                        <div class="row2" style="height: 130px;">
                            <div class="column2" style=" width:135px; ">
                                <h3 class="nama-bus">{{ substr($jadwal->jam_keberangkatan, 0, 5) }}</h3>
                                <p class="jenis-bus">{{ $jadwal->terminalAsal->nama }}</p>
                            </div>
                            <div class="column2" style=" width:30px;">
                                <i class="fas fa-arrow-right"></i> <!-- Tambahkan ikon panah di sini -->
                            </div>
                            <div class="column2" style="width:145px;">
                                <h3 class="nama-bus">{{ substr($jadwal->jam_sampai, 0, 5) }}</h3>
                                <p class="jenis-bus">{{ $jadwal->terminalTujuan->nama }}</p>
                            </div>
                            <div class="column2" style="width:150px;">
                                <div class="row2">
                                    <div class="column2" style="width:40px;">
                                        <div class="garis_verikal"></div>
                                    </div>
                                    <div class="column2" style="width:90px;">
                                        <h3 class="nama-bus">{{ ($jadwal->destinasi_waktu) }}</h3>
                                    </div>
                                    <div class="column2" style="width:20px;">
                                        <div class="garis_verikal"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="column2" style="width: 127px;">
                                <div class="column2" style="width: auto;">
                                <div class='fasilitas_container2 d-flex flex-row' style="width: 100%;" id="fasilitas_container">
                                    @foreach($jadwal->fasilitasArray as $fasilitas)
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
                                <h3 class="harga">Rp {{ number_format($jadwal->harga_tiket, 0, ',', '.') }} /kursi</h3>
                                <button class="btn-pilih">Pilih</button>
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
                                                <p class="raleway-font" style="font-weight:600; opacity: 1; font-size:15px; margin: 5px 0; ">Kapasitas Kursi : <span class="raleway-font" style="font-size:15px; font-weight:500">{{ $jadwal->bus->jumlah_kursi }} Kursi</span></p>
                                                <p class="raleway-font" style="font-weight:600; opacity: 1; font-size:15px; margin: 5px 0;">Format Kursi : <span class="raleway-font" style="font-size:15px; font-weight:500">{{ $jadwal->bus->format_kursi }}</span></p>
                                                <p class="raleway-font" style="font-weight:600; opacity: 1; font-size:15px; margin: 5px 0; margin-bottom: 10px">Fasilitas : </p>
                                                <div class="fasilitas-container3">
                                                    @foreach($jadwal->fasilitasArray as $index => $fasilitas)
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
                                    <img src="{{ asset('storage/photo-bus/' . $jadwal->bus->image) }}" alt="Foto Bus" id="bus_image" style="width: 100%; height: 100%; border-radius: 5px; margin-left: 100px; margin-right:15px; margin-top:15%; ">
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
                                                <div class="h1 font-weight-bold text-info poppins" style="font-size: 15px"><span>{{ \Carbon\Carbon::parse($jadwal->tanggal_keberangkatan)->format('d-F') }}</span></div>
                                                <p class="raleway-font" style="font-weight:700; opacity: 0.5; font-size:13px; margin: 0px 0;">{{ substr($jadwal->jam_keberangkatan, 0, 5) }} WIB</p>
                                                <p class="raleway-font" style="font-weight:700; opacity: 1; font-size:15px; margin: 5px 0;">{{ $jadwal->terminalAsal->nama }}</p>
                                                <p class="raleway-font" style="font-weight:500; opacity: 1; font-size:14px; margin: 5px 0;">{{ $jadwal->terminalAsal->address ?? 'Alamat tidak tersedia' }}</p>
                                                <a href="{{ $jadwal->terminalAsal->maps_link ?? 'https://maps.google.com/' }}" target="_blank">LIHAT DI PETA</a>

                                            </div>
                                        </div>
                                        <div class="timeline-contain right">
                                            <div class="konten">
                                                <div class="h1 font-weight-bold text-info poppins" style="font-size: 15px"><span>{{ \Carbon\Carbon::parse($jadwal->tanggal_sampai)->format('d-F') }}</span></div>
                                                <p class="raleway-font" style="font-weight:700; opacity: 0.5; font-size:13px; margin: 0px 0;">{{ substr($jadwal->jam_sampai, 0, 5) }} WIB</p>
                                                <p class="raleway-font" style="font-weight:700; opacity: 1; font-size:15px; margin: 5px 0;">{{ $jadwal->terminalTujuan->nama }}</p>
                                                <p class="raleway-font" style="font-weight:500; opacity: 1; font-size:14px; margin: 5px 0;">{{ $jadwal->terminalTujuan->address ?? 'Alamat tidak tersedia' }}</p>
                                                <a href="{{ $jadwal->terminalTujuan->maps_link ?? 'https://maps.google.com/' }}" target="_blank">LIHAT DI PETA</a>

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





@endsection
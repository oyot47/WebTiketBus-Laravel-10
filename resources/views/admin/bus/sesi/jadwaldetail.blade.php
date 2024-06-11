@extends('admin.sidebar.main')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Jadwal</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Jadwal</a></li>
                        <li class="breadcrumb-item active">Detail</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card" style="padding-right: 0;"> <!-- Menambahkan style max-width -->
                <div class="card-body" >
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="text-danger mb-3">
                                <a href="{{ route('jadwal.edit',['id' =>$jadwal->id]) }}" class="btn btn-primary btn-sm"><i class="fas fa-pen"></i> Edit</a>
                            </div>
                            <div class="form-group">
                                <label for="kotaAsal">Kota Asal:</label>
                                <input type="text" id="kotaAsal" class="form-control" value="{{ $jadwal->kotaAsal->nama }}" readonly style="background-color: lightgray;">
                            </div>
                            <div class="form-group">
                                <label for="kotaTujuan">Kota Tujuan:</label>
                                <input type="text" id="kotaTujuan" class="form-control" value="{{ $jadwal->kotaTujuan->nama }}" readonly style="background-color: lightgray;">
                            </div>
                            <div class="form-group">
                                <label for="terminalAsal">Terminal Asal:</label>
                                <input type="text" id="terminalAsal" class="form-control" value="{{ $jadwal->terminalAsal->nama }}" readonly style="background-color: lightgray;">
                            </div>
                            <div class="form-group">
                                <label for="terminalTujuan">Terminal Tujuan:</label>
                                <input type="text" id="terminalTujuan" class="form-control" value="{{ $jadwal->terminalTujuan->nama }}" readonly style="background-color: lightgray;">
                            </div>
                            <div class="form-group">
                                <label for="tanggalKeberangkatan">Tanggal Keberangkatan:</label>
                                <input type="text" id="tanggalKeberangkatan" class="form-control" value="{{ date('d-m-Y', strtotime($jadwal->tanggal_keberangkatan)) }}" readonly style="background-color: lightgray;">
                            </div>
                            <div class="form-group">
                                <label for="jamKeberangkatan">Jam Keberangkatan:</label>
                                <input type="text" id="jamKeberangkatan" class="form-control" value="{{ $jadwal->jam_keberangkatan }}" readonly style="background-color: lightgray;">
                            </div>
                            <div class="form-group">
                                <label for="jamSampai">Jam Sampai:</label>
                                <input type="text" id="jamSampai" class="form-control" value="{{ $jadwal->jam_sampai }}" readonly style="background-color: lightgray;">
                            </div>
                            <div class="form-group">
                                <label for="destinasiWaktu">Destinasi Waktu:</label>
                                <input type="text" id="destinasiWaktu" class="form-control" value="{{ $jadwal->destinasi_waktu }}" readonly style="background-color: lightgray;">
                            </div>


                            
                            <div class="form-group">
                                <label for="busId">Bus:</label>
                                <input type="text" id="busId" class="form-control" value="{{ $jadwal->bus->nama }} - {{ $jadwal->bus->nomor_plat }}" readonly style="background-color: lightgray;">
                            </div>
                            <div class="form-group gray-container" id="bus_image_container">
                                <div class="flex-container">
                                    <div class="bus-container">
                                        <label style="margin-right: 10px;" for="bus_image">Foto Bus:</label>
                                        <img src="{{ asset('storage/photo-bus/' . $jadwal->bus->image) }}" alt="Foto Bus" id="bus_image" style="width: 200px; height: 200px; border-radius: 5px;">
                                    </div>
                                    
                                    <div class="fasilitas-container">
                                        <label style="margin-right: 10px;">Fasilitas:</label>
                                        <div class='fasilitas_container2 d-flex flex-row' id="fasilitas_container">
                                            <!-- Icon fasilitas akan ditambahkan di sini -->
                                            @foreach($fasilitasArray as $fasilitas)
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
                                        <div>
                                            <label style="margin-top: 10px;">Jenis Bus:</label>
                                            <label class='fasilitas_container2'  id="jenis_bus" style="margin-top: 0px;">{{ $jadwal->bus->jenis }}</label><br>
                                            <label style="margin-top: -10px;">Jumlah Kursi:</label>
                                            <label class='fasilitas_container2' id="jumlah_kursi">{{ $jadwal->bus->jumlah_kursi }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="jumlahTiketTersedia">Jumlah Tiket Tersedia:</label>
                                <input type="text" id="jumlahTiketTersedia" class="form-control" value="{{ $jadwal->jumlah_tiket_tersedia }}" readonly style="background-color: lightgray;">
                            </div>
                            <div class="form-group">
                                <label for="hargaTiket">Harga Tiket:</label>
                                <input type="text" id="hargaTiket" class="form-control" value="Rp.{{ $jadwal->harga_tiket }}" readonly style="background-color: lightgray;">
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <input type="text" id="status" class="form-control" value="{{ $jadwal->status == 1 ? 'Aktif' : 'Nonaktif' }}" readonly style="background-color: lightgray;">
                            </div>
                            
                            
                            <!-- Lanjutkan dengan input untuk setiap nilai yang Anda inginkan -->
                        </div>
                    </div>
                </div>
            </div>
        </div><br>
    </section>
    <!-- /.content -->
</div>
@endsection

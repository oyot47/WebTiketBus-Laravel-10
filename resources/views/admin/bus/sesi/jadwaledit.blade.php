@extends('admin.sidebar.main')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Jadwal</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Bus</a></li>
            <li class="breadcrumb-item active">Tambah Jadwal</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <section class="content">
    <div class="container-fluid">
        <form action="{{ route('jadwal.update', ['id' => $jadwal->id]) }}" method="POST">
            @method('PUT')
            @csrf
          <div class="row">
           <!-- left column -->
           <div class="col-md-6">
           <!-- general form elements -->
            <div class="card card-primary">
             <div class="card-header">
              <h3 class="card-title">Form Edit Jadwal</h3>
             </div>
             <!-- /.card-header -->
             <!-- form start -->
             <form>
               <div class="card-body">
                <div class="form-group">
                    <label for="kota_asal_id">Kota Asal:</label>
                    <select name="kota_asal_id" class="form-control" id="kota_asal_id">
                        <option value="">Pilih Kota Asal</option>
                        @foreach ($kota as $k)
                            <option value="{{ $k->id }}" {{ $jadwal->kota_asal_id == $k->id ? 'selected' : '' }}>{{ $k->nama }}</option>
                        @endforeach
                    </select>
                    @error('kota_asal_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="kota_tujuan_id">Kota Tujuan:</label>
                    <select name="kota_tujuan_id" class="form-control" id="kota_tujuan_id">
                        <option value="">Pilih Kota Tujuan</option>
                        @foreach ($kota as $k)
                            <option value="{{ $k->id }}" {{ $jadwal->kota_tujuan_id == $k->id ? 'selected' : '' }}>{{ $k->nama }}</option>
                        @endforeach
                    </select>
                    @error('kota_tujuan_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label for="terminal_asal_id">Terminal Asal:</label>
                    <select name="terminal_asal_id" class="form-control" id="terminal_asal_id" >
                        <option value="">Pilih Terminal Asal</option>
                    </select>
                    @error('terminal_asal_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="terminal_tujuan_id">Terminal Tujuan:</label>
                    <select name="terminal_tujuan_id" class="form-control" id="terminal_tujuan_id">
                        <option value="">Pilih Terminal Tujuan</option>
                    </select>
                    @error('terminal_tujuan_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label for="tanggal_keberangkatan">Tanggal Keberangkatan:</label>
                    <input type="date" name="tanggal_keberangkatan" class="form-control" id="tanggal_keberangkatan" value="{{ $jadwal->tanggal_keberangkatan }}">
                    @error('tanggal_keberangkatan')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

            
                <div class="form-group">
                    <label for="tanggal_sampai">Tanggal Sampai:</label>
                    <input type="date" name="tanggal_sampai" class="form-control" id="tanggal_sampai" value="{{ $jadwal->tanggal_sampai }}">
                    @error('tanggal_sampai')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label for="jam_keberangkatan">Jam Keberangkatan:</label>
                    <input type="time" name="jam_keberangkatan" class="form-control" id="jam_keberangkatan" value="{{ $jadwal->jam_keberangkatan }}">
                    @error('jam_keberangkatan')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label for="jam_sampai">Jam Sampai:</label>
                    <input type="time" name="jam_sampai" class="form-control" id="jam_sampai" value="{{ $jadwal->jam_sampai }}">
                    @error('jam_sampai')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label for="destinasi_waktu">Destinasi Waktu:</label>
                    <input type="text" name="destinasi_waktu" class="form-control" id="destinasi_waktu" placeholder="contoh : 1j20m" value="{{ $jadwal->destinasi_waktu }}">
                    @error('destinasi_waktu')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            
                
                <div class="form-group">
                    <label for="bus_id">Bus:</label>
                    <!-- Saat membuat dropdown untuk memilih bus -->
                    <select name="bus_id" class="form-control" id="bus_id">
                        <option value="">Pilih Bus</option>
                        @foreach ($bus as $b)
                            <option value="{{ $b->id }}" data-jumlah-kursi="{{ $b->jumlah_kursi }}" data-image="{{ asset('storage/photo-bus/' . $b->image) }}" data-fasilitas="{{ $b->fasilitas }}" data-jenis="{{ $b->jenis }}" {{ $jadwal->bus_id == $b->id ? 'selected' : '' }}>
                                {{ $b->nama }} - {{ $b->nomor_plat }}
                            </option>
                        @endforeach
                    </select>
                    @error('bus_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group gray-container" id="bus_image_container" style="display: none;">
                    <div class="flex-container">
                        <div class="bus-container">
                            <label style="margin-right: 10px;" for="bus_image">Foto Bus:</label>
                            <img src="" alt="Foto Bus" id="bus_image" style="width: 200px; height: 200px; border-radius: 5px;">
                        </div>
                        <div class="fasilitas-container">
                            <label style="margin-right: 10px;">Fasilitas:</label>
                            <div class='fasilitas_container2' id="fasilitas_container" style="display: flex;">
                                <!-- Ikons fasilitas akan ditambahkan di sini -->
                            </div>
                            <div>
                                <label style="margin-top: 10px;">Jenis Bus:</label>
                                <label class='fasilitas_container2'  id="jenis_bus" style="margin-top: 0px;"></label><br>
                                <label style="margin-top: -10px;">Jumlah Kursi:</label>
                                <label class='fasilitas_container2' id="jumlah_kursi"></label>
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
                
                
               
                <div class="form-group">
                    <label for="jumlah_tiket_tersedia">Jumlah Tiket Tersedia:</label>
                    <input type="number" name="jumlah_tiket_tersedia" id="jumlah_tiket_tersedia" class="form-control" readonly>
                    @error('jumlah_tiket_tersedia')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
            
                <div class="form-group">
                    <label for="harga_tiket">Harga Tiket:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">RP</span>
                        </div>
                        <input type="text" name="harga_tiket" id="harga_tiket" class="form-control" placeholder="2000" value="{{ $jadwal->harga_tiket }}">
                        <div class="input-group-append">
                            <span class="input-group-text">/kursi</span>
                        </div>
                        @error('harga_tiket')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Status:</label>
                    <select name="status" class="form-control" id="status">
                        <option value="1" {{ $jadwal->status ? 'selected' : '' }}>Aktif</option>
                        <option value="0" {{ !$jadwal->status ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                </div>
                
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
             </form>
            </div>

          <!-- /.card -->

          <!-- /.card -->

           </div>
         <!--/.col (left) -->
          </div>
        </form>


        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script>
            


            document.getElementById('bus_id').addEventListener('change', function() {
                var selectedOption = this.options[this.selectedIndex];
                var jumlahKursi = selectedOption.getAttribute('data-jumlah-kursi');
                document.getElementById('jumlah_tiket_tersedia').value = jumlahKursi;
            });

            document.getElementById('bus_id').addEventListener('change', function() {
                        var selectedOption = this.options[this.selectedIndex];
                        var busImageContainer = document.getElementById('bus_image_container');
                        var busImage = document.getElementById('bus_image');
                        
                        // Periksa apakah option yang dipilih memiliki atribut data-image
                        if (selectedOption.hasAttribute('data-image')) {
                            var imageUrl = selectedOption.getAttribute('data-image');
                            busImage.src = imageUrl;
                            busImageContainer.style.display = 'block';
                        } else {
                            // Jika tidak ada gambar tersedia, sembunyikan container gambar
                            busImageContainer.style.display = 'none';
                        }
                    });

            // Fungsi untuk mengambil terminal berdasarkan kota yang dipilih
            function getTerminalsByCity(cityId, terminalSelect) {
                        // Hapus semua opsi terminal
                        terminalSelect.innerHTML = '<option value="">Pilih Terminal</option>';
                
                        // Kirim permintaan AJAX ke server
                        axios.get(`/get-terminals-by-city/${cityId}`)
                            .then(response => {
                                // Tambahkan kembali opsi terminal berdasarkan data yang diterima dari server
                                response.data.forEach(terminal => {
                                    let option = document.createElement('option');
                                    option.value = terminal.id;
                                    option.textContent = terminal.nama;
                                    terminalSelect.appendChild(option);
                                });
                            })
                            .catch(error => {
                                console.error('Error:', error);
                            });
                    }
                
                    // Event listener untuk saat kota asal dipilih
                    document.getElementById('kota_asal_id').addEventListener('change', function() {
                        let selectedCityId = this.value;
                        let terminalAsalSelect = document.getElementById('terminal_asal_id');
                
                        // Panggil fungsi untuk mengambil terminal berdasarkan kota yang dipilih
                        getTerminalsByCity(selectedCityId, terminalAsalSelect);
                    });
                
                    // Event listener untuk saat kota tujuan dipilih
                    document.getElementById('kota_tujuan_id').addEventListener('change', function() {
                        let selectedCityId = this.value;
                        let terminalTujuanSelect = document.getElementById('terminal_tujuan_id');
                
                        // Panggil fungsi untuk mengambil terminal berdasarkan kota yang dipilih
                        getTerminalsByCity(selectedCityId, terminalTujuanSelect);
                    });
                    document.getElementById('kota_tujuan_id').addEventListener('change', function() {
                        let selectedCityId = this.value;
                        let kotaAsalSelect = document.getElementById('kota_asal_id');
                        let selectedCityAsalId = kotaAsalSelect.value;

                        // Panggil fungsi untuk mengambil terminal berdasarkan kota yang dipilih
                        getTerminalsByCity(selectedCityId, terminalTujuanSelect);

                        // Mencegah pengguna memilih kembali kota yang sama sebagai asal
                        if (selectedCityId === selectedCityAsalId) {
                            // Reset pilihan kota asal
                            kotaAsalSelect.value = '';
                        }
                    });

            // Saat bus dipilih
            document.getElementById('bus_id').addEventListener('change', function() {
                var selectedOption = this.options[this.selectedIndex];
                var fasilitas = selectedOption.getAttribute('data-fasilitas');

                // Pisahkan fasilitas menjadi array
                var fasilitasArray = fasilitas.split(', ');

                // Tambahkan fasilitas ke dalam container
                var fasilitasContainer = document.getElementById('fasilitas_container');
                fasilitasContainer.innerHTML = ''; // Kosongkan container sebelum menambahkan fasilitas baru

                fasilitasArray.forEach(function(fasilitasItem) {
                    var iconElement = document.createElement('i');
                    iconElement.classList.add('fas');

                    // Menentukan kelas ikon berdasarkan nama fasilitas
                    if (fasilitasItem === 'WiFi') {
                        iconElement.classList.add('fa-wifi');
                    } else if (fasilitasItem === 'AC') {
                        iconElement.classList.add('fa-snowflake');
                    } else if (fasilitasItem === 'Toilet') {
                        iconElement.classList.add('fa-toilet');
                    } else if (fasilitasItem === 'USB') {
                        iconElement.classList.add('fa-bolt'); 
                    } else if (fasilitasItem === 'Bagasi') {
                        iconElement.classList.add('fa-suitcase');
                    }
                    
                    fasilitasContainer.appendChild(iconElement);
                    
                    // Menambahkan spasi setelah setiap ikon kecuali yang terakhir
                    if (fasilitasArray.indexOf(fasilitasItem) < fasilitasArray.length - 1) {
                        var separator = document.createElement('span');
                        separator.textContent = ' ';
                        fasilitasContainer.appendChild(separator);
                    }
                });

                // Tampilkan container fasilitas
                fasilitasContainer.style.display = 'block';
            });

            document.getElementById('bus_id').addEventListener('change', function() {
                var selectedOption = this.options[this.selectedIndex];
                var jenis = selectedOption.getAttribute('data-jenis');
                var jumlahKursi = selectedOption.getAttribute('data-jumlah-kursi');
                document.getElementById('jenis_bus').innerText = jenis;
                document.getElementById('jumlah_kursi').innerText = jumlahKursi + ' Kursi';
            });

            document.addEventListener('DOMContentLoaded', function() {
                // Dapatkan tanggal hari ini
                var today = new Date();
                var dd = String(today.getDate()).padStart(2, '0');
                var mm = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!
                var yyyy = today.getFullYear();

                today = yyyy + '-' + mm + '-' + dd;

                // Atur atribut min untuk tanggal keberangkatan dan tanggal sampai
                document.getElementById('tanggal_keberangkatan').setAttribute('min', today);
                document.getElementById('tanggal_sampai').setAttribute('min', today);

                // Event listener untuk tanggal keberangkatan
                document.getElementById('tanggal_keberangkatan').addEventListener('change', function() {
                    // Periksa apakah tanggal keberangkatan lebih kecil dari tanggal hari ini
                    if (this.value < today) {
                        // Jika ya, atur nilai tanggal keberangkatan menjadi tanggal hari ini
                        this.value = today;
                    }

                    // Periksa apakah tanggal sampai lebih kecil dari tanggal keberangkatan
                    if (document.getElementById('tanggal_sampai').value < this.value) {
                        // Jika ya, atur nilai tanggal sampai menjadi tanggal keberangkatan
                        document.getElementById('tanggal_sampai').value = this.value;
                    }
                });

                // Event listener untuk tanggal sampai
                document.getElementById('tanggal_sampai').addEventListener('change', function() {
                    // Periksa apakah tanggal sampai lebih kecil dari tanggal keberangkatan
                    if (this.value < document.getElementById('tanggal_keberangkatan').value) {
                        // Jika ya, atur nilai tanggal sampai menjadi tanggal keberangkatan
                        this.value = document.getElementById('tanggal_keberangkatan').value;
                    }
                });
            });
          
            
        </script>
      
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  
</div>
@endsection
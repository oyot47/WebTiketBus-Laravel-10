@extends('admin.sidebar.main')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Bus</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Bus</a></li>
            <li class="breadcrumb-item active">Tambah Bus</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <section class="content">
    <div class="container-fluid">
        <form action="{{ route('bus.create') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row">
           <!-- left column -->
           <div class="col-md-6">
           <!-- general form elements -->
            <div class="card card-primary">
             <div class="card-header">
              <h3 class="card-title">Form Tambah Bus</h3>
             </div>
             <!-- /.card-header -->
             <!-- form start -->
             <form>
               <div class="card-body">
                <div class="form-group">
                  <label for="inputNomorPlat">Photo Bus</label>
                  <input type="file" class="form-control" id="inputNomorPlat" name="image" >
                  @error('image')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                    <label for="inputNomorPlat">Nomor Plat</label>
                    <input type="text" class="form-control" id="inputNomorPlat" name="nomor_plat" placeholder="Enter Nomor Plat">
                    @error('nomor_plat')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputNomorPlat">Nama Bus</label>
                    <input type="text" class="form-control" id="inputNomorPlat" name="nama" placeholder="Enter Nama">
                    @error('nama')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputJenis">Jenis</label>
                    <select class="form-control" id="inputJenis" name="jenis">
                        <option value="Ekonomi">Ekonomi</option>
                        <option value="Bisnis">Bisnis</option>
                        <option value="VIP">VIP</option>
                    </select>
                    @error('jenis')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputJumlahKursi">Jumlah Kursi</label>
                    <input type="number" class="form-control" id="inputJumlahKursi" name="jumlah_kursi" min="1" placeholder="Enter Jumlah Kursi">
                    @error('jumlah_kursi')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputFormatKursi">Format Kursi</label>
                    <input type="text" class="form-control" id="inputFormatKursi" name="format_kursi" placeholder="Enter Format Kursi">
                    @error('format_kursi')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputFasilitas">Fasilitas</label><br>
                    <input type="checkbox" id="ac" name="fasilitas[]" value="AC">
                    <label for="ac"> AC</label><br>
                    <input type="checkbox" id="toilet" name="fasilitas[]" value="Toilet">
                    <label for="toilet"> Toilet</label><br>
                    <input type="checkbox" id="wifi" name="fasilitas[]" value="WiFi">
                    <label for="wifi"> WiFi</label><br>
                    <input type="checkbox" id="usb" name="fasilitas[]" value="USB">
                    <label for="wifi"> USB</label><br>
                    <input type="checkbox" id="bagasi" name="fasilitas[]" value="Bagasi">
                    <label for="Bagasi"> Bagasi</label><br>
                    <!-- Tambahkan pilihan fasilitas lainnya di sini -->
                </div>
                <div class="form-group">
                    <label for="inputKeterangan">Keterangan</label>
                    <textarea class="form-control" id="inputKeterangan" name="keterangan" placeholder="Enter Keterangan"></textarea>
                    @error('keterangan')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
             </form>
            </div>

          <!-- /.card -->

          <!-- /.card -->

           </div>
         <!--/.col (left) -->
          </div>
        </form>
      
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  
</div>
@endsection
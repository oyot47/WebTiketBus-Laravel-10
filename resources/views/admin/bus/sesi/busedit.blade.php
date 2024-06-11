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
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Edit Bus</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <section class="content">
    <div class="container-fluid">
        <form action="{{ route('bus.update', ['id' => $bus->id]) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
        
          <div class="row">
           <!-- left column -->
           <div class="col-md-6">
           <!-- general form elements -->
            <div class="card card-primary">
             <div class="card-header">
              <h3 class="card-title">Form Edit Bus</h3>
             </div>
             <!-- /.card-header -->
             <!-- form start -->
             <form>
                <div class="card-body">
                  <div class="form-group">
                    <label for="inputNomorPlat">Photo Bus</label><br>
                    @if($bus->image)
                        <img src="{{ asset('storage/photo-bus/'.$bus->image) }}" width="100" height="100" alt="Gambar Bus">
                        <br><br>
                    @endif
                    <input type="file" class="form-control" id="inputNomorPlat" name="image">
                    @error('image')
                         <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="inputNomorPlat">Nomor Plat</label>
                        <input type="text" class="form-control" id="inputNomorPlat" name="nomor_plat" value="{{ isset($bus) ? $bus->nomor_plat : '' }}"  placeholder="Enter Nomor Plat">
                        @error('nomor_plat')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="inputNomorPlat">Nama Bus</label>
                        <input type="text" class="form-control" id="inputNomorPlat" name="nama" value="{{ isset($bus) ? $bus->nama : '' }}" placeholder="Enter Nama">
                        @error('nama')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="inputJenis">Jenis</label>
                        <select class="form-control" id="inputJenis" name="jenis" value="{{ isset($bus) ? $bus->jenis : '' }}">
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
                        <input type="number" class="form-control" id="inputJumlahKursi" name="jumlah_kursi" min="1" value="{{ isset($bus) ? $bus->jumlah_kursi : '' }}" placeholder="Enter Jumlah Kursi">
                        @error('jumlah_kursi')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="inputFormatKursi">Format Kursi</label>
                        <input type="text" class="form-control" id="inputFormatKursi" name="format_kursi" value="{{ isset($bus) ? $bus->format_kursi : '' }}" placeholder="Enter Format Kursi">
                        @error('format_kursi')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="inputFasilitas">Fasilitas</label><br>
                        <input type="checkbox" id="ac" name="fasilitas[]" value="AC" {{ in_array('AC', explode(', ', $bus->fasilitas)) ? 'checked' : '' }}>
                        <label for="ac"> AC</label><br>
                        <input type="checkbox" id="toilet" name="fasilitas[]" value="Toilet" {{ in_array('Toilet', explode(', ', $bus->fasilitas)) ? 'checked' : '' }}>
                        <label for="toilet"> Toilet</label><br>
                        <input type="checkbox" id="wifi" name="fasilitas[]" value="WiFi" {{ in_array('WiFi', explode(', ', $bus->fasilitas)) ? 'checked' : '' }}>
                        <label for="wifi"> WiFi</label><br>
                        <input type="checkbox" id="usb" name="fasilitas[]" value="USB" {{ in_array('USB', explode(', ', $bus->fasilitas)) ? 'checked' : '' }}>
                        <label for="wifi"> USB</label><br>
                        <input type="checkbox" id="bagasi" name="fasilitas[]" value="Bagasi" {{ in_array('USB', explode(', ', $bus->fasilitas)) ? 'checked' : '' }}>
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
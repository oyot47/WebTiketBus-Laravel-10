@extends('admin.sidebar.main')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Terminal</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Bus</a></li>
            <li class="breadcrumb-item active">Tambah Terminal</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <section class="content">
    <div class="container-fluid">
        <form action="{{ route('terminal.create') }}" method="POST">
          @csrf
          <div class="row">
           <!-- left column -->
           <div class="col-md-6">
           <!-- general form elements -->
            <div class="card card-primary">
             <div class="card-header">
              <h3 class="card-title">Form Tambah Terminal</h3>
             </div>
             <!-- /.card-header -->
             <!-- form start -->
              <form>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Terminal</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="nama" placeholder="Enter City">
                    @error('nama')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="address">Alamat Terminal</label>
                    <textarea class="form-control" id="address" name="address" rows="3" placeholder="Masukkan Alamat Terminal"></textarea>
                    @error('address')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="maps_link">Link Maps</label>
                    <input type="text" class="form-control" id="maps_link" name="maps_link" placeholder="Enter Maps Link">
                    @error('maps_link')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                  
                  <div class="form-group">
                      <label for="kota_id">Kota</label>
                      <select class="form-control" id="kota_id" name="kota_id" required>
                          <option value="">Pilih Kota</option>
                          @foreach($cities as $k)
                              <option value="{{ $k->id }}">{{ $k->nama }}</option>
                          @endforeach
                      </select>
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
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
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Edit Terminal</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <section class="content">
    <div class="container-fluid">
        <form action="{{ route('terminal.update', ['id' => $terminal->id]) }}" method="POST">
            @method('PUT')
            @csrf
        
          <div class="row">
           <!-- left column -->
           <div class="col-md-6">
           <!-- general form elements -->
            <div class="card card-primary">
             <div class="card-header">
              <h3 class="card-title">Form Edit Terminal</h3>
             </div>
             <!-- /.card-header -->
             <!-- form start -->
             <form>
               <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Terminal</label>
                    <input type="text" name="nama" class="form-control" id="exampleInputEmail1" value="{{ isset($terminal) ? $terminal->nama : '' }}" placeholder="Enter name">
                    @error('nama')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="address">Alamat</label>
                  <textarea class="form-control" id="address" name="address" rows="3">{{ isset($terminal) ? $terminal->address : '' }}</textarea>
                  @error('address')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              </div>
              <div class="form-group">
                  <label for="maps_link">Link Maps</label>
                  <input type="text" name="maps_link" class="form-control @error('maps_link') is-invalid @enderror" id="maps_link" value="{{ $terminal->maps_link }}" placeholder="Enter maps link">
                  @error('maps_link')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              </div>
                <div class="form-group">
                    <label for="kota_id">Kota</label>
                    <select id="kota_id" class="form-control @error('kota_id') is-invalid @enderror" name="kota_id" required>
                        <option value="">Pilih Kota</option>
                        @foreach($kota as $u)
                            <option value="{{ $u->id }}" {{ $u->id == $terminal->kota_id ? 'selected' : '' }}>{{ $u->nama }}</option>
                        @endforeach
                    </select>

                    @error('kota_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
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
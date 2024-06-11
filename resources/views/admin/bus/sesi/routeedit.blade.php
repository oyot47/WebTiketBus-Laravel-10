@extends('admin.sidebar.main')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Route</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Edit Route</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <section class="content">
    <div class="container-fluid">
        <form action="{{ route('route.update', ['id' => $routes->id]) }}" method="POST">
            @method('PUT')
            @csrf
        
          <div class="row">
           <!-- left column -->
           <div class="col-md-6">
           <!-- general form elements -->
            <div class="card card-primary">
             <div class="card-header">
              <h3 class="card-title">Form Edit route</h3>
             </div>
             <!-- /.card-header -->
             <!-- form start -->
             <form>
               <div class="card-body">
                <div class="form-group">
                    <label for="terminal_asal_id">Terminal Asal:</label><br>
                    <select name="terminal_asal_id" id="terminal_asal_id">
                        <option value="">Pilih Terminal Asal</option>
                        @foreach ($terminal as $t)
                            <option value="{{ $t->id }}" {{ $routes->terminal_asal_id == $t->id ? 'selected' : '' }}>
                                {{ $t->nama }} - {{ $t->kota->nama }}
                            </option>
                        @endforeach
                    </select>
                    <div id="kota_terminal_asal"></div>
                </div>
            
                <div class="form-group">
                    <label for="terminal_tujuan_id">Terminal Tujuan:</label><br>
                    <select name="terminal_tujuan_id" id="terminal_tujuan_id">
                        <option value="">Pilih Terminal Tujuan</option>
                        @foreach ($terminal as $t)
                            <option value="{{ $t->id }}" {{ $routes->terminal_tujuan_id == $t->id ? 'selected' : '' }}>
                                {{ $t->nama }} - {{ $t->kota->nama }}
                            </option>
                        @endforeach
                    </select>
                    <div id="kota_terminal_tujuan"></div>
                </div>

                <div class="form-group">
                    <label for="waktu_destinasi">Waktu Destinasi:</label><br>
                    <input type="text" name="waktu_destinasi" id="waktu_destinasi" value="{{ $routes->waktu_destinasi }}">
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
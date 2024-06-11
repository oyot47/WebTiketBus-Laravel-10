@extends('admin.sidebar.main')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Route</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Bus</a></li>
            <li class="breadcrumb-item active">Data Route</li>
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
          <a href=" {{ route('route.halcreate') }} " class="btn btn-primary mb-3">Tambah Data</a>
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Route Management</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control float-right" placeholder="Search" >

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Terminal Asal</th>
                        <th>Terminal Tujuan</th>
                        <th>Waktu Destinasi</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($routes as $u)
                    
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $u->terminalAsal->nama }}</td>
                        <td>{{ $u->terminalTujuan->nama }}</td>
                        <td>{{ $u->waktu_destinasi }}</td>
                    

                        <td>
                            <a href="{{ route('route.edit',['id' =>$u->id]) }}" class="btn btn-primary btn-sm"><i class="fas fa-pen"></i> Edit</a>
                            <a data-toggle="modal" data-target="#modal-hapus{{ $u->id }}" class="btn btn-danger btn-sm" style="font-size: 13px; font-weight: normal;"><i class="fas fa-trash-alt" style="font-weight: normal;"> Hapus</i></a>
                        </td>
                    </tr>
                    
                    <div class="modal fade" id="modal-hapus{{ $u->id }}">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Konfirmasi Hapus Data</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p>Apakah kamu yakin ingin menghapus data <b>{{ $u->nama }}</b></p>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <form action="{{ route('bus.delete',['id'=> $u->id]) }}" method="POST">
                              @csrf
                              @method('DELETE')
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Ya, Hapus</button>
                            
                            </form>
                            
                          </div>
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                    
                  @endforeach
                </tbody>
              </table>
            </div>
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
@endsection
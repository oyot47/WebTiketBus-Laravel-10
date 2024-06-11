@extends('admin.sidebar.main')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Jadwal</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Bus</a></li>
            <li class="breadcrumb-item active">Data Jadwal</li>
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
          <a href=" {{ route('jadwal.halcreate') }} " class="btn btn-primary mb-3">Tambah Jadwal</a>
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Jadwal Management</h3>

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
            <br>
            <!-- /.card-header -->
            <div class="mb-3 form-inline">
              <label for="status-filter" class="mr-2">Filter Status:</label>
              <select id="status-filter" class="form-control mr-2" onchange="filterJadwal()">
                  <option value="all">Semua</option>
                  <option value="nonaktif">Aktif</option>
                  <option value="aktif">Nonaktif</option>
              </select>
            </div>
          
          
            <div class="card-body table-responsive p-0" id="jadwal-table">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Kota Asal</th>
                    <th>Kota Tujuan</th>
                    <th>Tanggal Keberangkatan</th>
                    <th>Jam Keberangkatan</th>
                    <th>Destinasi Waktu</th>
                    <th>Harga Tiket</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($jadwal as $j)
                    
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $j->kotaAsal ? $j->kotaAsal->nama : '-' }}</td>
                      <td>{{ $j->kotaTujuan ? $j->kotaTujuan->nama : '-' }}</td>
                      <td>{{ $j->tanggal_keberangkatan }}</td>
                      <td>{{ $j->jam_keberangkatan }}</td>
                      <td>{{ $j->destinasi_waktu }}</td>
                      <td>{{ $j->harga_tiket }}</td>
                      <td>
                        <div class="status-circle" style="background-color: {{ $j->status == 1 ? 'red' : 'green' }}"></div>
                      </td>
                      <td>
                        <a href="{{ route('jadwal.detail',['id' =>$j->id]) }}" class="btn btn-info btn-sm"><i class="fas fa-info-circle"></i> Detail</a>
                        <a data-toggle="modal" data-target="#modal-hapus{{ $j->id }}" class="btn btn-danger btn-sm" style="font-size: 13px; font-weight: normal;"><i class="fas fa-trash-alt" style="font-weight: normal;"> Hapus</i></a>
                      </td>
                    </tr>
                    
                    <div class="modal fade" id="modal-hapus{{ $j->id }}">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Konfirmasi Hapus Data</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p>Apakah kamu yakin ingin menghapus data <b>{{ $j->nama }}</b></p>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <form action="{{ route('jadwal.delete',['id'=> $j->id]) }}" method="POST">
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
                  <style>
                  .status-circle {
                      width: 15px;
                      height: 15px;
                      border-radius: 50%;
                      display: inline-block;
                  }
                  </style>
                </tbody>
              </table>
            </div>
            <script>
              function filterJadwal() {
    var statusFilter = document.getElementById("status-filter").value;
    var rows = document.getElementById("jadwal-table").getElementsByTagName("tr");
    
    for (var i = 1; i < rows.length; i++) {
        var statusCircle = rows[i].getElementsByTagName("td")[7].querySelector(".status-circle");
        var statusColor = statusCircle.style.backgroundColor;

        if (statusFilter === "all") {
            rows[i].style.display = "";
        } else {
            if ((statusFilter === "aktif" && statusColor === "green") || (statusFilter === "nonaktif" && statusColor === "red")) {
                rows[i].style.display = "";
            } else {
                rows[i].style.display = "none";
            }
        }
    }
}


            </script>
            
          
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
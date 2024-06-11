@extends('admin.sidebar.main')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Detail Pembayaran Pending</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Detail Pembayaran Pending</li>
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
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Detail Pembayaran</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered">
                <tr>
                  <th>ID Transaksi</th>
                  <td>{{ $pembayaran->e_ticket_id }}</td>
                </tr>
                <tr>
                  <th>Total Pembayaran</th>
                  <td>Rp {{ number_format($pembayaran->jumlah, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Nama User</th>
                    <td>{{ $pembayaran->user->name }}</td>
                  </tr>
                  <tr>
                    <th>Email User</th>
                    <td>{{ $pembayaran->user->email }}</td>
                  </tr>
                <tr>
                  <th>Status</th>
                  <td>{{ $pembayaran->status }}</td>
                </tr>
                <tr>
                    <th>Metode Pembayaran</th>
                    <td>{{ $pembayaran->metode_pembayaran }}</td>
                  </tr>
                <tr>
                    <th>Bukti Transfer</th>
                    <td>
                        @if($pembayaran->bukti_transfer)
                            <img src="{{ asset('storage/bukti_transfer/' . $pembayaran->bukti_transfer) }}" alt="Bukti Transfer" style="max-width: 200px;">
                        @else
                            Tidak ada bukti transfer yang tersedia.
                        @endif
                    </td>
                </tr>
                @if ($pembayaran->status == 'pending')
                <tr>
                    <th>Aksi</th>
                    <td>
                        <form action="{{ route('terima_pembayaran', $pembayaran->id) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-primary">Konfirmasi</button>
                        </form>
                        <form action="" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-danger">Tolak</button>
                        </form>
                    </td>
                </tr>
                @endif
                
                @if($transaksiLainnya->isNotEmpty())
              <table class="table table-bordered mt-3">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Penumpang</th>
                    <th>Titel Penumpang</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($transaksiLainnya as $index => $transaksi)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $transaksi->nama }}</td>
                      <td>{{ $transaksi->titel }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              @else
                <p class="mt-3">Tidak ada penumpang yang ditemukan untuk transaksi ini.</p>
              @endif

              </table>
              <div class="mt-3">
                <a href="{{route('admin.data_pembayaran')}}" class="btn btn-secondary">Kembali ke Daftar Pembayaran</a>
            
            </div>
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
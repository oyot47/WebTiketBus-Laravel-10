@extends('admin.sidebar.main')


@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Keuntungan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Keuntungan</a></li>
            <li class="breadcrumb-item active">Data Keuntungan</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container">
        

        <form action="{{ route('admin.keuntungan') }}" method="GET">
            <div class="form-group">
                <label for="start_date">Tanggal Mulai:</label>
                <input type="date" id="start_date" name="start_date" class="form-control">
            </div>

            <div class="form-group">
                <label for="end_date">Tanggal Selesai:</label>
                <input type="date" id="end_date" name="end_date" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Filter</button>
        </form>

        <hr>

        <div class="card">
            <div class="card-body">
                <h2>Total Keuntungan: Rp {{ number_format($totalKeuntungan, 0, ',', '.') }}</h2>
            </div>
        </div>
    </div>
  </section>
  <!-- /.content -->
</div>
@endsection







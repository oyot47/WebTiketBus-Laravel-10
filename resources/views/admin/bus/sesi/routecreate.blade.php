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
            <li class="breadcrumb-item"><a href="#">Bus</a></li>
            <li class="breadcrumb-item active">Tambah Route</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <section class="content">
    <div class="container-fluid">
        <form action="{{ route('route.create') }}" method="POST">
          @csrf
          <div class="row">
           <!-- left column -->
           <div class="col-md-6">
           <!-- general form elements -->
            <div class="card card-primary">
             <div class="card-header">
              <h3 class="card-title">Form Tambah Route</h3>
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
                                <option value="{{ $t->id }}">{{ $t->nama }} - {{ $t->kota->nama }}</option>
                            @endforeach
                        </select>
                        <div id="kota_terminal_asal"></div>
                    </div>
                    
                    <div class="form-group">
                        <label for="terminal_tujuan_id">Terminal Tujuan:</label><br>
                        <select name="terminal_tujuan_id" id="terminal_tujuan_id">
                            <option value="">Pilih Terminal Tujuan</option>
                            @foreach ($terminal as $t)
                                <option value="{{ $t->id }}">{{ $t->nama }} - {{ $t->kota->nama }}</option>
                            @endforeach
                        </select>
                        <div id="kota_terminal_tujuan"></div>
                    </div>
                    
                    <div class="form-group">
                        <label for="waktu_destinasi">Waktu Destinasi:</label><br>
                        <input type="text" name="waktu_destinasi" id="waktu_destinasi" placeholder="Contoh: 2j 30m">
                    </div>
                    
                
                </div>
              
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
             </form>
            </div>


            <script>
                // Mendapatkan elemen select untuk terminal asal
                const terminalAsalSelect = document.getElementById('terminal_asal_id');
                // Mendapatkan elemen select untuk terminal tujuan
                const terminalTujuanSelect = document.getElementById('terminal_tujuan_id');
                // Mendapatkan elemen div untuk menampilkan label Kota untuk terminal asal
                const kotaTerminalAsalDiv = document.getElementById('kota_terminal_asal');
                // Mendapatkan elemen div untuk menampilkan label Kota untuk terminal tujuan
                const kotaTerminalTujuanDiv = document.getElementById('kota_terminal_tujuan');
            
                // Menambahkan event listener untuk perubahan pilihan terminal asal
                terminalAsalSelect.addEventListener('change', function() {
                    // Mendapatkan nilai id terminal asal yang dipilih
                    const terminalAsalId = this.value;
                    // Mendapatkan terminal asal berdasarkan id yang dipilih
                    const terminalAsal = {!! $terminal !!}.find(t => t.id == terminalAsalId);
            
                    // Menampilkan label Kota untuk terminal asal
                    if (terminalAsal) {
                        kotaTerminalAsalDiv.innerText = `Kota: ${terminalAsal.kota.nama}`;
                    } else {
                        kotaTerminalAsalDiv.innerText = '';
                    }
            
                    // Mengatur pilihan terminal tujuan agar tidak sama dengan terminal asal
                    const terminalTujuanOptions = terminalTujuanSelect.querySelectorAll('option');
                    terminalTujuanOptions.forEach(option => {
                        if (option.value == terminalAsalId) {
                            option.disabled = true;
                        } else {
                            option.disabled = false;
                        }
                    });
                });


                
            
                // Menambahkan event listener untuk perubahan pilihan terminal tujuan
                terminalTujuanSelect.addEventListener('change', function() {
                    // Mendapatkan nilai id terminal tujuan yang dipilih
                    const terminalTujuanId = this.value;
                    // Mendapatkan terminal tujuan berdasarkan id yang dipilih
                    const terminalTujuan = {!! $terminal !!}.find(t => t.id == terminalTujuanId);
            
                    // Menampilkan label Kota untuk terminal tujuan
                    if (terminalTujuan) {
                        kotaTerminalTujuanDiv.innerText = `Kota: ${terminalTujuan.kota.nama}`;
                    } else {
                        kotaTerminalTujuanDiv.innerText = '';
                    }
            
                    // Mengatur pilihan terminal asal agar tidak sama dengan terminal tujuan
                    const terminalAsalId = terminalAsalSelect.value;
                    const terminalAsalOptions = terminalAsalSelect.querySelectorAll('option');
                    terminalAsalOptions.forEach(option => {
                        if (option.value == terminalTujuanId) {
                            option.disabled = true;
                        } else {
                            option.disabled = false;
                        }
                    });
                });
            </script>

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
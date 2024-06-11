<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" type="text/css" href="..\css\homee.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway&display=swap">

  <style>
 .result-box {
    position: absolute;
    width: 100%; /* Set lebar maksimum sesuai dengan parent */
    max-width: 300px; /* Tetapkan lebar maksimum */
    max-height: 200px; /* Maksimum tinggi dropdown */
    overflow-y: auto; /* Biarkan dropdown scrollable jika melebihi maksimum tinggi */
    background-color: #fff; /* Warna latar belakang */
    border: 1px solid #ccc; /* Garis tepi */
    border-top: none; /* Hilangkan garis tepi bagian atas */
    z-index: 1000; /* Pastikan tampil di atas elemen lain */
    display: none; /* Defaultnya tidak ditampilkan */
}

.dropdown-item {
    padding: 8px 12px; /* Padding item dropdown */
    cursor: pointer; /* Tambahkan efek cursor pointer */
    border-bottom: 1px solid #ccc; /* Garis pemisah antara setiap item */
    font-family: "Raleway", sans-serif;
font-optical-sizing: auto;
font-weight: bold;

font-style: normal;
}

.dropdown-placeholder {
    padding: 8px 12px; /* Padding placeholder dropdown */
    color: #999; /* Warna teks placeholder */
}

.dropdown-item:last-child {
    border-bottom: none; /* Hilangkan garis pada item terakhir */
}

.dropdown-item:hover {
    background-color: #f2f2f2; /* Warna latar belakang saat item dropdown dihover */
}


  </style>
  

</head>
<body>
  <header>
    <div class="logo">
      <h2>Busify</h2>
    </div>

    <div class="navigation">
      <input type="checkbox" id="nav-checkbox">
      <label for="nav-checkbox" class="nav-toggle">
        <img src="open.png" alt="open menu" class="open">
        <img src="close.png" alt="close menu" class="close">
      </label>

      <ul class="nav-menu">
        <li><a href="#">Beli Tiket</a></li>
        <li><a href="#">Bantuan</a></li>
        <li><a href="{{ route('pesanan.lihat')}}">Pesanan</a></li>
        <li><a href="/logout">Logout</a></li>
      </ul>
    </div>
  </header>

  <div class="hero">
  </div>

  <div class="container-card">
    <div class="info-tiket">
      <h3>Tiket Bus</h3>
    </div>
    <form action="{{ route('cari-jadwal') }}" method="POST">
      {!! csrf_field() !!}
      <div class="form-row1">
        <div class="form-dari">
          <label for="from">Dari:</label>
          <input type="text" id="from" name="from" placeholder="Ketik nama kota" autocomplete="off" required>
          <div class="result-box"></div>
        </div>
        <div class="form-dari">
            <label for="to">Ke:</label>
            <input type="text" id="to" name="to" placeholder="Ketik nama kota" autocomplete="off" required>
            <div class="result-box"></div>
        </div>
      </div>
      <div class="form-row1">
        <div class="form-group">
          <label for="date">Tanggal Pergi:</label>
          <input type="date" id="date" name="date" min="<?php echo date('Y-m-d'); ?>" required>
        </div>
        <div class="form-dari">
          <label for="seats">Jumlah Kursi:</label>
          <input type="number" id="seats" name="seats" min="1" max="4" required>
        </div>
        <button type="submit"><i class="fas fa-search" style="margin-right: 5px;"></i>Cari Tiket</button>
      </div>
    </form>
  </div>

  <div class="container-bawah">
    
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


  <script>
    document.getElementById('seats').addEventListener('change', function() {
    if (this.value > 4) {
      this.value = 4;
    }
  });

    $(document).ready(function(){
      var today = new Date();
      var day = today.getDate();
      var month = today.getMonth() + 1;
      var year = today.getFullYear();
      if (month < 10) month = '0' + month;
      if (day < 10) day = '0' + day;
      var todayFormatted = year + '-' + month + '-' + day;
      var nextMonthFormatted = new Date(year, month, 0).toISOString().split('T')[0];
      // Atur tanggal minimum dan maksimum pada input date
      $('#date').attr('min', todayFormatted);
      
      // Periksa setiap saat tanggal dipilih
      $('#date').change(function() {
        var selectedDate = $(this).val();
        var selectedDateObject = new Date(selectedDate);

        // Periksa apakah tanggal yang dipilih lebih kecil dari hari ini
        if (selectedDateObject < today) {
          // Jika ya, atur input tanggal ke tanggal hari ini
          $(this).val(todayFormatted);
        }
      });

      $('#date').val(todayFormatted);


      $(window).bind('scroll', function(){
        var gap = 50;
        if($(window).scrollTop() > gap){
          $('header').addClass('active');
        } else {
          $('header').removeClass('active');
        }
      });
    });


   



    
    $(document).ready(function() {
    // Fungsi untuk menambahkan pesan "Kota tidak tersedia" ke dropdown
    function addNoResultMessage(dropdown) {
        dropdown.append('<div class="dropdown-item disabled">Kota tidak tersedia</div>');
    }

    // Fungsi untuk menampilkan dropdown
    // Fungsi untuk menampilkan dropdown
// Fungsi untuk menampilkan dropdown
function showDropdown(input, dropdown) {
    // Kosongkan isi dropdown
    dropdown.empty();

    // Ambil nilai dari input
    var inputValue = input.val().toLowerCase();

    // Hapus timer sebelumnya (jika ada)
    if (input.data('timer')) {
        clearTimeout(input.data('timer'));
    }

    // Set timer untuk menampilkan dropdown setelah 300 milidetik (sesuaikan dengan kebutuhan)
    input.data('timer', setTimeout(function() {
        // Kirim permintaan AJAX ke server untuk mengambil data kota
        $.get('/get-kota', function(data) {
            // Filter kota sesuai dengan nilai input, atau tampilkan semua kota jika input kosong
            var filteredKota;
            if (inputValue.trim() === '') {
                filteredKota = data;
            } else {
                filteredKota = data.filter(function(k) {
                    return k.toLowerCase().includes(inputValue);
                });
            }

            // Tambahkan data kota unik ke objek uniqueKota
            var uniqueKota = {};
            filteredKota.forEach(function(k) {
                uniqueKota[k.toLowerCase()] = k;
            });

            // Ambil nilai-nilai kota unik dari objek uniqueKota
            var uniqueKotaValues = Object.values(uniqueKota);

            // Jika tidak ada data yang cocok, tambahkan pesan "Kota tidak tersedia"
            if (uniqueKotaValues.length === 0 && inputValue.trim() !== '') {
                addNoResultMessage(dropdown);
            } else {
                // Hapus kota yang sudah dipilih dari dropdown
                var fromKota = $('#from').val();
                var toKota = $('#to').val();
                var kotaToRemove = [fromKota, toKota];
                uniqueKotaValues = uniqueKotaValues.filter(function(k) {
                    return !kotaToRemove.includes(k);
                });

                // Jika ada data yang cocok, tambahkan pilihan ke dropdown
                uniqueKotaValues.forEach(function(k) {
                    dropdown.append('<div class="dropdown-item">' + k + '</div>');
                });
            }

            // Tampilkan dropdown
            dropdown.show();
        });
    }, 300)); // Ubah angka 300 sesuai dengan jumlah milidetik yang diinginkan
}



    // Ketika pengguna mengetik di input "Dari"
    $('#from').on('input', function() {
        var input = $(this);
        var dropdown = input.siblings('.result-box');

        // Panggil fungsi untuk menampilkan dropdown
        showDropdown(input, dropdown);
    });

    // Ketika pengguna mengetik di input "Ke"
    $('#to').on('input', function() {
        var input = $(this);
        var dropdown = input.siblings('.result-box');

        // Panggil fungsi untuk menampilkan dropdown
        showDropdown(input, dropdown);
    });

    // Ketika pengguna mengeklik salah satu pilihan dropdown "Dari"
    $(document).on('click', '#from + .result-box .dropdown-item', function() {
        var selectedKota = $(this);
        if (!selectedKota.hasClass('disabled')) {
            $('#from').val(selectedKota.text());
        }
        $(this).parent().hide();
    });

    // Ketika pengguna mengeklik salah satu pilihan dropdown "Ke"
    $(document).on('click', '#to + .result-box .dropdown-item', function() {
        var selectedKota = $(this);
        if (!selectedKota.hasClass('disabled')) {
            $('#to').val(selectedKota.text());
        }
        $(this).parent().hide();
    });

    // Ketika input "Dari" dikosongkan, hapus pesan "Kota tidak tersedia" dari dropdown
    $('#from').on('change', function() {
        var input = $(this);
        var dropdown = input.siblings('.result-box');
        var noResultMessage = dropdown.find('.disabled');
        if (input.val().trim() === '') {
            noResultMessage.remove();
        }
    });

    // Ketika input "Ke" dikosongkan, hapus pesan "Kota tidak tersedia" dari dropdown
    $('#to').on('change', function() {
        var input = $(this);
        var dropdown = input.siblings('.result-box');
        var noResultMessage = dropdown.find('.disabled');
        if (input.val().trim() === '') {
            noResultMessage.remove();
        }
    });

    
});

  </script>
</body>
</html>

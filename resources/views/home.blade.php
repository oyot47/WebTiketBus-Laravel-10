<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" type="text/css" href="..\css\homee.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <title>Busify</title>

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
        <li><a href="/sesi/login">Beli Tiket</a></li>
        <li><a href="/sesi/login">Bantuan</a></li>
        <li><a href="/sesi/login">Pesanan</a></li>
        <li><a href="/sesi/login">Login</a></li>
      </ul>
    </div>
  </header>

  <div class="hero">
  </div>

  <div class="container-card">
    <div class="info-tiket">
      <h3>Tiket Bus</h3>
    </div>
    <form id="booking-form" action="process.php" method="POST">
      <div class="form-row1">
        <div class="form-dari">
          <label for="from">Dari:</label>
          <input type="text" id="from" name="from" required>
        </div>
        <div class="form-dari">
          <label for="to">Ke:</label>
          <input type="text" id="to" name="to" required>
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

  <script>
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
  </script>
</body>
</html>

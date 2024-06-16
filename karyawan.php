
<?php include 'header.php'; ?>
<style>
  .login-page {
    background-color: #eaeaea; /* Warna cream */
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
  }
  .login-logo img {
    border-radius: 50%;
  }
  .login-box {
    padding: 20px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    background-color: #fff; /* Pastikan background warna putih untuk visibilitas */
  }
  .login-box-body {
    padding: 20px;
  }
  .btn-orange {
    background-color: #ff6600; /* Warna oranye */
    border-color: #ff6600; /* Warna oranye */
    color: #fff;
  }
  .btn-orange:hover {
    background-color: #e65c00; /* Warna oranye lebih gelap untuk hover */
    border-color: #e65c00; /* Warna oranye lebih gelap untuk hover */
  }
</style>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <div class="sidebar-brand-logo">
      <div class="canter">
        <!-- Menampilkan logo dan nama perusahaan -->
        <img src="assets/images/kk.jpeg" alt="logo" width="200" height="200">
      </div>
    </div>
    
    <!-- Menampilkan tanggal dan waktu saat ini -->
    <p id="date"></p>
    <p id="time" class="bold"></p>
  </div>
  
  <div class="login-box-body">
    <h4 class="login-box-msg">Masukkan ID Karyawan</h4>

    <!-- Form untuk memasukkan ID karyawan dan memilih status kehadiran -->
    <form id="attendance">
      <div class="form-group">
        <select class="form-control" name="status">
          <option value="in">Time In</option>
          <option value="out">Time Out</option>
        </select>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control input-lg" id="employee" name="employee" placeholder="ID Karyawan" required>
        <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
      </div>
      <div class="form-group">
        <!-- Tombol untuk submit form kehadiran -->
        <button type="submit" class="btn btn-orange btn-block btn-flat" name="signin"><i class="fa fa-sign-in"></i> Sign In</button>
      </div>
    </form>
  </div>
  
  <!-- Alert untuk menampilkan pesan sukses -->
  <div class="alert alert-success alert-dismissible mt20 text-center" style="display:none;">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <span class="result"><i class="icon fa fa-check"></i> <span class="message"></span></span>
  </div>
  
  <!-- Alert untuk menampilkan pesan error -->
  <div class="alert alert-danger alert-dismissible mt20 text-center" style="display:none;">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <span class="result"><i class="icon fa fa-warning"></i> <span class="message"></span></span>
  </div>
</div>

<?php include 'scripts.php' ?>
<script type="text/javascript">
$(function() {
  // Fungsi untuk menampilkan tanggal dan waktu secara real-time
  var interval = setInterval(function() {
    var momentNow = moment();
    $('#date').html(momentNow.format('dddd').substring(0,3).toUpperCase() + ' - ' + momentNow.format('MMMM DD, YYYY'));  
    $('#time').html(momentNow.format('hh:mm:ss A'));
  }, 100);

  // Fungsi untuk menangani submit form kehadiran
  $('#attendance').submit(function(e){
    e.preventDefault();
    var attendance = $(this).serialize();
    $.ajax({
      type: 'POST',
      url: 'attendance.php',
      data: attendance,
      dataType: 'json',
      success: function(response){
        if(response.error){
          // Menampilkan pesan error jika ada kesalahan
          $('.alert').hide();
          $('.alert-danger').show();
          $('.message').html(response.message);
        }
        else{
          // Menampilkan pesan sukses jika berhasil
          $('.alert').hide();
          $('.alert-success').show();
          $('.message').html(response.message);
          $('#employee').val('');
        }
      }
    });
  });
});
</script>
</body>
</html>

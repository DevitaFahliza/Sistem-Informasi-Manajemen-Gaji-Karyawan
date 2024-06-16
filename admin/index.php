<?php
  session_start();

  if(!isset($_SESSION['admin'])){
    header('location: login.php');
  }
?>

<?php include 'includes/header.php'; ?>
<style>
  .login-page {
    background-color: #d7e1e9; /* Warna cream */
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
		<img src="aset/kk.jpeg" width="200" height="200">
      </div>
    </div>
    
    <!-- Menampilkan nama perusahaan -->
    <div class="sidebar-brand-text mx-3">Kriya Kreasi</div>
  </div>
  
  <div class="login-box-body">
    <h4 class="login-box-msg">Masuk untuk memulai sesi Admin</h4>

    <!-- Form untuk login admin -->
    <form action="login.php" method="POST">
      <div class="form-group has-feedback">
        <!-- Input untuk username -->
        <input type="text" class="form-control" name="username" placeholder="Input Username" required autofocus>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <!-- Input untuk password -->
        <input type="password" class="form-control" name="password" placeholder="Input Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group">
        <!-- Tombol untuk submit form login -->
        <button type="submit" class="btn btn-orange btn-block btn-flat" name="login"><i class="fa fa-sign-in"></i> Sign In</button>
      </div>
    </form>
  </div>

  <!-- Menampilkan pesan error jika ada -->
  <?php
    if(isset($_SESSION['error'])){
      echo "
        <div class='alert alert-danger alert-dismissible mt20 text-center'>
          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
          <span class='result'><i class='icon fa fa-warning'></i> ".$_SESSION['error']."</span>
        </div>
      ";
      unset($_SESSION['error']);
    }
  ?>
</div>

<?php include 'includes/scripts.php' ?>
</body>
</html>

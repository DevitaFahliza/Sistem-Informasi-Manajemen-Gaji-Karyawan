<aside class="main-sidebar">
<style>
  .main-sidebar {
    background-color: #f7fafa !important; /* Warna cream */
  }
  .sidebar-menu>li.header {
    background-color: #d3e3e3 !important; /* Warna coklat untuk header */
    color: #000 !important; /* Warna hitam untuk teks header */
  }
  .sidebar-menu>li>a {
    color: #000 !important; /* Warna hitam untuk teks link */
  }
  .sidebar-menu>li>a:hover, .sidebar-menu>li.active>a {
    background-color: #ebf2f2 !important; /* Warna biru untuk link aktif dan hover */
    color: #000 !important; /* Warna hitam untuk teks link saat aktif dan hover */
  }
  .user-panel, .user-panel .info, .user-panel .info a {
    background-color: #f7fafa !important; /* Warna cream untuk panel pengguna */
    color: #000 !important; /* Warna hitam untuk teks user info */
  }
  .sidebar-menu>li>.treeview-menu {
    background-color: #f7fafa !important; /* Warna cream untuk sub-menu */
  }
  .sidebar-menu>li>.treeview-menu>li>a {
    color: #000 !important; /* Warna hitam untuk teks link sub-menu */
  }
  .sidebar-menu>li>.treeview-menu>li>a:hover {
    background-color: #ebf2f2 !important; /* Warna biru untuk link sub-menu saat hover */
    color: #000 !important; /* Warna hitam untuk teks link sub-menu saat hover */
  }
  .sidebar-menu .treeview-menu>li>a .fa,
  .sidebar-menu .treeview-menu>li>a .glyphicon,
  .sidebar-menu .treeview-menu>li>a .ion {
    color: #000 !important; /* Warna hitam untuk ikon sub-menu */
  }
  .sidebar-menu>li.active>.treeview-menu {
    background-color: #f7fafa !important; /* Warna biru untuk sub-menu aktif */
  }
  .sidebar-menu>li>.treeview-menu>li.active>a {
    background-color: #ebf2f2 !important; /* Warna biru untuk link sub-menu aktif */
    color: #000 !important; /* Warna hitam untuk teks link sub-menu aktif */
  }
  .sidebar-menu .treeview-menu>li.active>a {
    background-color: #ebf2f2 !important; /* Warna biru untuk link sub-menu aktif */
    color: #000 !important; /* Warna hitam untuk teks link sub-menu aktif */
  }
  .sidebar-menu>li.active>a {
    background-color: #ebf2f2 !important; /* Warna biru untuk item menu aktif */
    color: #000 !important; /* Warna hitam untuk teks item menu aktif */
  }
  .sidebar-menu>li.treeview>a:hover {
    background-color: #ebf2f2 !important; /* Warna biru untuk treeview saat hover */
    color: #000 !important; /* Warna hitam untuk teks treeview saat hover */
  }
  .sidebar-menu>li.treeview>a:focus {
    background-color: #ebf2f2 !important; /* Warna biru untuk treeview saat fokus */
    color: #000 !important; /* Warna hitam untuk teks treeview saat fokus */
  }
</style>
    <!-- sidebar: style bisa ditemukan di sidebar.less -->
    <section class="sidebar">
      <!-- Panel pengguna di sidebar -->
      <div class="user-panel">
        <!-- Bagian gambar pengguna -->
        <div class="pull-left image">
          <!-- Menampilkan foto pengguna atau gambar profil default -->
          <img src="<?php echo (!empty($user['photo'])) ? '../images/'.$user['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">
        </div>
        <!-- Bagian informasi pengguna -->
        <div class="pull-left info">
          <!-- Menampilkan nama depan dan nama belakang pengguna -->
          <p><?php echo $user['firstname'].' '.$user['lastname']; ?></p>
          <!-- Indikator status online -->
          <a><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- Menu sidebar: gaya bisa ditemukan di sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <!-- Header untuk bagian laporan -->
        <li class="header">REPORTS</li>
        <!-- Tautan ke Dashboard -->
        <li class=""><a href="home.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <!-- Header untuk bagian manajemen -->
        <li class="header">MANAGE</li>
        <!-- Tautan ke kehadiran -->
        <li><a href="attendance.php"><i class="fa fa-calendar"></i> <span>Attendance</span></a></li>
        <!-- Bagian karyawan dengan menu bersarang -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Employees</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!-- Tautan ke daftar karyawan -->
            <li><a href="employee.php"><i class="fa fa-circle-o"></i> List Karyawan</a></li>
            <!-- Tautan ke lembur -->
            <li><a href="overtime.php"><i class="fa fa-circle-o"></i> Lembur</a></li>
            <!-- Tautan ke potongan -->
            <li><a href="cashadvance.php"><i class="fa fa-circle-o"></i> Potongan Gaji</a></li>
            <!-- Tautan ke jadwal kerja -->
            <li><a href="schedule.php"><i class="fa fa-circle-o"></i> Jadwal Kerja</a></li>
          </ul>
        </li>
        <!-- Tautan ke Tunjangan -->
        <li><a href="deduction.php"><i class="fa fa-file-text"></i> Tunjangan</a></li>
        <!-- Tautan ke posisi -->
        <li><a href="position.php"><i class="fa fa-suitcase"></i> Posisi</a></li>
        <!-- Header untuk bagian cetakan -->
        <li class="header">PRINTABLES</li>
        <!-- Tautan ke daftar gaji -->
        <li><a href="payroll.php"><i class="fa fa-files-o"></i> <span>Daftar gaji</span></a></li>
        <!-- Tautan ke jadwal kerja karyawan -->
        <li><a href="schedule_employee.php"><i class="fa fa-clock-o"></i> <span>Jadwal Kerja</span></a></li>
        <!-- Header untuk bagian cetakan -->
        <li class="header">LOGOUT</li>
        <!-- Tautan ke logout -->
        <li><a href="logout.php"><i class="fa fa-files-o"></i> <span>Logout</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
</aside>

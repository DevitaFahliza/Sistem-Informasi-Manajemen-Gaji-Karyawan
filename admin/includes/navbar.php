<header class="main-header">
<style>
  .main-header {
    background-color: #d3e3e3 !important; /* Warna cream untuk header */
  }
  .navbar-static-top {
    background-color: #d3e3e3 !important; /* Warna cream untuk navbar */
  }
  .logo {
    background-color: #d3e3e3 !important; /* Warna cream untuk logo */
    color: #000 !important; /* Warna hitam untuk teks logo */
  }
  .navbar-custom-menu .nav > li > a {
    color: #000 !important; /* Warna teks hitam untuk link navbar */
  }
  .sidebar-toggle {
    color: #000 !important; /* Warna hitam untuk tombol sidebar */
  }
</style>
    <!-- Logo -->
    <a href="home.php" class="logo">
        <!-- logo mini untuk sidebar mini 50x50 piksel -->
       
        <!-- logo untuk tampilan reguler dan perangkat seluler -->
        <span class="logo-lg"><b>SIMAP</b></span>
    </a>
    <!-- Header Navbar: gaya bisa ditemukan di header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Tombol toggle sidebar -->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Alihkan navigasi</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Akun Pengguna: gaya bisa ditemukan di dropdown.less -->
                <li class="dropdown user user-menu">
                    <!-- Dropdown toggle untuk menu pengguna -->
                    <?php
                        // Inisialisasi default untuk data pengguna jika $user tidak ada atau kosong
                        if (!isset($user) || !is_array($user)) {
                            $user = [
                                'firstname' => 'Fisya',
                                'lastname' => 'Reinata',
                                'photo' => 'fisya.jpg', // Foto default jika tidak ada foto pengguna
                                'created_on' => '2020-01-01' // Tanggal default jika tidak ada tanggal keanggotaan
                            ];
                        }

                        // Penggunaan variabel dengan pemeriksaan isset dan operator null coalescing
                        $photo = isset($user['photo']) ? '../images/'.$user['photo'] : '../images/fisya.jpg';
                        $firstName = $user['firstname'] ?? 'Fisya'; // Gunakan 'Guest' jika tidak ada nama depan
                        $lastName = $user['lastname'] ?? 'Reinata'; // Kosongkan jika tidak ada nama belakang
                        ?>

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- Gambar pengguna -->
                            <img src="<?php echo htmlspecialchars($photo, ENT_QUOTES, 'UTF-8'); ?>" class="user-image" alt="User Image">
                            <!-- Nama pengguna (disembunyikan di layar kecil) -->
                            <span class="hidden-xs"><?php echo htmlspecialchars($firstName, ENT_QUOTES, 'UTF-8') . ' ' . htmlspecialchars($lastName, ENT_QUOTES, 'UTF-8'); ?></span>
                        </a>

                    <!-- Dropdown menu untuk akun pengguna -->
                    <ul class="dropdown-menu">
                        <!-- Gambar pengguna di dalam dropdown -->
                        <li class="user-header">
                            <img src="<?php echo (!empty($user['photo'])) ? '../images/'.$user['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">
                            <p>
                                <!-- Nama pengguna -->
                                <?php echo $user['firstname'].' '.$user['lastname']; ?>
                                <!-- Tanggal mulai keanggotaan pengguna -->
                                <small>Member since <?php echo date('M. Y', strtotime($user['created_on'])); ?></small>
                            </p>
                        </li>
                        <!-- Footer menu pengguna dengan tombol -->
                        <li class="user-footer">
                            <div class="pull-left">
                                <!-- Tautan untuk memperbarui profil -->
                                <a href="#profile" data-toggle="modal" class="btn btn-default btn-flat" id="admin_profile">Update</a>
                            </div>
                            <div class="pull-right">
                                <!-- Tautan untuk keluar -->
                                <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- Sertakan modal profil -->
<?php include 'includes/profile_modal.php'; ?>

<?php include 'includes/session.php'; ?> <!-- Memuat file session.php yang berisi sesi pengguna -->
<?php include 'includes/header.php'; ?> <!-- Memuat file header.php yang berisi elemen header halaman -->
<style>
  .content-wrapper, .main-footer, .main-header, .main-sidebar {  /* Mengatur latar belakang elemen utama menjadi #faf9f7 */
    background-color: #fafafa !important;
  }
  .content {  /* Mengatur latar belakang konten menjadi #faf9f7 */
    background-color: #fafafa !important;
  }
</style>
<body class="hold-transition skin-blue sidebar-mini" style="background-color: #faf9f7;">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?> <!-- Memuat file navbar.php yang berisi elemen navigasi atas -->
  <?php include 'includes/menubar.php'; ?> <!-- Memuat file menubar.php yang berisi elemen menu samping -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Attendance <!-- Judul halaman -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Attendance</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php
        // Menampilkan pesan error jika ada
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        // Menampilkan pesan sukses jika ada
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <!-- Tombol untuk menambah data baru -->
              <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
            </div>
            <div class="box-body">
              <!-- Tabel untuk menampilkan data kehadiran -->
              <table id="example1" class="table table-bordered">
                <thead>
                  <th class="hidden"></th>
                  <th>Tanggal</th>
                  <th>ID Karyawan</th>
                  <th>Nama</th>
                  <th>Time In</th>
                  <th>Time Out</th>
                  <th>Tools</th>
                </thead>
                <tbody>
                  <?php
                    // Query untuk mengambil data kehadiran dan karyawan
                    $sql = "SELECT *, employees.employee_id AS empid, attendance.id AS attid FROM attendance LEFT JOIN employees ON employees.id=attendance.employee_id ORDER BY attendance.date DESC, attendance.time_in DESC";
                    $query = $conn->query($sql);
                    // Loop untuk menampilkan data kehadiran dalam tabel
                    while($row = $query->fetch_assoc()){
                      $status = ($row['status'])?'<span class="label label-warning pull-right">ontime</span>':'<span class="label label-danger pull-right">late</span>';
                      echo "
                        <tr>
                          <td class='hidden'></td>
                          <td>".date('M d, Y', strtotime($row['date']))."</td>
                          <td>".$row['empid']."</td>
                          <td>".$row['firstname'].' '.$row['lastname']."</td>
                          <td>".date('h:i A', strtotime($row['time_in'])).$status."</td>
                          <td>".date('h:i A', strtotime($row['time_out']))."</td>
                          <td>
                            <!-- Tombol untuk mengedit data -->
                            <button class='btn btn-success btn-sm btn-flat edit' data-id='".$row['attid']."'><i class='fa fa-edit'></i> Edit</button>
                            <!-- Tombol untuk menghapus data -->
                            <button class='btn btn-danger btn-sm btn-flat delete' data-id='".$row['attid']."'><i class='fa fa-trash'></i> Delete</button>
                          </td>
                        </tr>
                      ";
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?> <!-- Memuat file footer.php yang berisi elemen footer halaman -->
  <?php include 'includes/attendance_modal.php'; ?> <!-- Memuat file attendance_modal.php yang berisi modal untuk mengelola kehadiran -->
</div>
<?php include 'includes/scripts.php'; ?> <!-- Memuat file scripts.php yang berisi elemen-elemen script halaman -->
<script>
$(function(){
  // Fungsi untuk menangani klik tombol edit
  $('.edit').click(function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  // Fungsi untuk menangani klik tombol delete
  $('.delete').click(function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
});

// Fungsi untuk mengambil data baris kehadiran berdasarkan ID
function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'attendance_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      // Mengisi nilai-nilai dalam form edit dan delete dengan data yang diambil
      $('#datepicker_edit').val(response.date);
      $('#attendance_date').html(response.date);
      $('#edit_time_in').val(response.time_in);
      $('#edit_time_out').val(response.time_out);
      $('#attid').val(response.attid);
      $('#employee_name').html(response.firstname+' '+response.lastname);
      $('#del_attid').val(response.attid);
      $('#del_employee_name').html(response.firstname+' '+response.lastname);
    }
  });
}
</script>
</body>
</html>

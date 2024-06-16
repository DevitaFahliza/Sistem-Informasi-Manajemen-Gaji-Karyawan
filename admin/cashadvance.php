<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<style>
  .content-wrapper, .main-footer, .main-header, .main-sidebar {  /* Mengatur latar belakang elemen utama menjadi #faf9f7 */
    background-color: #fafafa !important;
  }
  .content {  /* Mengatur latar belakang konten menjadi #faf9f7 */
    background-color: #fafafa !important;
  }
</style>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Potongan Gaji <!-- Judul halaman -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Karyawan</li>
        <li class="active">Potongan Gaji</li> <!-- Navigasi breadcrumb -->
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){ // Cek jika ada pesan error
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']); // Hapus pesan error setelah ditampilkan
        }
        if(isset($_SESSION['success'])){ // Cek jika ada pesan sukses
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']); // Hapus pesan sukses setelah ditampilkan
        }
      ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a> <!-- Tombol untuk membuka modal tambah data -->
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th class="hidden"></th>
                  <th>Tanggal</th>
                  <th>ID Karyawan</th>
                  <th>Nama</th>
                  <th>Jumlah</th>
                  <th>Tools</th> <!-- Header tabel -->
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT *, cashadvance.id AS caid, employees.employee_id AS empid FROM cashadvance LEFT JOIN employees ON employees.id=cashadvance.employee_id ORDER BY date_advance DESC";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){ // Mengambil data dari database dan menampilkan di tabel
                      echo "
                        <tr>
                          <td class='hidden'></td>
                          <td>".date('M d, Y', strtotime($row['date_advance']))."</td>
                          <td>".$row['empid']."</td>
                          <td>".$row['firstname'].' '.$row['lastname']."</td>
                          <td>".number_format($row['amount'], 2)."</td>
                          <td>
                            <button class='btn btn-success btn-sm edit btn-flat' data-id='".$row['caid']."'><i class='fa fa-edit'></i> Edit</button> <!-- Tombol edit -->
                            <button class='btn btn-danger btn-sm delete btn-flat' data-id='".$row['caid']."'><i class='fa fa-trash'></i> Delete</button> <!-- Tombol delete -->
                          </td>
                        </tr>
                      ";
                    }
                  ?>
                </tbody> <!-- Isi tabel -->
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/cashadvance_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  $('.edit').click(function(e){ // Event saat tombol edit diklik
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $('.delete').click(function(e){ // Event saat tombol delete diklik
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
});

function getRow(id){ // Fungsi untuk mendapatkan data baris berdasarkan ID
  $.ajax({
    type: 'POST',
    url: 'cashadvance_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      console.log(response);
      $('.date').html(response.date_advance);
      $('.employee_name').html(response.firstname+' '+response.lastname);
      $('.caid').val(response.caid);
      $('#edit_amount').val(response.amount);
    }
  });
}
</script>
</body>
</html>

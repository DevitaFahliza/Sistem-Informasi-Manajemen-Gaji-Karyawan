<?php include 'includes/session.php'; ?>
<style>
  .content-wrapper, .main-footer, .main-header, .main-sidebar {  /* Mengatur latar belakang elemen utama menjadi #faf9f7 */
    background-color: #fafafa !important;
  }
  .content {  /* Mengatur latar belakang konten menjadi #faf9f7 */
    background-color: #fafafa !important;
  }
</style>
<?php
  // Mengatur timezone dan menentukan rentang tanggal awal dan akhir
  include '../timezone.php';
  $range_to = date('m/d/Y');
  $range_from = date('m/d/Y', strtotime('-30 day', strtotime($range_to)));
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Payroll
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Payroll</li>
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
              <div class="pull-right">
                <!-- Form untuk memilih rentang tanggal dan menghasilkan laporan payroll -->
                <form method="POST" class="form-inline" id="payForm">
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right col-sm-8" id="reservation" name="date_range" value="<?php echo (isset($_GET['range'])) ? $_GET['range'] : $range_from.' - '.$range_to; ?>">
                  </div>
                  <button type="button" class="btn btn-success btn-sm btn-flat" id="payroll"><span class="glyphicon glyphicon-print"></span> Payroll</button>
                  <button type="button" class="btn btn-primary btn-sm btn-flat" id="payslip"><span class="glyphicon glyphicon-print"></span> Payslip</button>
                </form>
              </div>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>Nama Karyawan</th>
                  <th>ID Karyawan</th>
                  <th>Gaji Kotor</th>
                  <th>Tunjangan</th>
                  <th>Potongan Gaji</th>
                  <th>Gaji bersih</th>
                </thead>
                <tbody>
                  <?php
                    // Mengambil total potongan dari tabel deductions
                    $sql = "SELECT *, SUM(amount) as total_amount FROM deductions";
                    $query = $conn->query($sql);
                    $drow = $query->fetch_assoc();
                    $deduction = $drow['total_amount'];
  
                    // Menentukan rentang tanggal untuk query
                    $to = date('Y-m-d');
                    $from = date('Y-m-d', strtotime('-30 day', strtotime($to)));

                    if(isset($_GET['range'])){
                      $range = $_GET['range'];
                      $ex = explode(' - ', $range);
                      $from = date('Y-m-d', strtotime($ex[0]));
                      $to = date('Y-m-d', strtotime($ex[1]));
                    }

                    // Query untuk mengambil data kehadiran, karyawan, dan posisi berdasarkan rentang tanggal
                    $sql = "SELECT *, SUM(num_hr) AS total_hr, attendance.employee_id AS empid FROM attendance LEFT JOIN employees ON employees.id=attendance.employee_id LEFT JOIN position ON position.id=employees.position_id WHERE date BETWEEN '$from' AND '$to' GROUP BY attendance.employee_id ORDER BY employees.lastname ASC, employees.firstname ASC";

                    $query = $conn->query($sql);
                    $total = 0;
                    while($row = $query->fetch_assoc()){
                      $empid = $row['empid'];
                      
                      // Query untuk mengambil data cash advance berdasarkan employee_id dan rentang tanggal
                      $casql = "SELECT *, SUM(amount) AS cashamount FROM cashadvance WHERE employee_id='$empid' AND date_advance BETWEEN '$from' AND '$to'";
                      
                      $caquery = $conn->query($casql);
                      $carow = $caquery->fetch_assoc();
                      $cashadvance = $carow['cashamount'];

                      // Menghitung gaji kotor dan gaji bersih
                      $gross = $row['rate'] * $row['total_hr'];
                      $total_deduction = $deduction - $cashadvance;
                      $net = $gross + $total_deduction;

                      // Menampilkan data karyawan dalam tabel
                      echo "
                        <tr>
                          <td>".$row['lastname'].", ".$row['firstname']."</td>
                          <td>".$row['employee_id']."</td>
                          <td>".number_format($gross, 2)."</td>
                          <td>".number_format($deduction, 2)."</td>
                          <td>".number_format($cashadvance, 2)."</td>
                          <td>".number_format($net, 2)."</td>
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
    
  <?php include 'includes/footer.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?> 
<script>
$(function(){
  // Ketika tombol edit diklik, tampilkan modal edit
  $('.edit').click(function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  // Ketika tombol delete diklik, tampilkan modal delete
  $('.delete').click(function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  // Ketika rentang tanggal diubah, refresh halaman dengan rentang baru
  $("#reservation").on('change', function(){
    var range = encodeURI($(this).val());
    window.location = 'payroll.php?range='+range;
  });

  // Ketika tombol payroll diklik, submit form untuk menghasilkan laporan payroll
  $('#payroll').click(function(e){
    e.preventDefault();
    $('#payForm').attr('action', 'payroll_generate.php');
    $('#payForm').submit();
  });

  // Ketika tombol payslip diklik, submit form untuk menghasilkan slip gaji
  $('#payslip').click(function(e){
    e.preventDefault();
    $('#payForm').attr('action', 'payslip_generate.php');
    $('#payForm').submit();
  });

});

// Fungsi untuk mengambil data baris posisi berdasarkan ID
function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'position_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('#posid').val(response.id);
      $('#edit_title').val(response.description);
      $('#edit_rate').val(response.rate);
      $('#del_posid').val(response.id);
      $('#del_position').html(response.description);
    }
  });
}
</script>
</body>
</html>

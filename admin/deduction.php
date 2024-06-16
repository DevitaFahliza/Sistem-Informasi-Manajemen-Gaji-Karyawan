<?php include 'includes/session.php'; ?> <!-- Menghubungkan file session.php untuk memulai sesi dan mengatur koneksi database -->
<?php include 'includes/header.php'; ?> <!-- Menghubungkan file header.php untuk menampilkan bagian header halaman -->
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

  <?php include 'includes/navbar.php'; ?> <!-- Menghubungkan file navbar.php untuk menampilkan navbar -->
  <?php include 'includes/menubar.php'; ?> <!-- Menghubungkan file menubar.php untuk menampilkan menu sidebar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tunjangan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Tunjangan</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){ // Jika ada pesan error di sesi, tampilkan alert error
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']); // Hapus pesan error dari sesi setelah ditampilkan
        }
        if(isset($_SESSION['success'])){ // Jika ada pesan sukses di sesi, tampilkan alert sukses
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']); // Hapus pesan sukses dari sesi setelah ditampilkan
        }
      ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a> <!-- Tombol untuk membuka modal tambah data baru -->
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>Description</th>
                  <th>Jumlah</th>
                  <th>Tools</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT * FROM deductions"; // Query untuk mengambil data deductions dari database
                    $query = $conn->query($sql); // Menjalankan query
                    while($row = $query->fetch_assoc()){ // Mengambil setiap baris data
                      echo "
                        <tr>
                          <td>".$row['description']."</td>
                          <td>".number_format($row['amount'], 2)."</td>
                          <td>
                            <button class='btn btn-success btn-sm edit btn-flat' data-id='".$row['id']."'><i class='fa fa-edit'></i> Edit</button> <!-- Tombol untuk membuka modal edit data -->
                            <button class='btn btn-danger btn-sm delete btn-flat' data-id='".$row['id']."'><i class='fa fa-trash'></i> Delete</button> <!-- Tombol untuk membuka modal hapus data -->
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
    
  <?php include 'includes/footer.php'; ?> <!-- Menghubungkan file footer.php untuk menampilkan footer -->
  <?php include 'includes/deduction_modal.php'; ?> <!-- Menghubungkan file deduction_modal.php untuk menampilkan modal -->
</div>
<?php include 'includes/scripts.php'; ?> <!-- Menghubungkan file scripts.php untuk menyertakan skrip JavaScript -->
<script>
$(function(){
  $('.edit').click(function(e){
    e.preventDefault(); // Mencegah aksi default saat tombol diklik
    $('#edit').modal('show'); // Menampilkan modal edit
    var id = $(this).data('id'); // Mendapatkan data id dari tombol yang diklik
    getRow(id); // Memanggil fungsi getRow dengan id sebagai parameter
  });

  $('.delete').click(function(e){
    e.preventDefault(); // Mencegah aksi default saat tombol diklik
    $('#delete').modal('show'); // Menampilkan modal delete
    var id = $(this).data('id'); // Mendapatkan data id dari tombol yang diklik
    getRow(id); // Memanggil fungsi getRow dengan id sebagai parameter
  });
});

function getRow(id){
  $.ajax({
    type: 'POST', // Metode pengiriman data
    url: 'deduction_row.php', // URL file yang akan menerima data
    data: {id:id}, // Data yang dikirim ke server
    dataType: 'json', // Tipe data yang diharapkan dari server
    success: function(response){
      $('.decid').val(response.id); // Mengisi input hidden dengan id deduction
      $('#edit_description').val(response.description); // Mengisi input description dengan data dari server
      $('#edit_amount').val(response.amount); // Mengisi input amount dengan data dari server
      $('#del_deduction').html(response.description); // Menampilkan description di modal delete
    }
  });
}
</script>
</body>
</html>

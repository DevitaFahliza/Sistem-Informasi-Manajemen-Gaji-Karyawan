<?php
	// Menyertakan file session.php untuk memulai sesi dan menghubungkan database
	include 'includes/session.php';

	// Memeriksa apakah form upload telah disubmit
	if(isset($_POST['upload'])){
		// Mengambil ID karyawan dari input form
		$empid = $_POST['id'];
		// Mengambil nama file foto yang diupload
		$filename = $_FILES['photo']['name'];
		// Memeriksa apakah ada file yang diupload
		if(!empty($filename)){
			// Memindahkan file yang diupload ke folder images
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		}
		
		// Membuat query untuk memperbarui kolom foto pada tabel employees berdasarkan ID karyawan
		$sql = "UPDATE employees SET photo = '$filename' WHERE id = '$empid'";
		// Mengeksekusi query dan memeriksa apakah berhasil
		if($conn->query($sql)){
			// Menyimpan pesan sukses ke dalam sesi jika update berhasil
			$_SESSION['success'] = 'Employee photo updated successfully';
		}
		else{
			// Menyimpan pesan error ke dalam sesi jika update gagal
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		// Menyimpan pesan error ke dalam sesi jika tidak ada karyawan yang dipilih untuk update foto
		$_SESSION['error'] = 'Select employee to update photo first';
	}

	// Mengarahkan kembali ke halaman employee.php
	header('location: employee.php');
?>

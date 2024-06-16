<?php
	// Menyertakan file session.php untuk memulai sesi dan menghubungkan database
	include 'includes/session.php';

	// Memeriksa apakah form edit telah disubmit
	if(isset($_POST['edit'])){
		// Mengambil ID karyawan dari input form
		$empid = $_POST['id'];
		// Mengambil data karyawan yang diinput dari form
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$address = $_POST['address'];
		$birthdate = $_POST['birthdate'];
		$contact = $_POST['contact'];
		$gender = $_POST['gender'];
		$position = $_POST['position'];
		$schedule = $_POST['schedule'];
		
		// Membuat query untuk memperbarui data karyawan pada tabel employees berdasarkan ID karyawan
		$sql = "UPDATE employees SET firstname = '$firstname', lastname = '$lastname', address = '$address', birthdate = '$birthdate', contact_info = '$contact', gender = '$gender', position_id = '$position', schedule_id = '$schedule' WHERE id = '$empid'";
		// Mengeksekusi query dan memeriksa apakah berhasil
		if($conn->query($sql)){
			// Menyimpan pesan sukses ke dalam sesi jika update berhasil
			$_SESSION['success'] = 'Employee updated successfully';
		}
		else{
			// Menyimpan pesan error ke dalam sesi jika update gagal
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		// Menyimpan pesan error ke dalam sesi jika tidak ada karyawan yang dipilih untuk diubah
		$_SESSION['error'] = 'Select employee to edit first';
	}

	// Mengarahkan kembali ke halaman employee.php
	header('location: employee.php');
?>

<?php
	// Menyertakan file session.php untuk memulai sesi dan menghubungkan database
	include 'includes/session.php';

	// Memeriksa apakah form edit telah disubmit
	if(isset($_POST['edit'])){
		// Mengambil nilai dari input form
		$empid = $_POST['id'];
		$sched_id = $_POST['schedule'];
		
		// Membuat query untuk memperbarui jadwal karyawan pada tabel employees berdasarkan ID karyawan
		$sql = "UPDATE employees SET schedule_id = '$sched_id' WHERE id = '$empid'";
		// Mengeksekusi query dan memeriksa apakah berhasil
		if($conn->query($sql)){
			// Menyimpan pesan sukses ke dalam sesi jika pembaruan berhasil
			$_SESSION['success'] = 'Schedule updated successfully';
		}
		else{
			// Menyimpan pesan error ke dalam sesi jika terjadi kesalahan pada query
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		// Menyimpan pesan error ke dalam sesi jika jadwal belum dipilih untuk diedit
		$_SESSION['error'] = 'Select schedule to edit first';
	}

	// Mengarahkan kembali ke halaman schedule_employee.php
	header('location: schedule_employee.php');
?>

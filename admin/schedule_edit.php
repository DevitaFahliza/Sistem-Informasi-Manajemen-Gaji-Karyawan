<?php
	// Menyertakan file session.php untuk memulai sesi dan menghubungkan database
	include 'includes/session.php';

	// Memeriksa apakah form edit telah disubmit
	if(isset($_POST['edit'])){
		// Mengambil nilai dari input form
		$id = $_POST['id'];
		$time_in = $_POST['time_in'];
		$time_in = date('H:i:s', strtotime($time_in)); // Mengonversi waktu masuk ke format H:i:s
		$time_out = $_POST['time_out'];
		$time_out = date('H:i:s', strtotime($time_out)); // Mengonversi waktu keluar ke format H:i:s

		// Membuat query untuk memperbarui data jadwal pada tabel schedules berdasarkan ID
		$sql = "UPDATE schedules SET time_in = '$time_in', time_out = '$time_out' WHERE id = '$id'";
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
		// Menyimpan pesan error ke dalam sesi jika form edit belum diisi
		$_SESSION['error'] = 'Fill up edit form first';
	}

	// Mengarahkan kembali ke halaman schedule.php
	header('location:schedule.php');

?>

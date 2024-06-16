<?php
	// Menyertakan file session.php untuk memulai sesi dan menghubungkan database
	include 'includes/session.php';

	// Memeriksa apakah form tambah jadwal telah disubmit
	if(isset($_POST['add'])){
		// Mengambil nilai dari input form
		$time_in = $_POST['time_in'];
		$time_in = date('H:i:s', strtotime($time_in)); // Mengonversi waktu masuk ke format H:i:s
		$time_out = $_POST['time_out'];
		$time_out = date('H:i:s', strtotime($time_out)); // Mengonversi waktu keluar ke format H:i:s

		// Membuat query untuk menambahkan jadwal baru ke tabel schedules
		$sql = "INSERT INTO schedules (time_in, time_out) VALUES ('$time_in', '$time_out')";
		// Mengeksekusi query dan memeriksa apakah berhasil
		if($conn->query($sql)){
			// Menyimpan pesan sukses ke dalam sesi jika penambahan jadwal berhasil
			$_SESSION['success'] = 'Schedule added successfully';
		}
		else{
			// Menyimpan pesan error ke dalam sesi jika terjadi kesalahan pada query
			$_SESSION['error'] = $conn->error;
		}
	}	
	else{
		// Menyimpan pesan error ke dalam sesi jika form tambah jadwal belum diisi
		$_SESSION['error'] = 'Fill up add form first';
	}

	// Mengarahkan kembali ke halaman schedule.php
	header('location: schedule.php');

?>

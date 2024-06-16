<?php
	// Menyertakan file session.php untuk memulai sesi dan menghubungkan database
	include 'includes/session.php';

	// Memeriksa apakah form tambah posisi telah disubmit
	if(isset($_POST['add'])){
		// Mengambil nilai dari input form
		$title = $_POST['title'];
		$rate = $_POST['rate'];

		// Membuat query untuk menambahkan posisi baru ke tabel position
		$sql = "INSERT INTO position (description, rate) VALUES ('$title', '$rate')";
		// Mengeksekusi query dan memeriksa apakah berhasil
		if($conn->query($sql)){
			// Menyimpan pesan sukses ke dalam sesi jika penambahan posisi berhasil
			$_SESSION['success'] = 'Position added successfully';
		}
		else{
			// Menyimpan pesan error ke dalam sesi jika terjadi kesalahan pada query
			$_SESSION['error'] = $conn->error;
		}
	}	
	else{
		// Menyimpan pesan error ke dalam sesi jika form tambah posisi belum diisi
		$_SESSION['error'] = 'Fill up add form first';
	}

	// Mengarahkan kembali ke halaman position.php
	header('location: position.php');

?>

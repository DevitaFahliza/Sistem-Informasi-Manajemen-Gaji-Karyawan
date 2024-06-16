<?php
	// Menyertakan file session.php untuk memulai sesi dan menghubungkan database
	include 'includes/session.php';

	// Memeriksa apakah form edit telah disubmit
	if(isset($_POST['edit'])){
		// Mengambil nilai dari input form
		$id = $_POST['id'];
		$title = $_POST['title'];
		$rate = $_POST['rate'];

		// Membuat query untuk memperbarui data posisi pada tabel position berdasarkan ID
		$sql = "UPDATE position SET description = '$title', rate = '$rate' WHERE id = '$id'";
		// Mengeksekusi query dan memeriksa apakah berhasil
		if($conn->query($sql)){
			// Menyimpan pesan sukses ke dalam sesi jika pembaruan berhasil
			$_SESSION['success'] = 'Position updated successfully';
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

	// Mengarahkan kembali ke halaman position.php
	header('location:position.php');

?>

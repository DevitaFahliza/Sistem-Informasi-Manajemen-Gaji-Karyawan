<?php
    // Memuat file session.php yang berisi sesi pengguna
	include 'includes/session.php';

	// Memeriksa apakah tombol 'delete' telah ditekan
	if(isset($_POST['delete'])){
		// Mengambil nilai ID dari form
		$id = $_POST['id'];
		// Membuat query SQL untuk menghapus data kehadiran berdasarkan ID
		$sql = "DELETE FROM attendance WHERE id = '$id'";
		// Mengeksekusi query dan memeriksa apakah berhasil
		if($conn->query($sql)){
			// Jika berhasil, set sesi sukses dengan pesan keberhasilan
			$_SESSION['success'] = 'Attendance deleted successfully';
		}
		else{
			// Jika terjadi kesalahan, set sesi error dengan pesan kesalahan dari database
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		// Jika tidak ada item yang dipilih untuk dihapus, set sesi error dengan pesan yang sesuai
		$_SESSION['error'] = 'Select item to delete first';
	}

	// Mengarahkan kembali ke halaman attendance.php
	header('location: attendance.php');
	
?>

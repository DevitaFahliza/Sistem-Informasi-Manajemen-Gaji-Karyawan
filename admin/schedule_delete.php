<?php
	// Menyertakan file session.php untuk memulai sesi dan menghubungkan database
	include 'includes/session.php';

	// Memeriksa apakah form hapus telah disubmit
	if(isset($_POST['delete'])){
		// Mengambil nilai ID dari input form
		$id = $_POST['id'];

		// Membuat query untuk menghapus jadwal berdasarkan ID
		$sql = "DELETE FROM schedules WHERE id = '$id'";
		// Mengeksekusi query dan memeriksa apakah berhasil
		if($conn->query($sql)){
			// Menyimpan pesan sukses ke dalam sesi jika penghapusan berhasil
			$_SESSION['success'] = 'Schedule deleted successfully';
		}
		else{
			// Menyimpan pesan error ke dalam sesi jika terjadi kesalahan pada query
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		// Menyimpan pesan error ke dalam sesi jika tidak ada item yang dipilih untuk dihapus
		$_SESSION['error'] = 'Select item to delete first';
	}

	// Mengarahkan kembali ke halaman schedule.php
	header('location: schedule.php');
	
?>

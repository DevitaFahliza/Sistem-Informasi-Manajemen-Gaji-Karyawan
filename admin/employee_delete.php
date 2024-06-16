<?php
	// Memasukkan file session.php untuk memulai sesi
	include 'includes/session.php';

	// Mengecek apakah form dengan metode POST untuk penghapusan telah disubmit
	if(isset($_POST['delete'])){
		// Menyimpan data ID yang diterima dari form ke variabel
		$id = $_POST['id'];
		
		// Menyusun perintah SQL untuk menghapus data karyawan berdasarkan ID
		$sql = "DELETE FROM employees WHERE id = '$id'";
		
		// Mengeksekusi perintah SQL dan mengecek apakah berhasil
		if($conn->query($sql)){
			$_SESSION['success'] = 'Employee deleted successfully'; // Menyimpan pesan sukses ke sesi
		}
		else{
			$_SESSION['error'] = $conn->error; // Menyimpan pesan error ke sesi
		}
	}
	else{
		$_SESSION['error'] = 'Select item to delete first'; // Menyimpan pesan error ke sesi jika belum ada item yang dipilih untuk dihapus
	}

	// Mengarahkan kembali ke halaman employee.php
	header('location: employee.php');
	
?>

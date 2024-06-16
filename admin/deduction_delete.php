<?php
	include 'includes/session.php'; // Menghubungkan file session.php untuk memulai sesi dan mengatur koneksi database

	if(isset($_POST['delete'])){ // Memeriksa apakah form 'delete' telah disubmit
		$id = $_POST['id']; // Menyimpan input 'id' dari form ke variabel $id
		$sql = "DELETE FROM deductions WHERE id = '$id'"; // Membuat query SQL untuk menghapus data deduction berdasarkan id
		if($conn->query($sql)){ // Menjalankan query SQL dan memeriksa apakah berhasil
			$_SESSION['success'] = 'allowance deleted successfully'; // Jika berhasil, set pesan sukses di sesi
		}
		else{
			$_SESSION['error'] = $conn->error; // Jika gagal, set pesan error di sesi dengan pesan error dari database
		}
	}
	else{
		$_SESSION['error'] = 'Select item to delete first'; // Jika item belum dipilih untuk dihapus, set pesan error di sesi
	}

	header('location: deduction.php'); // Mengarahkan pengguna kembali ke halaman deduction.php
	
?>

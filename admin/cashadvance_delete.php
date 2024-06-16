<?php
	include 'includes/session.php'; // Memuat file session.php yang berisi sesi pengguna

	if(isset($_POST['delete'])){ // Mengecek apakah form 'delete' telah disubmit
		$id = $_POST['id']; // Mengambil data 'id' dari form
		$sql = "DELETE FROM cashadvance WHERE id = '$id'"; // Query untuk menghapus data cash advance berdasarkan ID
		if($conn->query($sql)){ // Menjalankan query
			$_SESSION['success'] = 'salary cuts deleted successfully'; // Menyimpan pesan sukses jika data berhasil dihapus
		}
		else{
			$_SESSION['error'] = $conn->error; // Menyimpan pesan error jika terjadi kesalahan saat menghapus data
		}
	}
	else{
		$_SESSION['error'] = 'Select item to delete first'; // Menyimpan pesan error jika item yang akan dihapus belum dipilih
	}

	header('location: cashadvance.php'); // Mengarahkan kembali ke halaman cashadvance.php
	
?>

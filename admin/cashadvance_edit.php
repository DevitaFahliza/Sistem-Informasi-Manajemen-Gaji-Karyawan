<?php
	include 'includes/session.php'; // Memuat file session.php yang berisi sesi pengguna

	if(isset($_POST['edit'])){ // Mengecek apakah form 'edit' telah disubmit
		$id = $_POST['id']; // Mengambil data 'id' dari form
		$amount = $_POST['amount']; // Mengambil data 'amount' dari form
		
		$sql = "UPDATE cashadvance SET amount = '$amount' WHERE id = '$id'"; // Query untuk mengupdate data cash advance berdasarkan ID
		if($conn->query($sql)){ // Menjalankan query
			$_SESSION['success'] = 'salary cuts updated successfully'; // Menyimpan pesan sukses jika data berhasil diupdate
		}
		else{
			$_SESSION['error'] = $conn->error; // Menyimpan pesan error jika terjadi kesalahan saat mengupdate data
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first'; // Menyimpan pesan error jika form edit belum diisi
	}

	header('location:cashadvance.php'); // Mengarahkan kembali ke halaman cashadvance.php

?>

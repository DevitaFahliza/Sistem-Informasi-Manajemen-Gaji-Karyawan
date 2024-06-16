<?php
	include 'includes/session.php'; // Menghubungkan file session.php untuk memulai sesi dan mengatur koneksi database

	if(isset($_POST['edit'])){ // Memeriksa apakah form 'edit' telah disubmit
		$id = $_POST['id']; // Menyimpan input 'id' dari form ke variabel $id
		$description = $_POST['description']; // Menyimpan input 'description' dari form ke variabel $description
		$amount = $_POST['amount']; // Menyimpan input 'amount' dari form ke variabel $amount

		$sql = "UPDATE deductions SET description = '$description', amount = '$amount' WHERE id = '$id'"; // Membuat query SQL untuk memperbarui data deduction berdasarkan id
		if($conn->query($sql)){ // Menjalankan query SQL dan memeriksa apakah berhasil
			$_SESSION['success'] = 'allowance updated successfully'; // Jika berhasil, set pesan sukses di sesi
		}
		else{
			$_SESSION['error'] = $conn->error; // Jika gagal, set pesan error di sesi dengan pesan error dari database
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first'; // Jika form edit belum diisi, set pesan error di sesi
	}

	header('location:deduction.php'); // Mengarahkan pengguna kembali ke halaman deduction.php

?>

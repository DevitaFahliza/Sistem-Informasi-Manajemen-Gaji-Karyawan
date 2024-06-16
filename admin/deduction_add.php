<?php
	include 'includes/session.php'; // Menghubungkan file session.php untuk memulai sesi dan mengatur koneksi database

	if(isset($_POST['add'])){ // Memeriksa apakah form 'add' telah disubmit
		$description = $_POST['description']; // Menyimpan input 'description' dari form ke variabel $description
		$amount = $_POST['amount']; // Menyimpan input 'amount' dari form ke variabel $amount

		$sql = "INSERT INTO deductions (description, amount) VALUES ('$description', '$amount')"; // Membuat query SQL untuk menambahkan data deduction baru ke database
		if($conn->query($sql)){ // Menjalankan query SQL dan memeriksa apakah berhasil
			$_SESSION['success'] = 'allowance added successfully'; // Jika berhasil, set pesan sukses di sesi
		}
		else{
			$_SESSION['error'] = $conn->error; // Jika gagal, set pesan error di sesi dengan pesan error dari database
		}
	}	
	else{
		$_SESSION['error'] = 'Fill up add form first'; // Jika form belum diisi dan disubmit, set pesan error di sesi
	}

	header('location: deduction.php'); // Mengarahkan pengguna kembali ke halaman deduction.php

?>

<?php
	include 'includes/session.php'; // Memuat file session.php yang berisi sesi pengguna

	if(isset($_POST['add'])){ // Mengecek apakah form 'add' telah disubmit
		$employee = $_POST['employee']; // Mengambil data 'employee' dari form
		$amount = $_POST['amount']; // Mengambil data 'amount' dari form
		
		$sql = "SELECT * FROM employees WHERE employee_id = '$employee'"; // Query untuk mencari data karyawan berdasarkan ID
		$query = $conn->query($sql); // Menjalankan query
		if($query->num_rows < 1){ // Mengecek apakah karyawan ditemukan
			$_SESSION['error'] = 'Employee not found'; // Menyimpan pesan error jika karyawan tidak ditemukan
		}
		else{
			$row = $query->fetch_assoc(); // Mengambil data karyawan
			$employee_id = $row['id']; // Mengambil ID karyawan
			// Query untuk menambahkan data cash advance
			$sql = "INSERT INTO cashadvance (employee_id, date_advance, amount) VALUES ('$employee_id', NOW(), '$amount')";
			if($conn->query($sql)){ // Menjalankan query
				$_SESSION['success'] = 'salary cuts added successfully'; // Menyimpan pesan sukses jika data berhasil ditambahkan
			}
			else{
				$_SESSION['error'] = $conn->error; // Menyimpan pesan error jika terjadi kesalahan saat menambahkan data
			}
		}
	}	
	else{
		$_SESSION['error'] = 'Fill up add form first'; // Menyimpan pesan error jika form belum diisi
	}

	header('location: cashadvance.php'); // Mengarahkan kembali ke halaman cashadvance.php

?>

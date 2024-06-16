<?php
	// Menyertakan file session.php untuk memulai sesi dan menghubungkan database
	include 'includes/session.php';

	// Memeriksa apakah form tambah lembur telah disubmit
	if(isset($_POST['add'])){
		// Mengambil nilai dari input form
		$employee = $_POST['employee'];
		$date = $_POST['date'];
		$hours = $_POST['hours'] + ($_POST['mins']/60);
		$rate = $_POST['rate'];

		// Membuat query untuk mencari data karyawan berdasarkan employee_id
		$sql = "SELECT * FROM employees WHERE employee_id = '$employee'";
		$query = $conn->query($sql);

		// Memeriksa apakah data karyawan ditemukan
		if($query->num_rows < 1){
			// Menyimpan pesan error ke dalam sesi jika karyawan tidak ditemukan
			$_SESSION['error'] = 'Employee not found';
		}
		else{
			// Mengambil data baris hasil query
			$row = $query->fetch_assoc();
			$employee_id = $row['id'];

			// Membuat query untuk menambahkan data lembur ke tabel overtime
			$sql = "INSERT INTO overtime (employee_id, date_overtime, hours, rate) VALUES ('$employee_id', '$date', '$hours', '$rate')";
			// Mengeksekusi query dan memeriksa apakah berhasil
			if($conn->query($sql)){
				// Menyimpan pesan sukses ke dalam sesi jika penambahan data lembur berhasil
				$_SESSION['success'] = 'Overtime added successfully';
			}
			else{
				// Menyimpan pesan error ke dalam sesi jika terjadi kesalahan pada query
				$_SESSION['error'] = $conn->error;
			}
		}
	}	
	else{
		// Menyimpan pesan error ke dalam sesi jika form tambah lembur belum diisi
		$_SESSION['error'] = 'Fill up add form first';
	}

	// Mengarahkan kembali ke halaman overtime.php
	header('location: overtime.php');

?>

<?php
	// Memasukkan file session.php untuk memulai sesi
	include 'includes/session.php';

	// Mengecek apakah form dengan metode POST telah disubmit
	if(isset($_POST['add'])){
		// Menyimpan data yang diterima dari form ke variabel
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$address = $_POST['address'];
		$birthdate = $_POST['birthdate'];
		$contact = $_POST['contact'];
		$gender = $_POST['gender'];
		$position = $_POST['position'];
		$schedule = $_POST['schedule'];
		$filename = $_FILES['photo']['name'];

		// Mengecek apakah ada file foto yang diupload dan memindahkannya ke folder tujuan
		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		}

		// Membuat employee_id (ID karyawan) secara acak
		$letters = '';
		$numbers = '';
		foreach (range('A', 'Z') as $char) {
		    $letters .= $char;
		}
		for($i = 0; $i < 10; $i++){
			$numbers .= $i;
		}
		$employee_id = substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 9);

		// Menyusun perintah SQL untuk menambahkan data karyawan baru ke database
		$sql = "INSERT INTO employees (employee_id, firstname, lastname, address, birthdate, contact_info, gender, position_id, schedule_id, photo, created_on) VALUES ('$employee_id', '$firstname', '$lastname', '$address', '$birthdate', '$contact', '$gender', '$position', '$schedule', '$filename', NOW())";

		// Mengeksekusi perintah SQL dan mengecek apakah berhasil
		if($conn->query($sql)){
			$_SESSION['success'] = 'Employee added successfully'; // Menyimpan pesan sukses ke sesi
		}
		else{
			$_SESSION['error'] = $conn->error; // Menyimpan pesan error ke sesi
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first'; // Menyimpan pesan error ke sesi jika form belum diisi
	}

	// Mengarahkan kembali ke halaman employee.php
	header('location: employee.php');
?>

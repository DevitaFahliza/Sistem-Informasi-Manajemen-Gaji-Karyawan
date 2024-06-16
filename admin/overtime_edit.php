<?php
	// Menyertakan file session.php untuk memulai sesi dan menghubungkan database
	include 'includes/session.php';

	// Memeriksa apakah form edit telah disubmit
	if(isset($_POST['edit'])){
		// Mengambil nilai dari input form
		$id = $_POST['id'];
		$date = $_POST['date'];
		$hours = $_POST['hours'] + ($_POST['mins']/60);
		$rate = $_POST['rate'];

		// Membuat query untuk memperbarui data lembur pada tabel overtime berdasarkan ID
		$sql = "UPDATE overtime SET hours = '$hours', rate = '$rate', date_overtime = '$date' WHERE id = '$id'";
		// Mengeksekusi query dan memeriksa apakah berhasil
		if($conn->query($sql)){
			// Menyimpan pesan sukses ke dalam sesi jika pembaruan berhasil
			$_SESSION['success'] = 'Overtime updated successfully';
		}
		else{
			// Menyimpan pesan error ke dalam sesi jika terjadi kesalahan pada query
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		// Menyimpan pesan error ke dalam sesi jika form edit belum diisi
		$_SESSION['error'] = 'Fill up edit form first';
	}

	// Mengarahkan kembali ke halaman overtime.php
	header('location:overtime.php');

?>

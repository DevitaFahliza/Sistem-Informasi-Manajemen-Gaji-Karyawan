<?php
    // Memuat file session.php yang berisi sesi pengguna
	include 'includes/session.php';

	// Memeriksa apakah tombol 'edit' telah ditekan
	if(isset($_POST['edit'])){
		// Mengambil nilai dari form
		$id = $_POST['id'];
		$date = $_POST['edit_date'];
		$time_in = $_POST['edit_time_in'];
		$time_in = date('H:i:s', strtotime($time_in)); // Mengonversi waktu masuk ke format H:i:s
		$time_out = $_POST['edit_time_out'];
		$time_out = date('H:i:s', strtotime($time_out)); // Mengonversi waktu keluar ke format H:i:s

		// Membuat query SQL untuk memperbarui data kehadiran berdasarkan ID
		$sql = "UPDATE attendance SET date = '$date', time_in = '$time_in', time_out = '$time_out' WHERE id = '$id'";
		// Mengeksekusi query dan memeriksa apakah berhasil
		if($conn->query($sql)){
			// Jika berhasil, set sesi sukses dengan pesan keberhasilan
			$_SESSION['success'] = 'Attendance updated successfully';

			// Mengambil data kehadiran yang telah diperbarui berdasarkan ID
			$sql = "SELECT * FROM attendance WHERE id = '$id'";
			$query = $conn->query($sql);
			$row = $query->fetch_assoc();
			$emp = $row['employee_id'];

			// Mengambil data karyawan dan jadwal terkait berdasarkan ID karyawan
			$sql = "SELECT * FROM employees LEFT JOIN schedules ON schedules.id=employees.schedule_id WHERE employees.id = '$emp'";
			$query = $conn->query($sql);
			$srow = $query->fetch_assoc();

			// Memperbarui status log berdasarkan waktu masuk dan jadwal
			$logstatus = ($time_in > $srow['time_in']) ? 0 : 1;

			// Menyesuaikan waktu masuk dan keluar berdasarkan jadwal
			if($srow['time_in'] > $time_in){
				$time_in = $srow['time_in'];
			}

			if($srow['time_out'] < $time_out){
				$time_out = $srow['time_out'];
			}

			// Menghitung selisih waktu masuk dan keluar
			$time_in = new DateTime($time_in);
			$time_out = new DateTime($time_out);
			$interval = $time_in->diff($time_out);
			$hrs = $interval->format('%h');
			$mins = $interval->format('%i');
			$mins = $mins/60;
			$int = $hrs + $mins;
			if($int > 4){
				$int = $int - 1;
			}

			// Memperbarui jumlah jam kerja dan status dalam database
			$sql = "UPDATE attendance SET num_hr = '$int', status = '$logstatus' WHERE id = '$id'";
			$conn->query($sql);
		}
		else{
			// Jika terjadi kesalahan saat memperbarui data, set sesi error dengan pesan kesalahan dari database
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		// Jika form tidak diisi, set sesi error dengan pesan yang sesuai
		$_SESSION['error'] = 'Fill up edit form first';
	}

	// Mengarahkan kembali ke halaman attendance.php
	header('location:attendance.php');

?>

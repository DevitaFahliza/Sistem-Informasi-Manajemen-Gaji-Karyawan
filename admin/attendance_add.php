<?php
    // Memuat file session.php yang berisi sesi pengguna
	include 'includes/session.php';

	// Memeriksa apakah tombol 'add' telah ditekan
	if(isset($_POST['add'])){
		// Mengambil nilai dari form
		$employee = $_POST['employee'];
		$date = $_POST['date'];
		$time_in = $_POST['time_in'];
		$time_in = date('H:i:s', strtotime($time_in)); // Mengonversi waktu masuk ke format H:i:s
		$time_out = $_POST['time_out'];
		$time_out = date('H:i:s', strtotime($time_out)); // Mengonversi waktu keluar ke format H:i:s

		// Mengecek apakah karyawan ada dalam database
		$sql = "SELECT * FROM employees WHERE employee_id = '$employee'";
		$query = $conn->query($sql);

		// Jika karyawan tidak ditemukan, atur pesan error
		if($query->num_rows < 1){
			$_SESSION['error'] = 'Employee not found';
		}
		else{
			// Jika karyawan ditemukan, ambil data karyawan
			$row = $query->fetch_assoc();
			$emp = $row['id'];

			// Mengecek apakah data kehadiran untuk tanggal tersebut sudah ada
			$sql = "SELECT * FROM attendance WHERE employee_id = '$emp' AND date = '$date'";
			$query = $conn->query($sql);

			// Jika data kehadiran sudah ada, atur pesan error
			if($query->num_rows > 0){
				$_SESSION['error'] = 'Employee attendance for the day exist';
			}
			else{
				// Memperbarui data jadwal
				$sched = $row['schedule_id'];
				$sql = "SELECT * FROM schedules WHERE id = '$sched'";
				$squery = $conn->query($sql);
				$scherow = $squery->fetch_assoc();
				$logstatus = ($time_in > $scherow['time_in']) ? 0 : 1;

				// Menambahkan data kehadiran baru ke database
				$sql = "INSERT INTO attendance (employee_id, date, time_in, time_out, status) VALUES ('$emp', '$date', '$time_in', '$time_out', '$logstatus')";
				if($conn->query($sql)){
					$_SESSION['success'] = 'Attendance added successfully';
					$id = $conn->insert_id;

					// Mengambil data karyawan dan jadwal
					$sql = "SELECT * FROM employees LEFT JOIN schedules ON schedules.id=employees.schedule_id WHERE employees.id = '$emp'";
					$query = $conn->query($sql);
					$srow = $query->fetch_assoc();

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

					// Memperbarui jumlah jam kerja dalam database
					$sql = "UPDATE attendance SET num_hr = '$int' WHERE id = '$id'";
					$conn->query($sql);

				}
				else{
					// Jika terjadi kesalahan saat menambahkan data, atur pesan error
					$_SESSION['error'] = $conn->error;
				}
			}
		}
	}
	else{
		// Jika form tidak diisi, atur pesan error
		$_SESSION['error'] = 'Fill up add form first';
	}
	
	// Mengarahkan kembali ke halaman attendance.php
	header('location: attendance.php');

?>

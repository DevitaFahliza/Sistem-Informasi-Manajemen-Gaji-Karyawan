<?php
	// Menyertakan file session.php untuk memulai sesi dan menghubungkan database
	include 'includes/session.php';

	// Memeriksa apakah ada parameter 'return' yang diterima dari URL, jika tidak ada default ke 'home.php'
	if(isset($_GET['return'])){
		$return = $_GET['return'];
	}
	else{
		$return = 'home.php';
	}

	// Memeriksa apakah form save telah disubmit
	if(isset($_POST['save'])){
		// Mengambil nilai dari input form
		$curr_password = $_POST['curr_password'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$photo = $_FILES['photo']['name'];

		// Memeriksa apakah password saat ini sesuai dengan password yang tersimpan di database
		if(password_verify($curr_password, $user['password'])){
			// Memeriksa apakah ada file foto yang diupload
			if(!empty($photo)){
				move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$photo);
				$filename = $photo;	
			}
			else{
				$filename = $user['photo'];
			}

			// Memeriksa apakah password baru sama dengan password yang lama
			if($password == $user['password']){
				$password = $user['password'];
			}
			else{
				$password = password_hash($password, PASSWORD_DEFAULT);
			}

			// Membuat query untuk memperbarui profil admin
			$sql = "UPDATE admin SET username = '$username', password = '$password', firstname = '$firstname', lastname = '$lastname', photo = '$filename' WHERE id = '".$user['id']."'";
			// Mengeksekusi query dan memeriksa apakah berhasil
			if($conn->query($sql)){
				// Menyimpan pesan sukses ke dalam sesi jika pembaruan berhasil
				$_SESSION['success'] = 'Admin profile updated successfully';
			}
			else{
				// Menyimpan pesan error ke dalam sesi jika terjadi kesalahan pada query
				$_SESSION['error'] = $conn->error;
			}
			
		}
		else{
			// Menyimpan pesan error ke dalam sesi jika password salah
			$_SESSION['error'] = 'Incorrect password';
		}
	}
	else{
		// Menyimpan pesan error ke dalam sesi jika form belum diisi
		$_SESSION['error'] = 'Fill up required details first';
	}

	// Mengarahkan kembali ke halaman yang sesuai dengan parameter 'return'
	header('location:'.$return);

?>

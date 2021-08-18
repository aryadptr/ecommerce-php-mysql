<?php 

	// Include File Koneksi dan Helper
	include_once("function/koneksi.php");
	include_once("function/helper.php");

	// Deklarasikan Variabel
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	// Mengecek Apakah Data User Ada
	$query = mysqli_query($koneksi, "SELECT * FROM user WHERE email='$email' AND password='$password' AND status='On'");

	if (mysqli_num_rows($query) == 0) {
		header("location:".BASE_URL."index.php?page=login&notif=true");
	} else {
		// Mengambil Data User
		$row = mysqli_fetch_assoc($query);

		session_start();

		$_SESSION['user_id'] = $row['user_id'];
		$_SESSION['nama'] = $row['nama'];
		$_SESSION['level'] = $row['level'];

		if(isset($_SESSION["proses_pesanan"])){
			unset($_SESSION["proses_pesanan"]);
			header("location:".BASE_URL."index.php?page=data_pemesan");
		}else{
			header("location:".BASE_URL."index.php?page=my_profile&module=kategori&action=list");
		}

	}
	
?>
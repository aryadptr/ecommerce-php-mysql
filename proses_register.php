<?php  

	// Include File Koneksi dan Helper
	include_once('function/koneksi.php');
	include_once('function/helper.php');

	// Deklarasikan Variabel
	$level = "Customer";
	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$password = $_POST['password'];
	$repassword = $_POST['re-password'];
	$status = "On";

	// Menghapus Input Password Dari Form Register
	unset($_POST['password']);
	unset($_POST['re-password']);

	// Menyimpan Data Input Dari Form Register
	$dataForm = http_build_query($_POST);

	// Mengecek Data Email Exist
	$query = mysqli_query($koneksi, "SELECT * FROM user WHERE email='$email'");

	if(empty($fullname) OR empty($email) OR empty($address) OR empty($phone) OR empty($password)){
		header("location:".BASE_URL."index.php?page=register&notif=require&$dataForm");
	}else if ($password != $repassword) {
		header("location:".BASE_URL."index.php?page=register&notif=password&$dataForm");
	}else if (mysqli_num_rows($query) == 1) {
		header("location:".BASE_URL."index.php?page=register&notif=email&$dataForm");
	}
	else{
		$password = md5($password);
		mysqli_query($koneksi, "INSERT INTO user (level, nama, email, alamat, phone, password, status) VALUES('$level', '$fullname', '$email', 'address', '$phone', '$password', '$status')");
		header("location:".BASE_URL."index.php?page=login");
	}
?>
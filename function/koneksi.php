<?php 

	// Inisialisasi server
	$host = "localhost"; 
	$username = "root";
	$password = "";
	$database = "aoxmart";

	// Koneksi ke database
	$koneksi = mysqli_connect($host, $username, $password, $database) OR DIE ("Can't Connect to Database");

?>
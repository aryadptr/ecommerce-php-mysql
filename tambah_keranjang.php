<?php

    include_once('function/koneksi.php');
    include_once('function/helper.php');

    session_start();

    $barang_id = $_GET['barang_id'];

	$keranjang = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : false;


    $queryKeranjang = mysqli_query($koneksi, "SELECT * FROM barang WHERE barang_id='$barang_id'");
    $row = mysqli_fetch_assoc($queryKeranjang);

    $keranjang[$barang_id] = array("nama_barang" => $row['nama_barang'],
                                   "gambar" => $row['gambar'],
                                   "harga" => $row['harga'],
                                   "quantity" => 1
                                );
    $_SESSION["keranjang"] = $keranjang;

    header("location:".BASE_URL);
?>
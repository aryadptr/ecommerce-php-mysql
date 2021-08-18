<?php 

    include_once('../../function/koneksi.php');
    include_once('../../function/helper.php');
    
    $barang_id = isset($_GET['barang_id']) ? $_GET['barang_id'] : "";

    admin_only("barang", $level);

    
    $nama_barang = isset($_POST['nama_barang']) ? $_POST['nama_barang'] : "";
    $kategori_id = isset($_POST['kategori_id']) ? $_POST['kategori_id'] : "";
    $spesifikasi = isset($_POST['spesifikasi']) ? $_POST['spesifikasi'] : "";
    $harga = isset($_POST['harga']) ? $_POST['harga'] : "";
    $stok = isset($_POST['stok']) ? $_POST['stok'] : "";
    $status = isset($_POST['status']) ? $_POST['status'] : "";
    $update_gambar = "";
    $button = isset($_POST['button']) ? $_POST['button'] : $_GET['button'];

    // Upload Gambar
    if(!empty($_FILES["gambar"]["name"])){
        $namafile = $_FILES["gambar"]["name"];
        move_uploaded_file($_FILES["gambar"]["tmp_name"], "../../images/barang/".$namafile);

        $update_gambar = ", gambar='$namafile'";
    }
    
    if($button == "Simpan"){
        mysqli_query($koneksi, "INSERT INTO barang (nama_barang, kategori_id, spesifikasi, gambar, harga, stok, status)
        VALUES('$nama_barang', '$kategori_id', '$spesifikasi', '$namafile', '$harga', '$stok', '$status')");
    }else if($button == "Update"){
        mysqli_query($koneksi, "UPDATE barang SET nama_barang='$nama_barang',
                                                  kategori_id='$kategori_id',
                                                  spesifikasi='$spesifikasi'
                                                  $update_gambar,
                                                  harga='$harga',
                                                  stok='$stok',
                                                  status='$status'
                                                  WHERE barang_id='$barang_id'");
    }else if($button == "Delete"){
        mysqli_query($koneksi, "DELETE FROM barang WHERE barang_id = '$barang_id'");
    }
    header("location:".BASE_URL."index.php?page=my_profile&module=barang&action=list");
?>
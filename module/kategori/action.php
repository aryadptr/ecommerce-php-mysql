<?php 

    include_once('../../function/koneksi.php');
    include_once('../../function/helper.php');
    
    $kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : "";

    admin_only("kategori", $level);

    
    $kategori = isset($_POST['kategori']) ? $_POST['kategori'] : "";
    $status = isset($_POST['status']) ? $_POST['status'] : "";
    $update_gambar = "";
    $button = isset($_POST['button']) ? $_POST['button'] : $_GET['button'];
    
    // Upload Gambar
    if(!empty($_FILES["gambar"]["name"])){
        $namafile = $_FILES["gambar"]["name"];
        move_uploaded_file($_FILES["gambar"]["tmp_name"], "../../images/kategori/".$namafile);

        $update_gambar = ", gambar='$namafile'";
    }

    if($button == "Simpan"){
        mysqli_query($koneksi, "INSERT INTO kategori(kategori, gambar, status)
                                VALUES('$kategori', '$namafile', '$status')");
    }else if($button == "Update"){
        mysqli_query($koneksi, "UPDATE kategori SET kategori='$kategori' $update_gambar, status='$status' WHERE kategori_id='$kategori_id'");
    }else if($button == "Delete"){
        mysqli_query($koneksi, "DELETE FROM kategori WHERE kategori_id = '$kategori_id'");
    }
    header("location:".BASE_URL."index.php?page=my_profile&module=kategori&action=list");
?>
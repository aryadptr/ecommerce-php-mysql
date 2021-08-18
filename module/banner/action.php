<?php 

    include_once('../../function/koneksi.php');
    include_once('../../function/helper.php');
    
    $banner_id = isset($_GET['banner_id']) ? $_GET['banner_id'] : "";

    admin_only("banner", $level);
    
    $banner = isset($_POST['banner']) ? $_POST['banner'] : "";
    $link = isset($_POST['link']) ? $_POST['link'] : "";
    $status = isset($_POST['status']) ? $_POST['status'] : "";
    $button = isset($_POST['button']) ? $_POST['button'] : $_GET['button'];
    $update_gambar = "";

    // Upload Gambar
    if(!empty($_FILES["gambar"]["name"])){
        $namafile = $_FILES["gambar"]["name"];
        move_uploaded_file($_FILES["gambar"]["tmp_name"], "../../images/slide/".$namafile);

        $update_gambar = ", gambar='$namafile'";
    }
    
    if($button == "Simpan"){
        mysqli_query($koneksi, "INSERT INTO banner (banner, link, gambar, status)
        VALUES('$banner', '$link', '$namafile', '$status')");
    }else if($button == "Update"){
        mysqli_query($koneksi, "UPDATE banner SET banner='$banner',
                                                  link='$link'
                                                  $update_gambar,
                                                  status='$status'
                                                  WHERE banner_id='$banner_id'");
    }else if($button == "Delete"){
        mysqli_query($koneksi, "DELETE FROM banner WHERE banner_id = '$banner_id'");
    }
    header("location:".BASE_URL."index.php?page=my_profile&module=banner&action=list");
?>
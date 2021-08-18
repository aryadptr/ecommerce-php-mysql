<?php  

	// Memulai Session
	session_start();

	// Include File Helper dan Koneksi
	include_once("function/helper.php");
	include_once("function/koneksi.php");

	// Mengecek Halaman Saat Ini
	$page = isset($_GET['page']) ? $_GET['page'] : false;
	$kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false;

	// Mengecek Session
	$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
	$nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : false;
	$level = isset($_SESSION['level']) ? $_SESSION['level'] : false;

    // Session Keranjang
	$keranjang = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : array();
    $total_barang = count($keranjang);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Google Fonts Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">

    <!-- Style Custom -->
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <script src="<?php echo BASE_URL."js/jquery-3.1.1.min.js"; ?>"></script>

    <title>AOX Mart</title>
</head>

<body>

    <!-- Navigasi Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <a class="brand-logo" href="<?php echo BASE_URL.'' ?>">AOX Mart</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-link active align-self-center" href="<?php echo BASE_URL.''?>">Beranda</a>
                    <a class="nav-link align-self-center"
                        href="<?php echo BASE_URL.'index.php?page=category'?>">Kategori</a>
                    <a class="nav-link align-self-center" href="<?php echo BASE_URL.'index.php'?>">Tentang</a>
                    <?php
							if ($user_id) {
								echo "<li class='nav-item align-self-center dropdown'>
										<a class='nav-link nav-link-nama align-self-center dropdown-toggle'  id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
											Hi, <b>$nama</b>
											</a>
											<div class='dropdown-menu' aria-labelledby='navbarDropdown'>
											<a class='dropdown-item' href='".BASE_URL."index.php?page=my_profile&module=pesanan&action=list'>My Profile</a>
											<a class='dropdown-item' href='".BASE_URL."keranjang.html'>Keranjang</a>
											<a class='dropdown-item' href='".BASE_URL."logout.php'>Logout</a>
											</div>
									</li>";
							} else {
								echo "<a class='nav-link align-self-center mr-lg-3 mr-sm-3' href='".BASE_URL."register.html'>Sign Up</a>
	      						<a class='btn btn-primary btn-sign-in px-4 py-2' href='".BASE_URL."login.html'>Sign In</a>";
							}

                            // if($total_barang != 0){
                            //     echo "<p>$total_barang</p>";
                            // }
							
						?>
                </div>
            </div>
        </div>
    </nav>

    <!-- Konten Dinamis -->
    <div id="content" class="container">
        <?php 
  			$filename = "$page.php";

  			if(file_exists($filename)){
  				include_once($filename);
  			}else{
  				include_once("main.php");
  			}
  		?>
    </div>

    <!-- JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>
    <script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
    </script>
</body>

</html>
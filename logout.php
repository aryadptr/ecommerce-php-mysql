<?php 

    include_once("function/koneksi.php");
    include_once("function/helper.php");

    session_start();

    unset($_SESSION['user_id']);
    unset($_SESSION['nama']);
    unset($_SESSION['level']);

    header("location:".BASE_URL);
?>
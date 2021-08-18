<?php 

	define("BASE_URL", "http://aoxmart.test/");

	function rupiah($nilai = 0){
		$string = "Rp.".number_format($nilai,0, ',' ,'.');
		return $string;
	}

	$arrayStatusPesanan[0] = "Menunggu Pembayaran";
	$arrayStatusPesanan[1] = "Pembayaran Sedang Divalidasi";
	$arrayStatusPesanan[2] = "Lunas";
	$arrayStatusPesanan[3] = "Pembayaran Ditolak";

	function admin_only($module, $level){
		if($level != "Admin"){
        $admin_pages = array("kategori", "barang", "banner", "kota", "user");
        if(in_array($module, $admin_pages)){
            header("location:".BASE_URL);
        }
    }
	}

 ?>
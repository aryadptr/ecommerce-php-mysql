<?php

    $barang_id = $_GET['barang_id'];

    $queryBarang = mysqli_query($koneksi, "SELECT * FROM barang WHERE barang_id=$barang_id AND status='on'");

    $row = mysqli_fetch_assoc($queryBarang);

    echo "
    
    
    <div class='row'>
        <div class='col-lg-12 mt-lg-3 mt-md-3 mt-sm-3 text-center'>
            <img src='../aoxmart/images/barang/$row[gambar]' class='img-fluid' alt=''>
        </div>
        <div class='col-lg-12 mt-lg-3 mt-md-3 mt-sm-3'>
            <h4>$row[nama_barang]
                <a class='btn btn-primary' style='float: right;' href='".BASE_URL."tambah_keranjang.php?barang_id=$row[barang_id]'>Add to Cart</a>
            </h4>
        </div>
        <div class='col-lg-12 mt-lg-3 mt-md-3 mt-sm-3 products-price-detail'>
            ".rupiah($row['harga'])."
        </div>
        <div class='col-lg-12 mt-lg-3 mt-md-3 mt-sm-3 products-keterangan text-justify'>
            $row[spesifikasi]
        </div>
    </div>
    
    ";
?>
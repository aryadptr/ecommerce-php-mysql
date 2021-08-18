<div class="row">
    <div class="col-lg-12" data-aos="zoom-in">
        <div id="storeCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php 

                    $querySum = mysqli_query($koneksi, "SELECT COUNT(banner_id) FROM banner WHERE status='on'");
                    $rowSum = mysqli_fetch_assoc($querySum);
			    	$no = 0;
					for($no;$no<3;$no++){
				?>
                <li data-target="#storeCarousel" data-slide-to="<?php echo $no?>"
                    class="<?php if($no == 0){echo 'active';}else{echo '';}?>"></li>
                <?php 
					}
				?>
            </ol>
            <div class="carousel-inner">
                <?php 
					$no = 0;
                    $query = mysqli_query($koneksi, "SELECT * FROM banner WHERE status='on'");
					while($row = mysqli_fetch_array($query)){
				?>
                <div class="carousel-item <?php if($no == 0){echo 'active';}else{echo '';}?>">
                    <img src="../aoxmart/images/slide/<?php echo "$row[gambar]"; ?>" class="d-block w-100"
                        alt="Carousel Image" />
                </div>
                <?php 
					$no++;}
				?>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12" data-aos="fade-up">
        <h5 class="title-section">Kategori Populer</h5>
    </div>
</div>

<div class="row">
    <?php

    $query = mysqli_query($koneksi, "SELECT * FROM kategori WHERE status='on'");

    while ($row = mysqli_fetch_assoc($query)) {
        echo "
            <div class='col-6 col-md-3 col-lg-2'>
                <a href='".BASE_URL."index.php?kategori_id=$row[kategori_id]' class='component-categories d-block'>
                    <div class='categories-image'>
                        <img src='images/kategori/$row[gambar]' alt='' class='w-100'>
                    </div>
                    <p class='categories-text'>$row[kategori]</p>
                </a>
            </div>
        ";
    }

    ?>
    <div class=" container">
        <div class="row">
            <div class="col-12" data-aos="fade-up">
                <h5 class="title-section">Produk Terbaru</h5>
            </div>
        </div>
        <div class="row">
            <?php
            
            if($kategori_id){
                $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE status='on' AND kategori_id='$kategori_id' ORDER BY barang_id DESC");                
            }else{
                $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE status='on' ORDER BY barang_id DESC LIMIT 8");
            }
            

            while($row=mysqli_fetch_assoc($query)){
                echo "
                <div class='col-6 col-md-4 col-lg-3 mb-lg-5 mb-md-5 mb-sm-5' data-aos='fade-up' data-aos-delay='100'>
                    <a class='component-products d-block' href='".BASE_URL."index.php?page=detail&barang_id=$row[barang_id]'>
                        <div class='products-thumbnail'>
                            <div class='products-image' style='
                        background-image: url(images/barang/$row[gambar]);
                        '></div>
                        </div>
                        <div class='products-text'>
                            $row[nama_barang]
                        </div>
                        <div class='products-price'>
                            ".rupiah($row['harga'])."
                        </div>
                        <a class='add-to-cart btn btn-primary d-block' href='".BASE_URL."tambah_keranjang.php?barang_id=$row[barang_id]'>Add to Cart</a>
                    </a>
                </div>";
            }
            
            ?>
        </div>
    </div>

</div>
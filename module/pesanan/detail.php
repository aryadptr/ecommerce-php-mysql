<?php
	
	$pesanan_id= $_GET["pesanan_id"];
	
	$query = mysqli_query($koneksi, "SELECT pesanan.nama_penerima, pesanan.nomor_telepon, pesanan.alamat, pesanan.tanggal_pemesanan, user.nama, kota.kota, kota.tarif FROM pesanan JOIN user ON pesanan.user_id=user.user_id JOIN kota ON kota.kota_id=pesanan.kota_id WHERE pesanan.pesanan_id='$pesanan_id'");
	
	$row=mysqli_fetch_assoc($query);
	
	$tanggal_pemesanan = $row['tanggal_pemesanan'];
	$nama_penerima = $row['nama_penerima'];
	$nomor_telepon = $row['nomor_telepon'];
	$alamat = $row['alamat'];
	$tarif = $row['tarif'];
	$nama = $row['nama'];
	$kota = $row['kota'];
	
?>

<div class="card">
    <div class="card-header">
        <h4 class="align-self-center text-center">Detail Pesanan</h4>
    </div>
    <div class="card-body">
        <div class="row mt-lg-3 mt-sm-3">
            <div class="col">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Nomor Faktur</td>
                            <td>:</td>
                            <td><?php echo $pesanan_id; ?></td>
                        </tr>
                        <tr>
                            <td>Nama Pemesan</td>
                            <td>:</td>
                            <td><?php echo $nama; ?></td>
                        </tr>
                        <tr>
                            <td>Nama Penerima</td>
                            <td>:</td>
                            <td><?php echo $nama_penerima; ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td><?php echo $alamat; ?></td>
                        </tr>
                        <tr>
                            <td>Nomor Telepon</td>
                            <td>:</td>
                            <td><?php echo $nomor_telepon; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Pemesanan</td>
                            <td>:</td>
                            <td><?php echo $tanggal_pemesanan; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row mt-lg-3 mt-sm-3">
            <div class="col">
                <table class="table table-list table-responsive-sm">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Qty</th>
                            <th>Harga Satuan</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <?php
		
                        $queryDetail = mysqli_query($koneksi, "SELECT pesanan_detail.*, barang.nama_barang FROM pesanan_detail JOIN barang ON pesanan_detail.barang_id=barang.barang_id WHERE pesanan_detail.pesanan_id='$pesanan_id'");
                        
                        $no = 1;
                        $subtotal = 0;
                        while($rowDetail=mysqli_fetch_assoc($queryDetail)){
                        
                            $total = $rowDetail["harga"] * $rowDetail["quantity"];
                            $subtotal = $subtotal + $total;
                            
                            echo "
                            <tbody>
                                <tr>
                                    <td>$no</td>
                                    <td>$rowDetail[nama_barang]</td>
                                    <td>$rowDetail[quantity]</td>
                                    <td>".rupiah($rowDetail["harga"])."</td>
                                    <td>".rupiah($total)."</td>
                                </tr>
                            </tbody>";
                            
                            $no++;
                        }
                    
                        $subtotal = $subtotal + $tarif;
                    ?>
                    <tr>
                        <td colspan="3"></td>
                        <td>Biaya Pengiriman</td>
                        <td><?php echo rupiah($tarif); ?></td>
                    </tr>

                    <tr>
                        <td colspan="3"></td>
                        <td><b>Sub total</b></td>
                        <td><b><?php echo rupiah($subtotal); ?></b></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h5 class="h5 mt-lg-3 mt-sm-3">Transfer Pembayaran</h5>
                <p>Bank Central Asia (BCA)</p>
                <p>No Rekening : 12345678910</p>
                <p>Arya Dwi Putra</p>
                <a class="btn btn-primary d-block"
                    href="<?php echo BASE_URL."index.php?page=my_profile&module=pesanan&action=konfirmasi_pembayaran&pesanan_id=$pesanan_id";?>">Konfirmasi
                    Pembayaran</a>
            </div>
        </div>
    </div>
</div>
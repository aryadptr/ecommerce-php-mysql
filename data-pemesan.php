<?php

    if($user_id == false){
        $_SESSION["proses_pesanan"] = true;
        
        header("location:".BASE_URL."index.php?page=login");
        exit;
    }

?>

<div class="row">
    <div class="col">
        <h3 class="text-center">Data Pemesan</h3>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5>Alamat Pengiriman Barang</h5>
            </div>
            <div class="card-body">
                <form action="<?php echo BASE_URL.'proses_pemesanan.php'; ?>" method="POST">
                    <div class="input-group mt-lg-3">
                        <label class="label-custom input-group">Nama Penerima</label>
                        <input type="text" class="form-control" name="nama_penerima" value="">
                    </div>
                    <div class="input-group mt-lg-3">
                        <label class="label-custom input-group">No. Telepon</label>
                        <input type="number" maxlength="13" class="form-control" name="no_telepon" value="">
                    </div>
                    <div class="input-group mt-lg-3">
                        <label class="label-custom input-group">Alamat Pengiriman</label>
                        <textarea class="form-control" name="alamat_pengiriman" cols="5" rows="3"></textarea>
                    </div>
                    <div class="input-group mt-lg-3">
                        <label class="label-custom input-group">Kota</label>
                        <select name="kota" class="form-control">
                            <?php
                                $query = mysqli_query($koneksi, "SELECT * FROM kota WHERE status='on' ORDER BY kota ASC");
                                while($row = mysqli_fetch_assoc($query)){
                                    if($kategori_id == $row['kota_id']){
                                        echo "<option value='$row[kota_id]' selected>$row[kota] ".rupiah($row['tarif'])."</option>";
                                    }else{
                                        echo "<option value='$row[kota_id]'>$row[kota] (".rupiah($row['tarif']).")</option>";
                                    }
                                }
                            
                            ?>
                        </select>
                    </div>
                    <input class="btn btn-primary mt-lg-4 form-control" type="submit" value="Checkout Now">
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5>Detail Order</h5>
            </div>
            <div class="card-body">
                <table class="table table-striped table-responsive-sm table-hover">
                    <thead>
                        <tr>
                            <th>Nama Barang</th>
                            <th>Qty</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    $subtotal = 0;
                    foreach($keranjang AS $key => $value){
                        $barang_id = $key;
                        
                        $nama_barang = $value['nama_barang'];
                        $harga = $value['harga'];
                        $quantity = $value['quantity'];

                        $total = $quantity * $harga;
                        $subtotal = $subtotal + $total;
                        
                        echo "
                            <tr>
                                <td>$nama_barang</td>
                                <td>$quantity</td>
                                <td>".rupiah($total)."</td>
                            </tr>
                        </tbody>";
                    }

                    echo "
                        <tr>                  
                            <td colspan='1'></td>
                            <td>Sub Total</td>
                            <td>".rupiah($subtotal)."</td>
                        </tr>";
                    
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>
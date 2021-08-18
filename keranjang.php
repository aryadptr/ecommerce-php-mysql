<?php

    if($user_id){

        if($total_barang == 0){
            echo "<h3>Saat ini belum ada barang di dalam keranjang anda</h3>";
        }else{
            $no = 1;
            
            echo "
            <table class='table table-responsive-sm'>
                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Nama Barang</th>
                        <th>Qty</th>
                        <th>Harga Satuan</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>";

            $subtotal = 0;
            foreach($keranjang AS $key => $value){
                $barang_id = $key;

                $gambar = $value["gambar"];
                $nama_barang = $value["nama_barang"];
                $quantity = $value["quantity"];
                $harga = $value["harga"];

                $total = $quantity * $harga;
                $subtotal = $subtotal+$total;

                echo "
                    <tbody>
                        <tr>
                            <td><img src='".BASE_URL."images/barang/$gambar' height='100px'></td>
                            <td>$nama_barang</td>
                            <td><input type='text' maxlength='3' class='form-control quantity-keranjang update-quantity' name='$barang_id' value='$quantity'></td>
                            <td>".rupiah($harga)."</td>
                            <td>".rupiah($total)."</td>
                            <td><a class='btn btn-danger' href='".BASE_URL."hapus_item.php?barang_id=$barang_id'>Remove</a></td>
                        </tr>
                    </tbody>
                ";

                $no++;

            }

            echo "
                    <tr>                  
                        <td colspan='3'></td>
                        <td>Sub Total</td>
                        <td>".rupiah($subtotal)."</td>
                    </tr>

            ";

            echo "</table>";

            echo "
            <div class='d-flex flex-row bd-highlight'>
            <a href='".BASE_URL."' class='btn btn-primary mr-auto p-2 bd-highlight' style=''>Continue Shopping</a>
            <a href='".BASE_URL."data-pemesan.html' class='btn btn-primary' style=''>Checkout Now</a>
            </div>
            ";
        }

    }else{
        header("location:".BASE_URL);
    }

?>

<script>
$(".update-quantity").on("input", function(e) {
    var barang_id = $(this).attr("name");
    var value = $(this).val();

    $.ajax({
            method: "POST",
            url: "update_keranjang.php",
            data: "barang_id=" + barang_id + "&value=" + value
        })
        .done(function(data) {
            location.reload();
        })
});
</script>
<?php

    $pesanan_id = $_GET["pesanan_id"];

?>


<form action="<?php echo BASE_URL."module/pesanan/action.php?pesanan_id=$pesanan_id"; ?>" method="post">
    <h3 class="text-center">Konfirmasi Pembayaran</h3>

    <div class="input-group mt-lg-3">
        <label class="label-custom input-group">Nomor Rekening</label>
        <input type="text" class="form-control" name="nomor_rekening">
    </div>

    <div class="input-group mt-lg-3">
        <label class="label-custom input-group">Nama Account</label>
        <input type="text" class="form-control" name="nama_account">
    </div>

    <div class="input-group mt-lg-3">
        <label class="label-custom input-group">Tanggal Transfer</label>
        <input type="date" class="form-control" name="tanggal_transfer">
    </div>

    <div class="input-group mt-lg-3">
        <input type="submit" value="Konfirmasi" name="button" class="btn btn-primary">
    </div>

</form>